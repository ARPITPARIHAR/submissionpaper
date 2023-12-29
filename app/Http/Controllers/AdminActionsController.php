<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminActionsController extends Controller
{
    public function showUserTable()
    {
        $users = User::all();
        $roles = ['admin', 'user', 'client']; // Define your roles here

        return view('Admin.usertable', compact('users', 'roles'));
    }

    public function showChangePasswordForm($userId)
{
    $user = User::findOrFail($userId);
    return view('admin.changepassword', compact('user'));
    
}


public function processChangePassword(Request $request, $userId)
{
    $request->validate([
        'password' => 'required|string|min:6|confirmed',
    ]);

    $user = User::findOrFail($userId);
    $user->password = Hash::make($request->password);
    $user->save();

    // Check if the password change was successful
    if ($user->wasChanged()) {
        return redirect()->route('adminusertable')->with('success', 'Password changed successfully');
    } else {
        return redirect()->back()->with('error', 'Failed to change password. Please try again.');
    }
}



    public function assignRole(Request $request, $userId)
    {
        $request->validate([
            'role' => 'required|in:admin,user,client',
        ]);
    
        $user = User::find($userId);
        $user->user_type = $request->role;
        $user->save();
    
        return redirect()->back()->with('success', 'Role assigned successfully.');
    }
    


    public function removeUser($userId)
    {
        User::destroy($userId);

        return redirect()->back()->with('success', 'User removed successfully.');
    }
}