<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

final class LogoutController extends Controller
{
    /**
     * ログアウトを行います
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(): \Illuminate\Http\RedirectResponse
    {
        Log::debug(__METHOD__ . '(' . __LINE__ . ')');

        Auth::guard('admin')->logout();

        return redirect()->route('admin.login.index');
    }
}
