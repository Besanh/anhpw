<?php
$title = __('Product' . ' - ' . $product->p_name_seo); ?>
@push('meta')
    <meta name="description"
        content="{{ getTeaser($product->getSeo->seo_desc ? $product->getSeo->seo_desc : config('app.seo_desc'), 50) }}">
    <meta name="keyword"
        content="{{ $product->getSeo->seo_keyword ? $product->getSeo->seo_keyword : config('app.seo_keyword') }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="robots"
        content="{{ $product->getSeo->seo_robot ? $product->getSeo->seo_robot : config('app.seo_robot') }}">
@endpush
@section('title', $title)
    @extends('frontend.layouts.main')
@section('content')
    <!-- Product Description -->
    <div class="container g-pt-50 g-pb-100">
        <div class="row">
            <div class="col-lg-7">
                <!-- Carousel -->
                @includeIf('frontend.product.sub_product.carousel', [
                'image' => $product->image,
                'image_thumb_small' => $product->image_thumb_small,
                'galleries' => $product->galleries,
                'thumb_small' => $product->thumb_small
                ])
                <!-- End Carousel -->
            </div>

            <div class="col-lg-5">
                <div class="g-px-40--lg g-pt-70">
                    @include('frontend.product.sub_product.detail', compact('product'))
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Description -->

    <!-- Description -->
    @include('frontend.product.sub_product.description', compact('product'))
    <!-- End Description -->

    <!-- Review -->
    @include('frontend.product.sub_product.review')
    <!-- End Review -->

    <!-- Products -->
    @if ($related_products->count() > 0)
        @include('frontend.product.sub_product.related_product', compact('related_products'))
    @endif

    <!-- End Products -->
@endsection
@include('frontend.product.stack')
