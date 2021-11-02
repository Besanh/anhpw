<?php
use Illuminate\Support\Arr;
$seo = metaData('home_page');
?>
@push('meta')
    <meta name="description" content="{{ __($seo && $seo->count() > 0 ? $seo->seo_desc : config('app.seo_desc')) }}">
    <meta name="keyword" content="{{ __($seo && $seo->count() > 0 ? $seo->seo_keyword : config('app.seo_keyword')) }}">
@endpush
@section('title', __(($seo && $seo->count() > 0) ? $seo->title : config('app.name')))
    @extends('frontend.layouts.main')
@section('content')
    <!-- Revolution Slider -->
    @include('frontend.home.sub_home._revolution_slider', compact('sliders'))
    <!-- End Revolution Slider -->

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
    @if ($countdown && $countdown->value_setting > date('Y/m/d H:i'))
        @include('frontend.home.sub_home._promotion', compact('countdown'))
    @endif
    <!-- End Promo Block -->

    <!-- News -->
    @include('frontend.home.sub_home._news')
    <!-- End News -->

    <!-- Features -->
    @include('frontend.home.sub_home._features')
    <!-- End Features -->
@endsection
@include('frontend.home.stack')
