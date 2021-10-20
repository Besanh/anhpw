<!-- Title -->
<title>E-commerce Home Page 1 | Unify - Responsive Website Template</title>

<!-- Required Meta Tags Always Come First -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('userfiles/images/logo/home-2.png') }}">

<!-- Google Fonts -->
<link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700,900">

<!-- CSS Global Compulsory -->
<link rel="stylesheet" href="{{ asset('frontend/css/bootstrap/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{ asset('frontend/css/icon-awesome/font-awesome.min.css') }}">
<!-- CSS Unify Theme -->
<link rel="stylesheet" href="{{ asset('frontend/css/styles.e-commerce.css') }}">

<!-- CSS Customization -->
<link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">

<!-- Home -->
@stack('link-home')
<!--  Page category-->
@stack('link-cate')

<!-- Comming soon -->
@stack('link-comming-soon')

<!-- Product detail -->
@stack('link-product-detail')
