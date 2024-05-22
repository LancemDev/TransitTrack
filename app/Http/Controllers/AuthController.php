<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Driver;
use App\Models\SaccoAdmin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

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
        $fields = request()->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Define the models to check
        $models = [
            'users' => User::class, 
            'sacco' => SaccoAdmin::class, 
            'admin' => Admin::class, 
            'driver' => Driver::class
        ];

        foreach ($models as $type => $model) {
            if ($model::where('email', $fields['email'])->exists()) {
                if (Auth::attempt($fields)) {
                    // Authentication passed
                    dd($models);
                    return redirect()->route($type . '.home')->with('success', 'Login successful');
                }
            }
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
