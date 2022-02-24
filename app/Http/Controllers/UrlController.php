<?php

namespace App\Http\Controllers;

use App\Models\Url;

use Illuminate\Http\Request;

class UrlController extends Controller
{
    public function redirect($url_key) {
        $url = Url::where('url_key', $url_key)->first();

        if (! $url)
            return redirect('/')->with('error', 'That URL doesn\'t exist');

        return redirect($url->url);
    }
}
