<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Show Registration Form
    public function showRegisterForm(){
        return view('register');
    }

    // Handle Registration
    public function register(Request $request){

        // Validate the incoming request data
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create a new user instance after a valid registration
        User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // Redirect to login form with a success message
        return redirect()->route('login.form')->with('success', 'Registration successful! Please login.');
    }

    // Show Login Form
    public function showLoginForm(){
        return view('login');
    }

    // Handle Login
    public function login(Request $request){

        // Validate the incoming request data
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if (Auth::attempt($credentials)) {
            // Authentication was successful
            $request->session()->regenerate();
            return redirect()->route('dashboard');  // Ensure this matches the route name for the dashboard
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'Invalid Credentials.',
        ]);
    }

    // Handle Logout
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login.form')->with('success', 'Logged out successfully.');
    }
}
