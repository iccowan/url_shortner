@extends('layouts.master')

@section('title')
    Register
@endsection

@section('content')
    <div class="container">
        <h1>Register</h1>
        <hr />

        <div class="row">
            <div class="col-md-3 col-0"></div>
            <div class="col-md-6 col-12">
                <form action="/register", method="POST">
                    @csrf
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-user"></i></span>
                        <input type="text" class="form-control" name="name" placeholder="Name" value="{{ old('name') }}" />
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-envelope"></i></span>
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" />
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" class="form-control" name="password" placeholder="Password" />
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fa-solid fa-lock"></i></span>
                        <input type="password" class="form-control" name="password-confirm" placeholder="Confirm Password" />
                    </div>
                    <button type="submit" class="btn btn-success mb-3">Register</button>
                </form>

                <p>Already have an account? <a href="/login">Login now!</a></p>
            </div>
            <div class="col-md-3 col-0"></div>
        </div>
    </div>
@endsection

