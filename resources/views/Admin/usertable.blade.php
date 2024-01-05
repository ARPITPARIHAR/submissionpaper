@extends('user.layouts.app')
@section('meta_title', '')
@include('user.includes.navbar')

<div class="table-container" style="margin-top: 120px; background-color: #f0f8ff; padding: 20px; border-radius: 10px;">
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
    <div class="log" style="text-align: right; margin-top: 10px;">
        <button type="submit" class="btn btn-warning">Logout</button>
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
        background-color: #d3eafd;
    }

    .btn {
        margin-right: 5px;
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
