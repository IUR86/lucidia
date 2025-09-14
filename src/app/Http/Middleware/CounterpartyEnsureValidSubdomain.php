<?php

namespace App\Http\Middleware;

use App\Models\Counterparty;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CounterpartyEnsureValidSubdomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $subdomain = $request->route('subdomain');

        $counterparty = new Counterparty();

        if ($counterparty->query()->where('subdomain', $subdomain)->exists() === false) {
            abort(403, '無効なアクセス');
        }

        return $next($request);
    }
}
