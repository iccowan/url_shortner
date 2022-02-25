<!-- THIS WILL BE A FORM WHERE THE REDIRECT URL AND URL KEY CAN BE EDITED -->
@extends('layouts.master')

@section('title')
    Edit Link
@endsection

@section('content')
    <div class="container">
        <h1>Edit Link</h1>
        <hr />

        <div class="row">
            <div class="col-md-2 col-0"></div>
            <div class="col-md-8 col-12">
                <form action="/user/links/edit" method="POST">
                    @csrf
                    <input type="hidden" name="url_id" value="{{ $url->id }}" />
                    <label for="url_key" class="mb-1">Customize Short URL</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">{{ Config::get('app.url') . '/' }}</span>
                        <input type="text" class="form-control" name="url_key" value="{{ old('url_key') ? old('url_key') : $url->url_key }}" />
                    </div>
                    <label for="url_key" class="mb-1">Update Redirect URL</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-link"></i></span>
                        <input type="text" class="form-control" name="url" value="{{ old('url') ? old('url') : $url->url }}" />
                    </div>
                    <button type="submit" class="btn btn-success">Save</button>
                    <a href="/user/links" class="btn btn-danger">Cancel</a>
                </form>
            </div>
            <div class="col-md-2 col-0"></div>
        </div>
    </div>
@endsection
