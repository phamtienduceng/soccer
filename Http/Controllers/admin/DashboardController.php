<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function Dashboard(Request $request)
    {
        $userId = $request->session()->get('user_id');
        return view('admin.pages.dashboard');
    }

    public function AuthForm()
    {
        return view('admin.auth.login');
    }

    public function AuthPost(Request $request)
    {
        $credentials = $request->validate([
            'user_email' => 'required',
            'user_password' => 'required',
        ]);

        $user = User::where('user_email', $credentials['user_email'])->first();

        if ($user  && Hash::check($credentials['user_password'], $user->user_password)) {
            if ($user && $user->user_role === 'Member') {
                return redirect()->back()->withErrors(['role_invalid' => 'You do not have access.']);
            }
            $request->session()->put('user_id', $user->user_id);
            return redirect()->route('admin.Dashboard');
        }
        return redirect()->back()->withErrors(['auth_invalid' => 'Invalid email or password.']);
    }

    public function AuthOut()
    {
        session()->forget('user_id');
        return redirect()->route('admin.AuthForm');
    }
}
