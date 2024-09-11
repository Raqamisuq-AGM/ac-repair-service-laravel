<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;

class BuyerMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Check if the user is authenticated
        if (!Auth::check()) {
            // Redirect to login page if not authenticated
            // return redirect()->route('admin.login');
        }

        // Check if the authenticated user is an admin
        if (Auth::user()->type !== 'buyer') {
            // Redirect to home page or a different page if not an admin
            // return redirect()->route('admin.index');
        }
        return $next($request);
    }
}
