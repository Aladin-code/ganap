<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    { // Check if the user is authenticated and is an admin
        if (!auth()->check() || auth()->user()->role !== 'admin') {
            // Redirect or show a 403 error if not an admin
            return redirect('/')->with('error', 'You do not have access to this page.');
        }
        return $next($request);
    }
}
