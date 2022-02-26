@extends('layouts.master')

@section('title')
    My Links
@endsection

@section('content')
    <div class="container">
        <form action="/user/links/create", method="POST">
            @csrf
            <div class="input-group">
                <input type="text" class="form-control" name="url" placeholder="Enter a URL Here" value="{{ old('url') }}" />
                <button type="submit" class="btn btn-success">Shorten</button>
            </div>
        </form>
        <hr />
        @if (count($urls) == 0)
            <p>You have no links. Try adding one to begin!</p>
        @else
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">URL</th>
                        <th scope="col">Redirect</th>
                        <th scope="col"># of Clicks</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($urls as $url)
                        <tr>
                            <td>
                                @php
                                    $shortUrl = Config::get('app.url') . '/' . $url->url_key;
                                    $longUrl = $url->url;
                                @endphp
                                <a href="{{ $shortUrl }}" target="_none">{{ $shortUrl }}</a>
                            </td>
                            <td>
                                <a href="{{ $longUrl }}" target="_none">{{ $longUrl }}</a>
                            </td>
                            <td><center>{{ $url->num_hits }}</center></td>
                            <td><center><a href="/user/links/edit?url_id={{ $url->url_safe_id }}">Edit</a></center></td>
                            <td><center><a href="/user/links/delete?url_id={{ $url->url_safe_id }}">Delete</a></center></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection
