<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\User;

class ProfileController extends Controller
{
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'mobile_number' => 'nullable',
            'address' => 'nullable',
            'gender' => 'nullable',
            'date_of_birth' => 'nullable',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'mobile_number' => $request->mobile_number,
            'address' => $request->address,
            'gender' => $request->gender,
            'date_of_birth' => $request->date_of_birth,
        ];

        // HANDLE IMAGE
        if ($request->hasFile('profile_photo')) {

            $file = $request->file('profile_photo');
            $filename = time().'_'.$file->getClientOriginalName();
            $path = $file->storeAs('profile_photos', $filename, 'public');

            $data['profile_photo'] = $path;
        }

        $user->update($data);

        return redirect()->route('profile.edit')->with('success', 'Profile updated successfully');
    }

    // change password

    public function showVerifyPassword()
    {
        return view('profile.verify-password');
    }

    public function verifyPassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required'
        ]);

        $user = Auth::user();

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->withErrors(['old_password' => 'Old password is incorrect']);
        }

        // ✅ store verification in session
        session(['password_verified' => true]);

        return redirect()->route('password.new');
    }

    public function showNewPassword()
    {
        if (!session('password_verified')) {
            return redirect()->route('password.verify')
                ->withErrors(['error' => 'Please verify old password first']);
        }

        return view('profile.new-password');
    }

    public function updateNewPassword(Request $request)
    {
        if (!session('password_verified')) {
            return redirect()->route('password.verify');
        }

        $request->validate([
            'new_password' => 'required|min:6|confirmed',
        ]);

        $user = Auth::user();

        // 🔐 CHECK: new password should NOT match old password
        if (Hash::check($request->new_password, $user->password)) {
            return back()->withErrors([
                'new_password' => 'You cannot use your old password as the new password.'
            ]);
        }

        // ✅ update password
        $user->password = Hash::make($request->new_password);
        $user->save();

        // clear session
        session()->forget('password_verified');

        return redirect()->route('password.verify')
            ->with('success', 'Password changed successfully');
    }
}
