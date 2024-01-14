<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    $guards = empty($guards) ? [null] : $guards;

    foreach ($guards as $guard) {
        if (Auth::guard($guard)->check()) {
            $user = Auth::guard($guard)->user();

            // Check if the current route is the registration route
            if ($request->routeIs('register')) {
                // If on the registration route, don't redirect, continue with the request
                return $next($request);
            } elseif ($user->approved) {
                // Continue with the request if the user is approved
                return $next($request);
            } else {
                // Redirect to the login page for all other routes with a message
                if ($request->routeIs('login')) {
                    return $next($request);
                } else {
                    return redirect()->route('login')->with('account_not_approved', 'Your account is not approved yet. Please wait for admin approval.');
                }
            }
        }
    }

    return $next($request);
}

}
