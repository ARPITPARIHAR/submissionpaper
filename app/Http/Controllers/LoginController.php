<?php

// app/Http/Controllers/LoginController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    // Show the login form
    public function showLoginForm()
    {
        return view('auth.login'); // You should have a login.blade.php file in the views/auth directory
    }

    // Handle the login request
    public function login(Request $request)
    {
        // Add your login logic here

        // For example:
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        }

        return redirect()->back()->withErrors(['email' => 'Invalid credentials']);
    }

    // Logout
    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }
}
