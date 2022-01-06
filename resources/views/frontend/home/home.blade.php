<?php
use Illuminate\Support\Arr;
$seo = metaData('home_page');
$title = $seo ? $seo->title : config('app.name');
?>
@push('meta')
    <meta name="description" content="{{ __($seo ? $seo->seo_desc : config('app.seo_desc')) }}">
    <meta name="keyword" content="{{ __($seo ? $seo->seo_keyword : config('app.seo_keyword')) }}">
    <link rel="canonical" href="{{ url()->current() }}">
    @if ($seo)
        <meta name="robots" content="{{ __($seo->seo_robot ? $seo->seo_robot : config('app.seo_robot')) }}">
    @endif
@endpush
@extends('frontend.layouts.main')
@section('title', __($title))

@section('content')
    <!-- Revolution Slider -->
    @include('frontend.home.sub_home._revolution_slider')
    <!-- End Revolution Slider -->

    <!-- Products -->
    @include('frontend.home.sub_home._featured_product')
    <!-- End Products -->

    <!-- New Arrivals -->
    @include('frontend.home.sub_home._new_arrival')
    <!-- End New Arrivals -->

    <!-- News -->
    {{-- @include('frontend.home.sub_home._news') --}}
    <!-- End News -->
@endsection
@include('frontend.home.stack')
