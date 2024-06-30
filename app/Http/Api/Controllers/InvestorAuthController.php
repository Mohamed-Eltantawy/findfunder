<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Investor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InvestorAuthController extends Controller
{
    public function showRegistrationForm()
    {
        return view('investor.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:investors',
            'password' => 'required|string|min:8|confirmed',
        ]);

        Investor::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('investor.login');
    }

    public function showLoginForm()
    {
        return view('investor.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::guard('investor')->attempt($credentials)) {
            return redirect()->intended('/investor/dashboard');
        }

        return back()->withErrors(['email' => 'Invalid credentials.']);
    }

    public function logout()
    {
        Auth::guard('investor')->logout();
        return redirect()->route('investor.login');
    }
}

