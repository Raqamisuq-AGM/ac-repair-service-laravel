<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Buyer;
use App\Models\Client;
use App\Models\Employee;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function forgetOtp($type)
    {
        if (session()->has('userOtp') && session('userOtp') !== null) {
            if (
                $type === 'admin' ||
                $type === 'seller' ||
                $type === 'employee' ||
                $type === 'buyer' ||
                $type === 'client' ||
                $type === 'user'
            ) {
                return view('forget-password-otp', compact('type'));
            } else {
                return abort(403);
            }
        } else {
            return abort(403);
        }
    }

    public function forgetOtpSubmit(Request $request)
    {
        if (session('userOtp') == $request->input('otp')) {
            return redirect()->route('update.password', ['type' => $request->input('type')]);
        } else {
            return redirect()->back()->withErrors([
                'otp' => 'Wrong OTP'
            ]);
        }
    }

    public function updatePassword($type)
    {
        if (
            session()->has('userOtp') && session('userOtp') !== null &&
            session()->has('userEmail') && session('userEmail') !== null
        ) {
            if (
                $type === 'admin' ||
                $type === 'seller' ||
                $type === 'employee' ||
                $type === 'buyer' ||
                $type === 'client' ||
                $type === 'user'
            ) {
                return view('update-password', compact('type'));
            } else {
                return abort(403);
            }
        } else {
            return abort(403);
        }
    }

    public function updatePasswordSubmit(Request $request)
    {
        $request->validate([
            'password' => 'required|min:8',
            'confirm_password' => 'required|same:password'
        ]);

        if (session()->has('userEmail') && session('userEmail') !== null) {
            $user = null;

            switch ($request->input('type')) {
                case 'admin':
                    $user = Admin::where('email', session('userEmail'))->first();
                    break;
                case 'seller':
                    $user = Seller::where('email', session('userEmail'))->first();
                    break;
                case 'employee':
                    $user = Employee::where('email', session('userEmail'))->first();
                    break;
                case 'buyer':
                    $user = Buyer::where('email', session('userEmail'))->first();
                    break;
                case 'client':
                    $user = Client::where('email', session('userEmail'))->first();
                    break;
                case 'user':
                    $user = User::where('email', session('userEmail'))->first();
                    break;
                default:
                    return redirect()->back()->withErrors([
                        'otp' => 'Invalid user type'
                    ]);
            }

            if ($user) {
                $user->password = Hash::make($request->input('password'));
                $user->save();
                return redirect()->route('filament.' . $request->input('type') . '.auth.login');
            } else {
                return redirect()->back()->withErrors([
                    'otp' => 'User not found'
                ]);
            }
        } else {
            return redirect()->back()->withErrors([
                'otp' => 'Session expired or invalid'
            ]);
        }
    }
}
