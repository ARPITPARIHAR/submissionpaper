@extends('user.layouts.app')
@section('meta_title', '')
@include('user.includes.navbar')

<div class="table-container" style="margin-top: 80px;">
    <h3 style="text-align: center;">User Table</h3>

    <table class="table">
        <thead>
            <tr>
                <th>S.N.</th>
                <th>Name</th>
                <th>Email</th>
                <th>User Type</th>
                <th>Assign Role</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @php $serialNumber = 1; @endphp
            @foreach($users as $user)
                <tr>
                    <td>{{ $serialNumber++ }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ ucfirst($user->user_type) }}</td>
                    <td>
                        <form method="post" action="{{ route('admin.assignRole', ['userId' => $user->id]) }}">
                            @csrf
                            <select name="role" id="role" class="form-select">
                                @foreach($roles as $role)
                                    <option value="{{ $role }}" {{ $user->user_type === $role ? 'selected' : '' }}>
                                        {{ ucfirst($role) }}
                                    </option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary mt-2">Assign Role</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('admin.changePassword', ['userId' => $user->id]) }}" class="btn btn-info">Change Password</a>
                        <a href="{{ route('admin.removeUser', ['userId' => $user->id]) }}" class="btn btn-danger">Remove User</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <div class="log">
    <button type="submit">Logout</button>
    </div>
</form>

<style>
form {
    display: inline;
}

.log button {
    background-color: #dc3545;
    color: #fff;
    border: none;
    cursor: pointer;
    float: right;
    margin-top: -180px !important; /* Adjust the margin-top value as needed */
}

</style>

@include('user.includes.footer')

@section('style')
    
@endsection
@section('script')
    
@endsection
