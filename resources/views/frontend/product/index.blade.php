<?php
use Illuminate\Support\Arr;

$title = __('Product' . ' - ' . $product_detail->name_seo);
?>
@push('meta')
    <meta name="description"
        content="{{ getTeaser($product_detail->getSeo->seo_desc ? $product_detail->getSeo->seo_desc : config('app.seo_desc'), 50) }}">
    <meta name="keyword"
        content="{{ $product_detail->getSeo->seo_keyword ? $product_detail->getSeo->seo_keyword : config('app.seo_keyword') }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="robots"
        content="{{ $product_detail->getSeo->seo_robot ? $product_detail->getSeo->seo_robot : config('app.seo_robot') }}">
@endpush
@extends('frontend.layouts.main')
@section('title', $title)
@section('content')
    <!-- Product Description -->
    <div class="container g-pt-50 g-pb-100">
        <div class="row">
            <div class="col-sm-5 col-xs-5 col-lg-5">
                <!-- Carousel -->
                @includeIf('frontend.product.sub_product.carousel', [
                'image' => $product_detail->image,
                'image_thumb_small' => $product_detail->image_thumb_small,
                'galleries' => $product_detail->galleries,
                'thumb_small' => $product_detail->thumb_small
                ])
                <!-- End Carousel -->
            </div>

            <div class="col-sm-7 col-xs-7 col-lg-7">
                <div class="g-px-40--lg">
                    @include('frontend.product.sub_product.detail')
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Description -->

    <!-- Description -->
    @include('frontend.product.sub_product.description')
    <!-- End Description -->

    <!-- Products -->
    {{-- @if ($related_products->count() > 0)
        @include('frontend.product.sub_product.related_product')
    @endif --}}

    <!-- End Products -->
@endsection
@include('frontend.product.stack')
