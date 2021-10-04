<?php
$title = "Trang chu";
?>
@section('title', $title)
@extends('frontend.layouts.main')
@section('content')
    <!-- Revolution Slider -->
    @include('frontend.home.sub_home._revolution_slider')
    <!-- End Revolution Slider -->

    <!-- Categories -->
    @include('frontend.home.sub_home._category', compact('cates')))
    <!-- End Categories -->

    <!-- Products -->
    @include('frontend.home.sub_home._featured_product', compact(['products', 'slogan_f_p']))
    <!-- End Products -->

    <!-- Promo Block -->
    @include('frontend.home.sub_home._promotion')
    <!-- End Promo Block -->

    <!-- New Arrivals -->
    @include('frontend.home.sub_home._new_arrival')
    <!-- End New Arrivals -->

    <!-- Categories -->
    @include('frontend.home.sub_home._seasons')
    <!-- End Categories -->

    <!-- News -->
    @include('frontend.home.sub_home._news')
    <!-- End News -->

    <!-- Features -->
    @include('frontend.home.sub_home._features')
    <!-- End Features -->
@endsection