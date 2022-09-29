<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function get_login()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // return $request;

        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // return $credentials;

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('ack.index');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

        // $request->validate([
        //     'email' => 'required|email',
        //     'password' => 'required'
        // ]);

        // $user = User::where('email', $request)->first();    // first() last() get()
        // $user->login();

        // return redirect()->route('ack.index');
    }

    public function logout(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id'
        ]);

        $user = User::find($request->user_id);

        $user->logout();

        return redirect()->route('login')->with(['custom_success' => 'Goodbye dude..']);
    }
}
