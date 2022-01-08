<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
<meta name="author" content="{{config('app.author')}}">

    <title>@yield('title')</title>

    {{-- @livewireStyles --}}

    <link rel="shortcut icon" href="{{ asset('userfiles/images/logo/home-2.png') }}">

    <!-- Custom fonts for this template-->
    <link href="{{ asset('css/admin/all.min.css') }}" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="{{ asset('css/admin/sb-admin-2.min.css') }}" rel="stylesheet" />

    {{-- Select 2 --}}
    <link href="{{asset('css/select2/select2.min.css')}}" rel="stylesheet" />

    {{-- Css Loader --}}
    <link href="{{ asset('css/loader.css') }}" rel="stylesheet" />

    {{-- Custom css --}}
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />

    @stack('link-edit-table')

</head>
