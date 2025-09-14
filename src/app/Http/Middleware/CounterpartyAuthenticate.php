<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CounterpartyAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $subdomain = request()->route('subdomain');

        if (Auth::guard('counterparty')->check() === false) {
            return redirect()->route('counterparty.login.index', ['subdomain' => $subdomain]);
        }

        $counterparty_user = Auth::guard('counterparty')->user();

        if ($counterparty_user->subdomain !== request()->route('subdomain')) {
            return redirect()->route('counterparty.login.index', ['subdomain' => $subdomain]);
        }

        return $next($request);
    }
}
