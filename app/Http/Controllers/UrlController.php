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
        $url_id = $request->query('url_id');
        $url = Url::find($url_id);

        if (! $url)
            return redirect()->back()->with('error', 'That link does not exist');

        if ($url->user_id != Auth::id())
            return redirect()->back()->with('error', 'You can only edit links that belong to you');

        return view('site.links.edit')->with('url', $url);
    }

    public function saveEdit(Request $request) {
        $request->validate([
            'url_key' => 'required|unique:urls|alpha_dash',
            'url' => 'required|url'
        ]);

        $url_id = $request->input('url_id');
        $url_key = trim($request->input('url_key'));
        $url = trim($request->input('url'));

        $urlObj = Url::find($url_id);

        if (! $urlObj)
            return redirect('/user/links')->with('error', 'That link does not exist');

        if ($urlObj->user_id != Auth::id())
            return redirect('/user/links')->with('error', 'You can only edit your links');

        $urlObj->url_key = $url_key;
        $urlObj->url = $url;
        $urlObj->save();

        return redirect('/user/links')->with('success', 'That link has been saved successfully');
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

        if ($url->user_id != Auth::id())
            return redirect()->back()->with('error', 'You can only delete links that belong to you');

        $url->delete();

        return redirect()->back()->with('success', 'That link has been deleted successfully');
    }
}
