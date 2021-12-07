<!-- Title -->
<title>@yield('title')</title>

<!-- Required Meta Tags Always Come First -->
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta http-equiv="x-ua-compatible" content="ie=edge">
@stack('meta')
<meta name="author" content="{{ __(config('app.seo_author')) }}" />
<meta name="copyright" content="{{ __(config('app.seo_author')) }}" />

<!-- Favicon -->
<link rel="shortcut icon" href="{{ asset('userfiles/images/logo/home-2.png') }}">

<!-- Home -->
@stack('link-home')
<!--  Page category-->
@stack('link-cate')

<!-- Comming soon -->
@stack('link-comming-soon')

<!-- Product detail -->
@stack('link-product-detail')

<!-- Cart -->
@stack('link-cart-empty')
@stack('link-cart')
@stack('link-cart-notify')

<!-- Store -->
@stack('link-store')

<!-- Help -->
@stack('link-help')

<!-- Contact -->
@stack('link-contact')