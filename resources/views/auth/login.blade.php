@extends('user.layouts.app')

@section('meta_title', 'game')

@include('user.includes.navbar')
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
<div class="container" style="margin-top:100px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="background-color: #00ffff1f;">
                <div class="card-header" style="text-align: center;color:white;background-color: #23629F;">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <br><div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="ws-nowrap s-btn s-btn__filled" 
                                >
                                    {{ __('Login') }}
                                </button>
<br>
<br>
{{-- <div style="display: flex; gap: 20px;"> --}}
    {{-- <a href="{{ url('login/facebook') }}" class="btn btn-primary">
        <i class="fab fa-facebook"></i> Login with Facebook
    </a> --}}
    {{-- <a href="{{ url('login/google') }}" class="btn btn-dark">
        <i class="fab fa-google"></i> Login with Google
    </a> --}}
{{-- </div> --}}


                            </div>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@if (Route::has('register'))
    <div class="text-center mt-3">
        <p>Don't have an account? <a href="{{ route('register') }}" >Register here</a>.</p>
    </div>
@endif

@include('user.includes.footer')

@section('style')

@endsection

@section('script')

@endsection
<style>
    @media (max-width: 767px) {
           .navbar-collapse {
               z-index: 1000; /* Ensure it stays above other content */
           }
       }
   </style>
<style>
    
button.ws-nowrap {
    border: none;
}

/* Style the button */
button.ws-nowrap.s-btn__filled {
    background-color: #23629F;
    color: white;
    font: 15px;
    padding: 8.4px; 
    width:100px;
    border-radius: 10px;
    font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
    cursor: pointer; /* Add a pointer cursor for better usability */
    transition: background-color 0.3s ease; /* Smooth transition on background color change */
}

/* Hover effect */
button.ws-nowrap.s-btn__filled:hover {
    background-color: #184875; /* Change the background color on hover */
}

    button.loginYellow {
        min-width: 110px!important;
        height: 36px!important;
        color: #fff;
        line-height: 24px;
        border-radius: 10px;
        background: #ff6f00;
        margin-top: 20px;
        font-family: medium;
        font-size: 20px;
        font-style: normal;
        font-weight: 600;
        letter-spacing: .9px;
        transition: all .5s;
        display: inline-block;
        text-align: center; /* Add this line to center the text within the button */
        text-decoration: none; /* Add this line to remove underlines */
        padding: 8px 16px; /* Adjust padding as needed */
        border: none;
    }

    @media (min-width: 768px) {
        .container {
            /* margin-top: 100px; */
            /* margin-bottom: 100px; */
        }
    }


    @media (max-width: 767px) {
        .container {
            margin-top: 50px;
            margin-bottom: 50px;
        }
    }

</style>
