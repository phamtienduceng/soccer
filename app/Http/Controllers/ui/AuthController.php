<?php


namespace App\Http\Controllers\ui;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Password;

class AuthController extends Controller
{
    public function profile(Request $request)
    {
        $userId = session('user_id');
        $user = user::find($userId);

        return view('ui.pages.Auth.profile', compact('user'));
    }

    public function storeProfile(Request $request)
    {
        $validatedData = $request->validate([
            'user_name' => 'required',
            'user_email' => 'required|email|unique:users,user_email,' . session('user_id'),
            'user_phone' => 'required|digits:10|unique:users,user_phone,' . session('user_id'),
            'current_password' => 'required',
            'new_password' => 'nullable|min:6|confirmed'
        ]);

        $user = user::find(session('user_id'));

        // Check if current password matches
        if (!Hash::check($validatedData['current_password'], $user->user_password)) {
            return back()->withErrors([
                'current_password' => 'The current password does not match our records.'
            ])->with('error', 'The current password does not match our records.');
        }

        // Update user information
        $user->user_name = $validatedData['user_name'];
        $user->user_email = $validatedData['user_email'];
        $user->user_phone = $validatedData['user_phone'];

        // Update password if a new one is provided
        if (!empty($validatedData['new_password'])) {
            $user->user_password = Hash::make($validatedData['new_password']);
        }

        $user->updated_at = now();
        $user->save();
    }

    public function changePassword(Request $request)
    {
        $validatedData = $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        $userId = session('user_id');
        $user = user::find($userId);

        if (!Hash::check($validatedData['current_password'], $user->user_password)) {
            return back()->withErrors(['current_password' => 'The current password is incorrect.'])->withInput();
        }

        $user->user_password = Hash::make($validatedData['new_password']);
        $user->save();

        return redirect()->route('ui.profile')->with('successPassword', 'Password changed successfully!');
    }

    public function changeName(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'regex:/^[a-zA-Z\s]+$/'],
        ]);

        $userId = session('user_id');
        $user = user::find($userId);

        $user->user_name = $request['name'];

        $user->save();

        return redirect()->route('ui.profile')->with('successName', 'Name changed successfully!');
    }

    public function changePhone(Request $request)
    {
        $request->validate([
            'phone' => ['required', 'string', 'max:255', 'regex:/^[0-9\s]+$/'],
        ]);

        $userId = session('user_id');
        $user = user::find($userId);

        // Check if the phone number is already associated with another user
        $existinguser = user::where('user_phone', $request->input('phone'))
            ->where($user->getKeyName(), '<>', $user->getKey())
            ->first();

        if ($existinguser) {
            return redirect()->back()->withErrors(['phone' => 'This phone number is already associated with another user.']);
        }

        $user->user_phone = $request->input('phone');
        $user->save();

        return redirect()->back()->with('successPhone', 'Phone number has been updated successfully.');
    }

    public function showForgotPasswordForm()
    {
        return view('ui.pages.ui.options.forgot-password');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $user = user::where('user_email', $request->email)->first();

        if (!$user) {
            return back()->withErrors(['email' => 'The email does not exist.']);
        }

        // Generate reset password token
        $token = Str::random();

        $user->remember_token = $token;
        $user->save();

        // Send email with reset link
        Mail::send('ui.pages.ui.email.email', ['token' => $token], function ($message) use ($user) {
            $message->to($user->user_email);
            $message->subject('Reset Your Password');
        });

        $request->session()->put('reset-user-id', $user->user_id);

        return back()->with('successSendEmail', 'We have emailed a reset link to you.');
    }

    public function showResetPasswordForm($token, Request $request)
    {
        $user = user::where('remember_token', $request->token)->first();

        if (!$user) {
            return redirect('/')->withErrors(['token' => 'The reset token is invalid.']);
        }

        return view('ui.pages.ui.email.reset-password', compact('token'));
    }

    public function resetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'password' => 'required|min:6|confirmed'
        ]);

        $user = user::where('remember_token', $request->token)->first();

        if (!$user) {
            return redirect()->route('home')->withErrors(['token' => 'The reset token is invalid.']);
        }

        $newPassword = $request->password;

        $user->user_password = Hash::make($request->password);
        $user->remember_token = null;
        $user->save();

        if (Hash::check($newPassword, $user->user_password)) {
            $request->session()->forget('reset-user-id');
            return redirect()->route('ui.login')->with('successResetPass', 'Your password has been reset successfully.');
        } else {
            return response()->json(['error' => 'Error updating password'], 422);
        }
    }
}
