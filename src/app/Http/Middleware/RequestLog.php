<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

class RequestLog
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $log_data = [
            'session_id'    => $request->session()->getId(),
            'ip'            => $request->ip(),
            'method'        => $request->method(),
            'path'          => $request->path(),
        ];

        Log::info(print_r($log_data, true));

        return $next($request);
    }
}
