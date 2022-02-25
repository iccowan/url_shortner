<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Auth;

use App\Models\User;

class AuthController extends Controller
{
    public function register() {
        return view('site.auth.register');
    }

    public function completeRegister(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:8',
            'password-confirm' => 'required|same:password'
        ]);
        
        $name = trim($request->input('name'));
        $email = trim($request->input('email'));
        $password = trim($request->input('password'));

        $user = new User();
        $user->name = $name;
        $user->email = $email;
        $user->password = Hash::make($password);
        $user->save();

        return redirect('/login')->with('success', 'Account created successfully. Login below to continue');
    }

    public function login() {
        return view('site.auth.login');
    }

    public function completeLogin(Request $request) {
        $email = trim($request->input('email'));
        $password = trim($request->input('password'));

        $user = User::where('email', $email)->first();

        if (! $user)
            return redirect()->back()->with('error', 'No user exists with that email');

        if (! Hash::check($password, $user->password))
            return redirect()->back()->with('error', 'Incorrect password');

        Auth::login($user);

        return redirect('/user/links')->with('success', 'Logged in successfully');
    }

    public function logout() {
        if (!Auth::check())
            return redirect()->back()->with('error', 'You are not logged in');

        Auth::logout();

        return redirect('/')->with('success', 'You have been logged out succesfully');
    }

    public function showUser() {
        $user = Auth::user();
        return view('site.auth.account')->with('user', $user);
    }

    public function saveUser(Request $request) {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
        ]);

        $name = trim($request->input('name'));
        $email = trim($request->input('email'));
        $password = trim($request->input('password'));
        $passwordConfirm = trim($request->input('password-confirm'));
        $currentPassword = $request->input('current-password');

        $user = Auth::user();

        if (! Hash::check($currentPassword, $user->password))
            return redirect()->back()->withInput()->with('error', 'Incorrect current password');

        if ($email != $user->email) {
            $userEmail = User::where('email', $email)->first();

            if ($userEmail)
                return redirect()->back()->withInput()->with('error', 'That email has already been taken');
        }

        if (! empty($password)) {
            if (strlen($password) < 8)
                return redirect()->back()->withInput()->with('error', 'Password cannot be shorter than 8 characters');

            if ($password != $passwordConfirm)
                return redirect()->back()->withInput()->with('error', 'New password must match confirmation');

            $user->password = Hash::make($password);
        }

        $user->email = $email;
        $user->name = $name;
        $user->save();

        return redirect()->back()->with('success', 'Saved successfully');
    }

    public function saveUserPassword(Request $request) {
        
    }
}
