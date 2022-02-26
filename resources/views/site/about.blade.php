@extends('layouts.master')

@section('title')
    About
@endsection

@section('content')
    <div class="container">
        <h1>About Cowan URL</h1>
        <hr />
        <div class="row">
            <div class="col-md-6 col-12">
                <center>
                    <h5>Thank you for using Cowan URL!</h5>
                    <p>Cowan URL is intended to be a free to use and easy to use open source URL shortner. We are not responsible for any malicious redirects, and we suggest that you use caution when clicking URLs. To report a malicious URL, please send an email to <a href="mailto:ian@cowan.aero">ian@cowan.aero</a> and we will take action accordingly.</p>
                    <p>If you are unable to donate, but still interested in contributing to the project, please feel free to submit changes on the <a target="_none" href="https://github.com/iccowan/url_shortner">GitHub page</a>, or simply just share Cowan URL with people you know.
                </center>
            </div>
            <div class="col-md-6 col-12">
                <center>
                    <h5>If you enjoy Cowan URL and would like to support the continued development, donate here!</h5>
                    <br />
                    @include('inc.donate')
                </center>
            </div>
        </div>
    </div>
@endsection
