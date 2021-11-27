<?php
$title = __('Category' . ' - ' . $cate->name_seo);
$seo_keyword = 'category' . ', ';
$seo_keyword .= $cate->name . ', ' . $cate->name_seo;
?>
@push('meta')
    <meta name="description"
        content="{{ getTeaser($cate->description ? $cate->description : config('app.seo_desc'), 50) }}">
    <meta name="keyword" content="{{ $seo_keyword }}">
    <link rel="canonical" href="{{ url()->current() }}">
    <meta name="robots" content="{{ config('app.seo_robot') }}">
@endpush
@extends('frontend.layouts.main')
@section('title', $title)
@section('content')
    <!-- Breadcrumbs -->
    @include('frontend.category.sub_files.breadcrumb', compact(['cate']))
    <!-- End Breadcrumbs -->
    <!-- Products -->
    <div class="container">
        <div class="row">
            <!-- Content -->
            <div class="col-md-9 order-md-2">
                <div class="g-pl-15--lg">
                    <!-- Banner -->
                    <div class="g-bg-size-cover g-bg-pos-center g-mt-30 g-py-40"
                        style="background-image: url({{ $cate ? getImage($cate->big_thumb) : asset('frontend/img-temp/900x450/img1.jpg') }})">
                        <div class="g-pos-rel g-z-index-1 g-pa-50">
                            <span class="d-block g-color-primary g-font-weight-700 g-font-size-40 mb-0"></span>
                            <h2 class="g-color-white g-font-size-50 mb-3">{{ __($cate->name_seo . ' Collection') }}</h2>
                            {{-- <a class="btn u-btn-white g-brd-primary--hover g-color-primary g-color-white--hover g-bg-primary--hover g-font-size-12 text-uppercase g-py-12 g-px-25"
                                href="home-page-1.html">Shop Now</a> --}}
                        </div>
                    </div>
                    <!-- End Banner -->

                    <!-- Filters -->
                    @include('frontend.category.sub_files.filter_show', compact(['alias', 'limit', 'sort', 'show']))
                    <!-- End Filters -->
                    @if ($show && $show == 'list')
                        @include('frontend.category.list.item', compact(['products']))
                    @else
                        @include('frontend.category.sub_files.item', compact(['products']))
                    @endif
                </div>
            </div>
            <!-- End Content -->

            <!-- Filters -->
            @include('frontend.category.sub_files.filter', compact(['brands', 'other_cate', 'capas', 'alias']))
            <!-- End Filters -->
        </div>
    </div>
    <!-- End Products -->

    <!-- Call to Action -->
    @include('frontend.category.sub_files.action')
    <!-- End Call to Action -->

@endsection

@include('frontend.category/stack-cate')
