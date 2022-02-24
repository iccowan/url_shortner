<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Meta Stuffz -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="URL Shortner with the dot aero TLD">
        <meta name="author" content="Ian Cowan">

        <!-- Stylesheets -->
        <link rel="stylesheet" href="/css/app.css">

        <!-- JS Scripts -->
        <script src="/js/app.js"></script>

        <title>@yield('title') | URL Shortner</title>

        <!-- Bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

        <!-- Font Awesome -->
        <script src="https://kit.fontawesome.com/cc940c021e.js" crossorigin="anonymous"></script>
    </head>
    <body>
        <!-- Navbar -->
        @include('inc.navbar')

        <!-- Messages -->
        @include('inc.messages')

        <!-- Content -->
        @yield('content')
    </body>
</html>
