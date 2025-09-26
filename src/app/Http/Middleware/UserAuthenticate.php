<?php

namespace App\Http\Middleware;

use App\Enum\SessionKey;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::guard('user')->check() === false) {
            session()->flash(SessionKey::ALERT_FLASH_MESSAGE->value, 'ログインをしてください。');
            return redirect()->route('user.login.index');
        }

        return $next($request);
    }
}
