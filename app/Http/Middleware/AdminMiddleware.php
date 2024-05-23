<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Admin;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Check if a user is authenticated
        if (auth()->check()) {
            // Get the authenticated user's email
            $email = auth()->user()->email;

            // Check if a user with this email exists in the admins table
            $admin = Admin::where('email', $email)->first();

            // If the user is not in the admins table, return an error response
            if (!$admin) {
                return response([
                    'message' => 'Unauthorized Admin',
                    'email' => $email,
                    'role' => auth()->user()->role,
                ], 401);
            }
        }

        // If the user is in the admins table, continue with the request
        return $next($request);
    }
}