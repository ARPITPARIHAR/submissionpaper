<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{


    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
             'password' => 'required|string|confirmed',
            // 'user_type' => 'required|in:admin,user,client',
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            // 'user_type' => $request->user_type,
        ]);
    
        return redirect('/login')->with('success', 'You have successfully registered. Please log in.');
    }
    

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember'); // Check if "Remember Me" is checked

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            switch ($user->user_type) {
                case 'admin':
                    return redirect('/adminusertable'); 
                    break;
                case 'user':
                    return redirect('/publishing'); 
                    break;
                case 'client':
                    return redirect('/formating'); 
                    break;
                default:
                    return redirect('/dashboard'); 
                    break;
            }
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ]);
    }

    protected function authenticated(Request $request, $user)
{
    if ($user->is_admin) {
        return redirect('/');
    } elseif ($user->is_user) {
        return redirect('/publishing');
    } elseif ($user->is_client) {
        return redirect('/formating');
    }

    return redirect('/');
}


   

// ...
public function assignRole(Request $request, $userId) {
    $request->validate([
        'role' => 'required|in:admin,user,client',
    ]);

    $user = User::find($userId);

    // Check if the authenticated user is an admin
    if (Auth::user()->user_type == 'admin') {
        $user->user_type = $request->role;
        $user->save();

        return redirect()->back()->with('success', 'Role assigned successfully.');
    } else {
        return redirect()->back()->with('error', 'You do not have permission to assign roles.');
    }
}

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
