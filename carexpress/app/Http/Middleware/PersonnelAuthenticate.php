<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PersonnelAuthenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        $personel = Auth::guard('personnel')->user();
        if(!$personel){
            return redirect()->route('login');
        }
        if (!collect($roles)->contains($personel->role)) {
            return redirect()->route('admin.dashboard')->with('error', 'You are not allowed to access this page.');
        }
        return $next($request);
    }
}
