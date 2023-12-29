<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{

  


    public function showRegistrationForm()
    {
        return view('admin.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins',
            'password' => 'required|string|min:4|confirmed',
        ]);

        $admin = Admin::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/adminlogin')->with('success', 'You have successfully registered. Please log in.');
    }



    public function loginForm()
{
    return view('admin.login');
}

public function login(Request $request)
{
    $request->validate([
        'email' => 'required|email',
        'password' => 'required|string',
    ]);

    // Get the admin user based on the provided email
    $admin = \App\Models\Admin::where('email', $request->input('email'))->first();

    if ($admin) {
        // Check the password using Hash::check
        if (Hash::check($request->input('password'), $admin->password)) {
            // Authentication successful
            Auth::guard('admin')->login($admin);

            return redirect()->intended('/adminusertable');
        }
    }

    // Authentication failed
    return redirect('/adminlogin')->with('error', 'Invalid credentials');
}


    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
