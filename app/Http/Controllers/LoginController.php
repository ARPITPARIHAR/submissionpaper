<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
   

    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    
    public function handleFacebookCallback()
    {
        $user = Socialite::driver('facebook')->user();
    
      
    
        return redirect('/home');
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