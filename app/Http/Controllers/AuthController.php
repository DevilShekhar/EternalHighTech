<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;


class AuthController extends Controller
{
    // Show forgot password page
    public function forgotForm()
    {
        // return view('auth.email');
         return view('auth.passwords.email'); // FIXED
    }

    // Handle email submit → redirect to reset page
         public function sendResetLink(Request $request)
        {
            $request->validate(['email' => 'required|email']);

            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return back()->with('error', 'User not found');
            }

            $otp = rand(100000, 999999);

            $user->otp_code = $otp;
            $user->otp_expires_at = now()->addMinutes(5);
            $user->save();

            session(['reset_email' => $user->email]);

            \Mail::raw("Your OTP is: $otp", function ($message) use ($user) {
                $message->to($user->email)->subject('OTP Verification');
            });

            return redirect()->route('otp.form');
        }

        // otp page
        public function showOtpForm()
        {
            if (!session('reset_email')) {
                return redirect()->route('password.request');
            }

            return view('auth.otp');
        }

    // Show reset password page
            public function showResetForm()
            {
                if (!session('otp_verified')) {
                    return redirect()->route('password.request');
                }

                return view('auth.passwords.reset');
            }

            // verifyotp
            public function verifyOtp(Request $request)
            {
                $request->validate(['otp_code' => 'required']);

                $user = User::where('email', session('reset_email'))->first();

                if (!$user || $user->otp_code != $request->otp_code) {
                    return back()->with('error', 'Invalid OTP');
                }

                if ($user->otp_expires_at < now()) {
                    return back()->with('error', 'OTP expired');
                }

                session(['otp_verified' => true]);

                return redirect()->route('password.reset.form');
            }

    // Update password
        public function updatePassword(Request $request)
        {
            $request->validate([
                'password' => 'required|min:6|confirmed'
            ]);

            $user = User::where('email', session('reset_email'))->first();

            $user->password = bcrypt($request->password);
            $user->otp_code = null;
            $user->otp_expires_at = null;
            $user->save();

            session()->forget(['reset_email', 'otp_verified']);

            return redirect('/login')->with('status', 'Password updated successfully!');
        }
}