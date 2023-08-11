<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return view('admin.pages.user.index', ['users' => $users]);
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $user->user_role = $request->input('user_role');
        $user->user_status = $request->input('user_status');

        $user->save();

        return redirect()->route('admin.user.index')->with('success_update', 'User updated successfully');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return redirect()->route('admin.user.index')->with('error', 'User not found');
        }

        $user->delete();

        return redirect()->route('admin.user.index')->with('success_del', 'User deleted successfully');
    }
}
