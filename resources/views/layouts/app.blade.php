<!DOCTYPE html>
{{-- <html lang="{{ str_replace("_", "-", app()->getLocale()) }}"> --}}
<html lang="en" dir="rtl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title','unknown title') | {{ config("app.name") }}</title>


    <link rel="stylesheet" href="{{ asset("css/themify-icons.css") }}">
    <link rel="stylesheet" href="{{ asset("css/feather.css") }}">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../images/favicon.png">
    <!-- Custom Stylesheet -->
    <link rel="stylesheet" href="{{ asset("css/style.css") }}">
    <link rel="stylesheet" href="{{ asset("css/style-rtl.css") }}">
    <link rel="stylesheet" href="{{ asset("css/emoji.css") }}">
    <link rel="stylesheet" href="{{ asset("css/lightbox.css") }}">

    @livewireStyles
</head>

<body class="color-theme-blue mont-font">

    <div class="preloader"></div>
    <div class="main-wrapper">

        @include('layouts.navigation')
        @include('layouts.right-navigation')

        {{-- main content --}}
        {{ $slot }}
        {{-- main content --}}



        @include('layouts\chat')





    </div>
   
    <script src="{{ asset("js/plugin.js")}}"></script>
    <script src="{{ asset("js/lightbox.js")}}"></script>

    <script src="{{ asset("js/scripts-rtl.js")}}"></script>





    @livewireScripts


</body>

</html>
