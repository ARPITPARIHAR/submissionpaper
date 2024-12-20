@extends('user.layouts.app')

@section('meta_title', 'game')

@include('user.includes.navbar')

    <div class="container" style="margin-top: 100px;">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="background-color: #fcf570dd;">
                    <div class="card-header" style="text-align: center; color:white;background-color:#078ea8;">{{ __('Register') }}</div>

                    <div class="card-body">
                        @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                        
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>
                        
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        <br>
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>
                        
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                        
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
                                <div class="input-group">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    <div class="input-group-append">
                                        <span class="input-group-text" style="background-color: white;">
                                            <i class="fas fa-eye" id="togglePassword" style="cursor: pointer; color: #007bff;"></i>
                                        </span>
                                    </div>
                                </div>
                        
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <br>
                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>
                        
                            <div class="col-md-6">
                                <div class="input-group">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    <div class="input-group-append">
                                        <span class="input-group-text" style="background-color: white;">
                                            <i class="fas fa-eye" id="toggleConfirmPassword" style="cursor: pointer; color: #007bff;"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                       
                        
                         <br>
                        
                         {{-- <div class="form-group row mb-2">
                            <label for="user_type" class="col-md-4 col-form-label text-md-right">User Type:</label>
                            <div class="col-md-6">
                                <select name="user_type" id="user_type" class="form-control" required>
                                    <option value="" disabled selected>Select User Type</option>
                                   
                                    <option value="user">User</option>
                                    <option value="client">Client</option>
                                </select>
                            </div>
                        </div> --}}
                        
                        <br>
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary" style="border-radius: 10px 0px 10px 10px;">
                                        {{ __('Register') }}
                                    </button>
                                    
                                   
                                    <a href="{{ url('/login') }}" class="btn btn-secondary ml-2" style="border-radius: 0px 10px 10px 10px;">
            Back to Login
        </a>
                                </div>
                            </div>
                        </form>
                        
          
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style>
        @media (max-width: 767px) {
               .navbar-collapse {
                   z-index: 1000; /* Ensure it stays above other content */
               }
           }
       </style>

    <script>
        document.getElementById('togglePassword').addEventListener('click', function() {
            var passwordInput = document.getElementById('password');
            var type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
        });
    
        document.getElementById('toggleConfirmPassword').addEventListener('click', function() {
            var confirmPasswordInput = document.getElementById('password-confirm');
            var type = confirmPasswordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            confirmPasswordInput.setAttribute('type', type);
        });
    </script>
@include('user.includes.footer')

@section('style')
    <!-- Add your styles here if needed -->
@endsection

@section('script')
    
@endsection
