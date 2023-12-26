<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    public function login()
    {
        return view("auth.login");
    }

//     public function redirectToGoogle()
//     {
//         return Socialite::driver('google')->redirect();
//     }

//     public function handleGoogleCallback()
//     {
//         $user = Socialite::driver('google')->user();

//         // Add your logic for creating or logging in the user here
//         // For example, you might check if the user exists in your database
//         // and create them if not

//         // Assuming you have a 'dashboard' route
//         return redirect()->route('dashboard');
//     }
// }