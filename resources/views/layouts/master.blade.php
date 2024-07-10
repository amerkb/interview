<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite('resources/css/app.css')

    <title> @yield('title')</title>
</head>
<body>
@include('layouts.header')
<div class=" px-[30px] duration-300 bg-[#f0f0fa] min-h-[calc(100vh-4.5rem)]">
    @yield('section')
</div>
</body>
</html>
