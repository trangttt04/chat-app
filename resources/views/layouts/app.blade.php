<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <!-- Favicon -->
    <link rel="icon" href="{{asset('assets/media/img/favicon.png')}}" type="image/png">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">

    <!-- Google Nunito font -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700&amp;display=swap"
          rel="stylesheet">

    <!-- Material design icons -->
    <link href="{{asset('assets/icons/materialicons/css/materialdesignicons.min.css')}}" rel="stylesheet">

    <!-- Bundle Styles -->
    <link rel="stylesheet" href="{{asset('assets/vendor/bundle.css')}}">

    <!-- Landing page styles -->
    <link rel="stylesheet" href="{{asset('assets/css/landing-page.min.css')}}">
    @yield('style')

</head>

<body class="auth" style="background: url({{asset('assets/media/img/auth.jpg')}})">


<!-- 4.2. Khai báo div.container và ng-new -->
<div>
    @yield('content')
</div>


<!-- Bundle -->
<script src="{{asset('assets/vendor/bundle.js')}}"></script>

<!-- Landing page scripts -->
<script src="{{asset('assets/js/landing-page.min.js')}}"></script>

<!-- Theme customizer scripts -->
<script>let LANDING_PAGE = true;</script>

<script src="{{asset('js/theme-customizer.min.js')}}"></script>

@yield('script')

</body>

</html>
