<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(["resources/sass/app.scss", "resources/js/app.js"])
    <title>@yield('title')</title>
</head>
<body>
    @include('layouts.blog.navegacao')
    <main class="container p-4">
        @yield('content')
    </main>
    @include('layouts.blog.footer')
</body>
</html>