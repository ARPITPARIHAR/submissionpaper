<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{


    // public function __construct()
    // {
    // $this->middleware('auth');
    // }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            // 'password' => 'required|string|min:8|confirmed',
            'user_type' => 'required|in:admin,user,client',
        ]);
    
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'user_type' => $request->user_type,
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
    
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
    
            switch ($user->user_type) {
                case 'admin':
                    return redirect('/admin-dashboard'); // Replace with your admin dashboard route
                    break;
                case 'user':
                    return redirect('/publishing'); // Replace with your user dashboard route
                    break;
                case 'client':
                    return redirect('/formating'); // Replace with your client dashboard route
                    break;
                default:
                    return redirect('/dashboard'); // Default redirect for unknown user types
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


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
