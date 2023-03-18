<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <link href="https://fonts.googleapis.com/css2?family=Barlow:ital,wght@0,300;0,400;0,500;0,600;1,300;1,400;1,500;1,600&display=swap" rel="stylesheet">
        <script src="/js/tinymce/tinymce.min.js"></script>

        @routes()
        @vite('resources/js/app.js')
        @inertiaHead()
    </head>
    <body class="antialiased">
        @inertia()
    </body>
</html>
