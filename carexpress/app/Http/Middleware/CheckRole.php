<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        if (Auth::guard('personnel')->check() && !in_array(Auth::guard('personnel')->user()->role, $roles)) {
            return redirect()->route('admin.dashboard')->with('error', 'Access denied');
        }
        return $next($request);
    }
}
