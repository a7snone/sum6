<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>النادي الصيفي - 6</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}" />

    <style>

    </style>

    <script src="{{asset('js/app.js')}}"></script>
</head>

<body class="antialiased container">

    <div class="header">@yield('header')</div>
    <div class="nav_bar">
        <ul>
            <li><a href="/">عن النادي الصيفي - 5</a></li>
            <!-- <li><a href="create">تسجيل جديد</a></li> -->
            <!-- <li><a href="contact.asp">استكمال بيانات</a></li> -->
            <li><a href="about.asp">تواصل معنا</a></li>
        </ul>
    </div>

    <div class="content">@yield('content')</div>
    <div class="footer">@yield('footer')</div>
</body>

</html>
