<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //login method
    public function login()
    {
        return view('pages.auth.login');
    }

    //login submit method
    public function loginSubmit(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            toastr()->success('You are logged in successfully');
            return redirect()->route('dashboard');
        }

        return back()->withErrors(['invalid_credential' => 'Invalid credentials']);
    }

    //logout method
    public function logout()
    {
        Auth::logout();

        return redirect()->intended('/login');
    }
}
