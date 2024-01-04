@extends('user.layouts.app')

@section('meta_title', 'game')

@include('user.includes.navbar')


<div class="container" style="margin-top:100px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header" style="text-align: center; background-color:#1ed1a287;">{{ __('Login') }}</div>

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
                            <button type="submit" class="btn loginYellow mb-2 me-3">
                                {{ __('Login') }}
                            </button>
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
    <p>Don't have an account? <a href="{{ route('register') }}">Register here</a>.</p>
</div>
@endif


@include('user.includes.footer')

@section('style')
    
@endsection

@section('script')
  
@endsection


<style>
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
</style>

