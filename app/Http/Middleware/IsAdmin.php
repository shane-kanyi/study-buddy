<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if the user is authenticated AND if their role is 'admin'
        if (auth()->check() && auth()->user()->role == 'admin') {
            return $next($request);
        }

        // If not an admin, redirect them to the dashboard with an error.
        return redirect('/dashboard')->with('error', 'You do not have admin access.');
    }
}