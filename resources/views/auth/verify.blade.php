@extends('user.layouts.app')
@section('meta_title', '')
@include('user.includes.navbar')
  

<div class="container" style="margin-top:100px;">
    <form id="mobileForm">
        @csrf
        <div class="mb-3">
            <label for="mobile" class="form-label">Enter your mobile number:</label>
            <input type="tel" class="form-control" id="mobile" name="mobile" required>
        </div>
        <button type="button" class="btn btn-primary" onclick="sendOTP()">Send OTP</button>

        <!-- OTP Form -->
        <div id="otpForm" style="display:none;">
            <div class="mb-3">
                <label for="otp" class="form-label">Enter OTP:</label>
                <input type="text" class="form-control" id="otp" name="otp" required>
            </div>
            <button type="button" class="btn btn-primary" onclick="verifyOTP()">Verify OTP</button>
        </div>
        <p id="timer" style="display:none;">Time remaining: <span id="countdown"></span></p>
    </form>

    <script>
        function sendOTP() {
            const mobile = document.getElementById('mobile').value;
            if (!mobile) {
                alert('Please enter your mobile number.');
                return;
            }

            // Your logic to send OTP goes here

            // Display OTP form and start the timer
            document.getElementById('otpForm').style.display = 'block';
            startTimer();
        }

        function verifyOTP() {
            // Your logic to verify OTP goes here
            // Display success message or handle verification result
        }

        function startTimer() {
            var timeInSeconds = 120; // Set the timer duration in seconds

            // Display the timer element
            var timerElement = document.getElementById('timer');
            timerElement.style.display = 'block';

            // Set up the countdown
            var countdownElement = document.getElementById('countdown');

            function updateCountdown() {
                var minutes = Math.floor(timeInSeconds / 60);
                var seconds = timeInSeconds % 60;

                countdownElement.innerText = `${minutes}:${seconds}`;

                if (timeInSeconds > 0) {
                    timeInSeconds--;
                    setTimeout(updateCountdown, 1000); // Update every second
                } else {
                    // Optionally, handle timeout (e.g., disable the form)
                }
            }

            updateCountdown(); // Start the countdown
        }
    </script>
</div>



@include('user.includes.footer')

@section('style')
    
@endsection
@section('script')
    
@endsection
