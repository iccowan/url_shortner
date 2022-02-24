<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

class AuthController extends Controller
{
    public function register() {
        
    }

    public function completeRegister() {
        
    }

    public function login() {
        
    }

    public function completeLogin() {
        
    }

    public function logout() {
        if (!Auth::check())
            return redirect()->back()->with('error', 'You are not logged in');

        Auth::logout();

        return redirect('/')->with('success', 'You have been logged out succesfully');
    }
}
