@extends('user.layouts.app')
@section('meta_title', 'game')
@include('user.includes.navbar')

<div class="container" style="margin-top: 100px;">
    <h3 style="text-align: center;">Change Password for {{ $user->name }}</h3>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if($errors->has('password'))
    <div class="alert alert-danger">
        {{ $errors->first('password') }}
    </div>
    @endif

    <form method="post" action="{{ route('admin.processChangePassword', ['userId' => $user->id]) }}">
        @csrf
<br>
        <div class="form-group row">
            <label for="password" class="col-sm-4 col-form-label">New Password:</label>
            <div class="col-sm-4">
                <input type="password" name="password" id="password" class="form-control" required>
            </div>
        </div>
        <br>
        <div class="form-group row">
            <label for="password_confirmation" class="col-sm-4 col-form-label">Confirm New Password:</label>
            <div class="col-sm-4">
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required>
            </div>
        </div>
<br>
<div class="form-group row">
    <div class="col-sm-4 offset-sm-4">
        <button type="submit" class="btn btn-primary btn-lg">Change Password</button>
    </div>
    <div class="col-sm-4">
        <a href="/adminusertable" class="btn btn-secondary btn-lg">Back</a>
    </div>
</div>



    </form>
</div>


@include('user.includes.footer')

@section('style')
    <style>
        .form-group {
            margin-bottom: 20px;
        }
    </style>
@endsection

@section('script')
    
@endsection
