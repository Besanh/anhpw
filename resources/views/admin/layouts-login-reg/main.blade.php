<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    @include('admin.layouts-login-reg.head')

</head>

<body class="bg-gradient-primary">

    <div class="container">

        @yield('content')

    </div>

    @include('admin.layouts-login-reg.script')

</body>

</html>