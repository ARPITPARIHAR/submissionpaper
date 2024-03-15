<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

use Twilio\Rest\Client;

class PhoneVerificationController extends Controller
{
   

    public function showVerificationForm()
    {
        return view('auth.verify');
    }

    public function generateOtp()
{
  
    $otp = rand(100000, 999999);
    
   
    Cache::put('otp', $otp, now()->addMinutes(5));

    return response()->json(['otp' => $otp], 200);
}


  
    
    public function verifyOtp(Request $request)
{
   
    $userOtp = $request->input('otp');

   
    $storedOtp = $request->session()->get('otp');

   
    if ($storedOtp && $userOtp == $storedOtp) {
       
        session()->flash('success', 'OTP verified successfully.');
    } else {
      
        session()->flash('error', 'Incorrect OTP.');
    }

    return redirect()->back();
}
}
