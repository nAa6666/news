<!DOCTYPE html>
<html lang="ru" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="utf-8">
    <meta property="og:locale" content="en_EN">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no, shrink-to-fit=no">
    <meta name="theme-color" content="#dddddd">
    <title>Test</title>
    <link rel="stylesheet" href="{{ mix('styles/compiled/style.min.css') }}">
</head>
<body>
    @include('header')
    @yield('content')
    @include('footer')
</body>
</html>
