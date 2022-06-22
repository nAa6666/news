<!DOCTYPE html>
<html lang="ru" prefix="og: http://ogp.me/ns#">
<head>
    <title>@yield('title') - {{env('APP_NAME')}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta charset="utf-8">
    <meta property="og:locale" content="ru_RU">
    <meta name="theme-color" content="#dddddd">
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="stylesheet" href="{{ mix('styles/compiled/admin/style.min.css') }}">
</head>
<body>
    <div class="wrapper">
        @include('admin.header')
        <div class="wrapper-content">
            @yield('admin.content')
        </div>
    </div>
</body>
</html>
