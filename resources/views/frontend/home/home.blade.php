<?php
$title = 'Trang chu'; ?>
@section('title', $title)
    @extends('frontend.layouts.main')
@section('content')
    <!-- Revolution Slider -->
    @include('frontend.home.sub_home._revolution_slider')
    <!-- End Revolution Slider -->

    <!-- Categories -->
    @if ($cates)
        @include('frontend.home.sub_home._category', compact('cates')))
    @endif
    <!-- End Categories -->

    <!-- Products -->
    @if ($products)
        @include('frontend.home.sub_home._featured_product', compact(['products', 'slogan_f_p', 'cates']))
    @endif
    <!-- End Products -->

    <!-- New Arrivals -->
    @if ($arrival_products)
        @include('frontend.home.sub_home._new_arrival', compact('arrival_products'))
    @endif
    <!-- End New Arrivals -->

    <!-- Promo Block -->
    @if ($countdown)
        @include('frontend.home.sub_home._promotion', compact('countdown'))
    @endif
    <!-- End Promo Block -->

    <!-- Categories -->
    {{-- @include('frontend.home.sub_home._seasons') --}}
    <!-- End Categories -->

    <!-- News -->
    @include('frontend.home.sub_home._news')
    <!-- End News -->

    <!-- Features -->
    @include('frontend.home.sub_home._features')
    <!-- End Features -->
@endsection
@include('frontend.home.stack')
