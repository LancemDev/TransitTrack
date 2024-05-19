<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if an admin is authenticated
        if (auth()->guard('users')->check()) {
            // Get the authenticated user's email
            $email = auth()->guard('users')->user()->email;

            // Check if a user with this email exists in the users table
            $admin = User::where('email', $email)->first();

            // If the user is not in the users table, return an error response
            if (!$admin) {
                return response([
                    'message' => 'Unauthorized Normal User',
                    'email' => $email,
                    'role' => auth()->guard('user')->user()->role,
                ], 401);
            }
        }

        // If the user is in the users table, continue with the request
        return $next($request);
    }
}
