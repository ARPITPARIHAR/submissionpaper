<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Cache;

class VerifyOtp extends Component
{
    public $otp;
    public $timerSeconds = 120; // Set the timer duration in seconds
    public $timerRunning = false;

    public function render()
    {
        return view('livewire.verify-otp');
    }

    public function verifyOtp()
    {
        // Implement OTP verification logic here
        // For example, you might compare the entered OTP with the one stored in the cache

        $storedOtp = Cache::get('otp'); // Retrieve the stored OTP
        if ($this->otp == $storedOtp) {
            // OTP is valid, perform any additional actions if needed
            $this->timerRunning = true; // Start the timer
        } else {
            // Invalid OTP, show error message
            session()->flash('error', 'Invalid OTP. Please try again.');
        }
    }
}
