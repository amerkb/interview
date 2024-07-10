<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use App\Statuses\UserStatus;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        if (auth('web')->check() && auth()->user()->role == UserStatus::USER) {
            return redirect(RouteServiceProvider::USER);
        }

        return $next($request);
    }
}
