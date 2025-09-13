<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
        return view('admin.login.index');
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

        $credentials = $request->only('email', 'password');

        // 認証処理
        if (Auth::guard('admin')->attempt($credentials)) {
            Log::info("管理者ログイン成功: " . $request->email);

            $request->session()->regenerate();

            return redirect()->intended(route('admin.home.index'));
        }

        Log::info("管理者ログイン失敗: " . $request->email);

        return back()->withErrors(['email' => 'ログイン情報が正しくありません。']);
    }
}
