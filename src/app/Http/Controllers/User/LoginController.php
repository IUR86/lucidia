<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

final class LoginController extends Controller
{
    /**
     * ログイン画面を表示
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\View\View
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        return view('user.login.index');
    }

    /**
     * ログイン処理
     *
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request): \Illuminate\Http\RedirectResponse
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        $cart = new Cart();

        $credentials = $request->only('email', 'password');

        // 認証処理
        if (Auth::guard('user')->attempt($credentials)) {
            Log::info("ユーザログイン成功: " . $request->email);

            $request->session()->regenerate();

            $user = Auth::guard('user')->user();

            $using_cart = $cart->getUsingCart();
            $using_cart->user_id = $user->id;
            $using_cart->save();

            return redirect()->intended(route('user.home.index'));
        }

        Log::info("ユーザログイン失敗: " . $request->email);

        session()->flash('flash_message', 'ログイン情報が正しくありません');

        return back();
    }
}
