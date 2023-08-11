<?php

namespace App\Http\Controllers\ui;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        return view('ui.pages.index');
    }
    public function cart()
    {
        return view('ui.cart.add');
    }
    public function product()
    {
        return view('ui.product.show');
    }

    public function matches(){
        return view('ui.pages.matches');
    }

    public function players(){
        return view('ui.pages.players');
    }

    public function blog(){
        return view('ui.pages.blogs');
    }

    public function contact(){
        return view('ui.pages.contact');
    }

    public function AuthForm()
    {
        return view('ui.pages.auth.login');
    }

    public function AuthPost(Request $request)
    {
        $credentials = $request->validate([
            'user_email' => 'required',
            'user_password' => 'required',
        ]);

        $user = User::where('user_email', $credentials['user_email'])->first();

        if ($user && Hash::check($credentials['user_password'], $user->user_password)) {
            if ($user->user_status !== 'Active') {
                return redirect()->back()->withErrors(['status_invalid' => 'Your account has not been activated.']);
            }
            $request->session()->put('user_id', $user->user_id);
            return redirect()->route('ui.index');
        }
        return redirect()->back()->withErrors(['auth_invalid' => 'Invalid email or password.']);
    }

    public function AuthOut()
    {
        session()->forget('user_id');
        return redirect()->route('ui.index');
    }

    public function AuthRegisterForm()
    {
        return view('ui.pages.auth.register');
    }

    public function AuthRegister(request $request)
    {
        $request->validate([
            'user_name' => 'required|string|max:255',
            'user_email' => 'required|email|unique:users',
            'user_phone' => 'nullable|string|max:10',
            'user_password' => 'required|string|min:8|confirmed',
        ]);

        $user = new User();
        $user->user_name = $request->input('user_name');
        $user->user_email = $request->input('user_email');
        $user->user_phone = $request->input('user_phone');
        $user->user_password = Hash::make($request->input('user_password'));
        $user->save();

        return redirect()->route('ui.AuthPost');
    }
}
