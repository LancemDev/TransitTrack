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
use Illuminate\Support\Facades\Validator;

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

    public function login(Request $request)
    {
        $fields = request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // Define the models to check
        $models = [
            'admin' => Admin::class,
            'users' => User::class,
            'driver' => Driver::class,
            'sacco' => SaccoAdmin::class,
        ];

        foreach ($models as $type => $model) {
            $user = $model::where('email', $fields['email'])->first(); // Fetch the user if exists

            if ($user && Auth::attempt(['email' => $fields['email'], 'password' => $fields['password']])) {
                // Authentication passed for a specific user type
                dd('Login successful for ' . $type);
                // return redirect()->route($type . '.home')->with('success', 'Login successful');
            }
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    } 
}
