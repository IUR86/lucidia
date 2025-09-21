<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

final class LogoutController extends Controller
{
    /**
     * ログアウト
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(): \Illuminate\Http\RedirectResponse
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        $user = Auth::guard('user')->user();

        Log::info("ユーザ : {$user->id}はログアウトします");

        Auth::guard('user')->logout();

        return redirect()->back();
    }
}
