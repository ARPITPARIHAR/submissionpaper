<div>
    @if (session('error'))
        <div>{{ session('error') }}</div>
    @endif

    <form wire:submit.prevent="verifyOtp">
        <input type="text" wire:model="otp" placeholder="Enter OTP">
        <button type="submit">Verify</button>
    </form>

    @if ($timerRunning)
        <div>
            Time remaining: {{ $timerSeconds }} seconds
        </div>
    @endif
</div>