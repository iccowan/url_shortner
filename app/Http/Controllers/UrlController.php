<?php

namespace App\Http\Controllers;

use App\Models\Url;

use Illuminate\Http\Request;
use Auth;
use Config;

class UrlController extends Controller
{
    public function redirect($url_key) {
        $url = Url::where('url_key', $url_key)->first();

        if (! $url)
            return redirect('/')->with('error', 'That URL doesn\'t exist');

        $url->hit();
        return redirect($url->url);
    }

    public function index() {
        $urls = Url::where('user_id', Auth::id())->get();

        return view('site.links.index')->with('urls', $urls);
    }

    public function edit(Request $request) {
        return view('site.links.edit');
    }

    public function saveEdit(Request $request) {
        
    }

    public function create(Request $request) {
        $request->validate([
            'url' => 'required|url'
        ]);

        $url = $request->input('url');

        $urlObj = new Url();
        $urlObj->url = $url;
        $urlObj->user_id = Auth::id();

        $urlObj->save();

        return redirect()->back()->with('success', 'That link has been created successfully. The short URL is: ' . Config::get('app.url') . '/' . $urlObj->url_key);
    }

    public function delete(Request $request) {
        $urlId = $request->query('url_id');
        $url = Url::find($urlId);
        
        if (! $url)
            return redirect()->back()->with('error', 'Invalid link');

        $url->delete();

        return redirect()->back()->with('success', 'That link has been deleted successfully');
    }
}
