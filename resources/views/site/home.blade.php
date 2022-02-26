@extends('layouts.master')

@section('title')
    Home
@endsection

@section('content')
    <div class="container">
        <center>
            <h1>Cowan URL</h1>
            <h3>The free and simple URL Shortning service</h3>
            <br />
            <h3><a href="/login">Get started now!</a></h3>
            <hr />
            <h3>Enjoy Cowan URL?</h3>
            <h5>Consider donating!</h5>
            <p>Cowan URL will always be free, so if you enjoy using it consider making a donation! If you are unable to donate, but have some other skills you are willing to share, please contribute through the <a target="_none" href="https://github.com/iccowan/url_shortner">GitHub page</a>. Or, you can support Cowan URL simply by sharing!</p>
            @include('inc.donate')
        </center>
    </div>
@endsection
