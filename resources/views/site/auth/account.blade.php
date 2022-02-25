@extends('layouts.master')

@section('title')
    My Account
@endsection

@section('content')
    <div class="container">
        <h1>My Account</h1>
        <hr />

        <div class="row">
            <div class="col-md-3 col-0"></div>
            <div class="col-md-6 col-12">
                <form action="/user/save", method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') ? old('name') : $user->name }}" />
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') ? old('email') : $user->email }}" />
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Password" />
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" class="form-control" name="password-confirm" placeholder="Confirm Password" />
                    </div>
                    <hr />
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-unlock"></i></span>
                        <input type="password" class="form-control" name="current-password" placeholder="Current Password" />
                    </div>
                    <button type="submit" class="btn btn-success mb-3">Save</button>
                </form>
            </div>
            <div class="col-md-3 col-12"></div>
        </div>
    </div>
@endsection
