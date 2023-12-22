@extends('user.layouts.app')

@section('meta_title', 'game')

@include('user.includes.navbar')

<div class="container" style="margin-top: 100px;">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Your existing login form fields -->

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>
                                
                                <!-- Button to initiate Google OAuth login -->
                                <a href="{{ route('login.google') }}" class="btn btn-danger">
                                    Login with Google
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('user.includes.footer')

@section('style')
    <!-- Add your styles here if needed -->
@endsection

@section('script')
    <!-- Add your scripts here if needed -->
@endsection
