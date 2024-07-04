<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tinno Chat</title>

    @vite(['resources/js/app.js'])
    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/media/img/favicon.png') }}" type="image/png">

    <!-- Google Nunito font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&amp;display=swap"
          rel="stylesheet">

    <!-- Themify icons -->
    <link href="{{ asset('assets/icons/themify/themify-icons.css') }}" rel="stylesheet">

    <!-- Material design icons -->
    <link href="{{ asset('assets/icons/materialicons/css/materialdesignicons.min.css') }}" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Bundle styles -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/bundle.css') }}">

    <!-- Slick -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/slick/slick.css') }}">

    <!-- Fancybox -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fancybox/jquery.fancybox') }}.min.css" type="text/css" />

    <!-- Intro js -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/introjs/introjs.css') }}" type="text/css" />

    <!-- App styles -->
    <link rel="stylesheet" href="{{ asset('assets/css/app.min.css') }}">

    <!-- JQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
            integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @stack('style')
</head>

<body>
@yield('content')

</body>
<!-- Bundle scripts -->
<script src="{{ asset('assets/vendor/bundle.js') }}"></script>

<!-- Feather icons -->
<script src="{{ asset('assets/icons/feather/feather.min.js') }}"></script>

<!-- Slick -->
<script src="{{ asset('assets/vendor/slick/slick.min.js') }}"></script>

<!-- Fancybox -->
<script src="{{ asset('assets/vendor/fancybox/jquery.fancybox.min.js') }}"></script>

<!-- Intro js -->
<script src="{{ asset('assets/vendor/introjs/intro.js') }}"></script>

<!-- Jquery Stopwatch -->
<script src="{{ asset('assets/vendor/jquery.stopwatch.js') }}"></script>

<!-- Sweetalert2 -->
<script src="{{ asset('assets/vendor/sweetalert2.js') }}"></script>

<!-- App scripts -->
<script src="{{ asset('assets/js/app.min.js') }}"></script>

<!-- Examples -->
<script src="{{ asset('assets/js/examples.min.js') }}"></script>

<!-- Theme customizer scripts -->
<script src="{{ asset('assets/js/theme-customizer.min.js') }}"></script>

<!-- Mirrored from tinno.laborasyon.com/chat.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 14 Mar 2024 16:21:46 GMT -->
@stack('script')

</html>

