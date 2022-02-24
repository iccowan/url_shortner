<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index() {
        return view('site.home');
    }

    public function about() {
        return view('site.about');
    }
}
