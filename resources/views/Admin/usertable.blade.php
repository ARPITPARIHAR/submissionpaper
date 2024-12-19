@extends('user.layouts.app')
@section('meta_title', '')
@include('user.includes.navbar')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<div class="table-container" style="margin-top: 120px; background-color:#094D9C; padding: 20px; border-radius: 25px; margin-left: auto; /* This will push the container to the right */
margin-right: auto;
max-width: 1200px;">
    <table class="table table-striped table-hover">
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
                            <button type="submit" class="btn btn-primary mt-2"  style="background-color:#9b1a1a!important;">Assign Role</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('admin.changePassword', ['userId' => $user->id]) }}" class="btn btn-info" style="background-color: #ffeded!important;">Change Password</a>
                        <a href="{{ route('admin.removeUser', ['userId' => $user->id]) }}" class="btn btn-danger" style="background-color: #000000!important;">Remove User</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <div class="log" style="text-align: right; margin-top: 10px;">
        <button type="submit" class="btn btn-warning">
            <i class="fa fa-sign-out" aria-hidden="true" style="color: black;"></i> Logout
        </button>
    </div>


</form>

<style>
    .table-container {
        margin-top: 30px;
    }

    .table th, .table td {
        text-align: center;
    }

    .table-hover tbody tr:hover {
        background-color: ;
        color:yellow;
    }

    .btn {
        margin-right: 5px;
    }

    .table th{
        color:yellow;
        font-family: sans-serif;
        font-size: 20px;

    }

    .table td{
        color:white;
    }
    .log button {
        background-color: #ff9800;
        color: #fff;
        border: none;
        cursor: pointer;
        font-size: 18px;
        padding: 10px 15px;
        border-radius: 10px;
    }
    @media screen and (max-width: 768px) {
        .table-container {
            overflow-x: auto;
        }

        .log {
            text-align: center;
        }

        .log button {
            margin-top: 10px;
        }
    }


</style>

@include('user.includes.footer')

@section('style')

@endsection
@section('script')

@endsection
