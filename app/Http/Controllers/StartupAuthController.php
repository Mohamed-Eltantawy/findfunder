<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Startup;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StartupAuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('startup.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:startups',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Startup::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('startup.login');
    }

    public function showLoginForm()
    {
        return view('startup.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('startup')->attempt($credentials)) {
            return redirect()->intended('/startup/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout()
    {
        Auth::guard('startup')->logout();
        return redirect()->route('startup.login');
    }
}
