<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SubAdminController extends Controller
{
    public function dashboard()
    {
        // Fetch all users except admins
        $users = User::whereIn('role', ['normal', 'subadmin'])->get();
        return view('subadmin.dashboard', compact('users'));
    }

    public function setRole(Request $request, User $user)
    {
        $request->validate(['role' => 'required|in:admin,subadmin,normal']);
        $user->update(['role' => $request->role]);
        return back()->with('success', 'Role updated successfully.');
    }

    public function deleteUser(User $user)
    {
        if (Auth::id() === $user->id) {
            return back()->with('error', 'You cannot delete yourself.');
        }

        if ($user->role !== 'normal') {
            return back()->with('error', 'You can only delete Normal users.');
        }

        $user->delete();

        return back()->with('success', 'User deleted successfully.');
    }
}