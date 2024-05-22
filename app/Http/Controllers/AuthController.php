<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Driver;
use App\Models\SaccoAdmin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'phone' => 'required|string'
        ]);

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'phone' => $fields['phone']
        ]);

        auth()->login($user);

        return redirect()->route('user.home')->with('success', 'Account created successfully');
    }

    public function login()
    {
        $guard = null;
        $fields = request()->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email in users table
        $user = User::where('email', $fields['email'])->first();
        $guard = 'web';

        // Check email in SaccoAdmin table if not found in users table
        if (!$user) {
            $user = SaccoAdmin::where('email', $fields['email'])->first();
            $guard = 'sacco_admin';
        }

        // Check email in Admin table if not found in users, sacco_admins, and drivers tables
        if (!$user) {
            $user = Admin::where('email', $fields['email'])->first();
            $guard = 'admin';
        }

        // Check email in Driver table if not found in users and sacco_admins tables
        if (!$user) {
            $user = Driver::where('email', $fields['email'])->first();
            $guard = 'driver';
        }

        // Check password
        if (!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds',
                'guard' => $guard
            ], 401);
        }

        // Log in the user with the specific guard
        auth()->guard($guard)->login($user);

        // Redirect to the user's role home
        $route = $guard == 'web' ? 'users.home' : $guard . '.home';
        return redirect()->route($route)->with('success', 'Login successful');
    }
}
