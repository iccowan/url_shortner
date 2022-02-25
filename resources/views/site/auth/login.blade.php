@extends('layouts.master')

@section('title')
    Login
@endsection

@section('content')
    <div class="container">
        <h1>Login</h1>
        <hr />

        <div class="row">
            <div class="col-md-3 col-0"></div>
            <div class="col-md-6 col-12">
                <form action="/login", method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                        <input type="email" class="form-control" name="email" placeholder="Email" />
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Password" />
                    </div>
                    <button type="submit" class="btn btn-success mb-3">Login</button>
                </form>

                <p>Don't have an account? <a href="/register">Register now!</a></p>
            </div>
            <div class="col-md-3 col-0"></div>
        </div>
    </div>
@endsection
