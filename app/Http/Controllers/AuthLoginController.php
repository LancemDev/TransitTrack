<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthLoginController extends Controller
{
    public function login(Request $request)
    {
        $fields = request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        // Attempt to authenticate as admin
        if (Auth::guard('admin')->attempt(['email' => $fields['email'], 'password' => $fields['password']])) 
        {
            return redirect()->route('admin.home')->with('success', 'Login successful');
        }
        if(Auth::guard('web')->attempt(['email' => $fields['email'], 'password' => $fields['password']])) 
        {
            return redirect()->route('user.home')->with('success', 'Login successful');
        }

        if(Auth::guard('driver')->attempt(['email' => $fields['email'], 'password' => $fields['password']])) 
        {
            return redirect()->route('driver.home')->with('success', 'Login successful');
        }

        if(Auth::guard('sacco_admin')->attempt(['email' => $fields['email'], 'password' => $fields['password']])) 
        {
            return redirect()->route('sacco_admin.home')->with('success', 'Login successful');
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
