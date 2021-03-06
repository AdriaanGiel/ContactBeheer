<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="Contact Management" content="">
    <meta name="Adriaan Giel" content="">
    <title>@yield('title')</title>

    {{--<link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">--}}
    {{--<link rel="stylesheet" href="{{ asset('css/custom/style.css') }}" type="text/css">--}}
    {{--<link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap-cyborg.css') }}" type="text/css">--}}
    {{--<link rel="stylesheet" href="{{ asset('jquery-ui/jquery-ui.min.css') }}" type="text/css">--}}
    <link rel="stylesheet" href="{{ asset('css/admin/main.css') }}" type="text/css">
    <link rel="icon" href="{{ asset('img/favicon/favicon.ico') }}" type="image/x-icon">
    @yield('head')


</head>
<body>
@yield('header')
@yield('sidebar')
    @yield('content')
@yield('no_container')


{{--<script src="{{ asset('js/custom/all.js') }}"></script>--}}
{{--<script src="{{ asset('js/jquery.js') }}"></script>--}}
{{--<script src="{{ asset('js/custom/js.js') }}"></script>--}}
{{--<script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>--}}
{{--<script src="{{ asset('recources/assets/bower/admin-lte/plugins/jQuery/jQuery-2.2.0.min.js') }}"></script>--}}
{{--<script src="{{ asset('recources/assets/bower/admin-lte/plugins/jQueryUI/jquery-ui.min.js') }}"></script>--}}
{{--<script src="{{ asset('recources/assets/bower/adminLTE/bootstrap/js/bootstrap.min.js') }}"></script>--}}
{{--<script src="{{ asset('recources/assets/bower/admin-lte/dist/js/app.min.js') }}"></script>--}}
{{--<script src="{{ asset('recources/assets/bower/admin-lte/plugins/jQuery/jQuery-2.2.0.min.js') }}"></script>--}}
{{--<script src="{{ asset('js/admin/main.js') }}"></script>--}}

@yield('footer')
</body>
</html>