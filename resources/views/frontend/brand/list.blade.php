<?php
$seo = metaData('all_brand_page'); ?>
@push('meta')
    <meta name="description" content="{{ $seo ? $seo->seo_desc : config('app.seo_desc') }}">
    <meta name="keyword" content="{{ $seo ? $seo->seo_keyword : config('app.seo_keyword') }}">
    <meta name="robots" content="{{ $seo ? $seo->seo_robot : config('app.seo_robot') }}">
    <link rel="canonical" href="{{ url()->current() }}">
@endpush
@extends('frontend.layouts.main')
@section('title', __('All Brand'))

@section('content')
    <div class="container">
        <!-- Banner -->
        <div class="g-bg-size-cover g-bg-pos-center g-py-40 g-mt-50"
            style="background-image: url({{ 'http://127.0.0.1:8000/userfiles/images/category_big_thumb/2021/10/1633534002.9381.jpg' }});">
            <div class="g-pos-rel g-z-index-1 g-pa-50">
                <span class="d-block g-color-primary g-font-weight-700 g-font-size-40 mb-0"></span>
                <h2 class="g-color-white g-font-size-50 mb-3">{{ __('All Brand') }}</h2>
            </div>
        </div>
        <!-- End Banner -->

        <!-- Filters -->
        <div class="d-flex justify-content-end align-items-center g-brd-bottom g-brd-gray-light-v4 g-pt-40 g-pb-20">
            <!-- Show -->
            <div class="g-mr-60">
                <h2 class="h6 align-middle d-inline-block g-font-weight-400 text-uppercase g-pos-rel g-top-1 mb-0">Show:
                </h2>

                <!-- Secondary Button -->
                <div class="d-inline-block btn-group">
                    <button type="button"
                        class="btn btn-secondary dropdown-toggle h6 align-middle g-brd-none g-color-gray-dark-v5 g-color-black--hover g-bg-transparent text-uppercase g-font-weight-300 g-font-size-12 g-pa-0 g-pl-10 g-ma-0"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        9
                    </button>
                    <div class="dropdown-menu rounded-0">
                        <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">All</a>
                        <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">5</a>
                        <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">15</a>
                        <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">20</a>
                        <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">25</a>
                    </div>
                </div>
                <!-- End Secondary Button -->
            </div>
            <!-- End Show -->

            <!-- Sort By -->
            <div class="g-mr-60">
                <h2 class="h6 align-middle d-inline-block g-font-weight-400 text-uppercase g-pos-rel g-top-1 mb-0">Sort by:
                </h2>

                <!-- Secondary Button -->
                <div class="d-inline-block btn-group">
                    <button type="button"
                        class="btn btn-secondary dropdown-toggle h6 align-middle g-brd-none g-color-gray-dark-v5 g-color-black--hover g-bg-transparent text-uppercase g-font-weight-300 g-font-size-12 g-pa-0 g-pl-10 g-ma-0"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Bestseller
                    </button>
                    <div class="dropdown-menu rounded-0">
                        <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">Bestseller</a>
                        <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">Trending</a>
                        <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">Price low to high</a>
                        <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300" href="#">price high to low</a>
                    </div>
                </div>
                <!-- End Secondary Button -->
            </div>
            <!-- End Sort By -->

            <!-- Sort By -->
            <ul class="list-inline mb-0">
                <li class="list-inline-item">
                    <a class="u-icon-v2 u-icon-size--xs g-brd-gray-light-v3 g-brd-black--hover g-color-gray-dark-v5 g-color-black--hover"
                        href="page-list-filter-left-sidebar-1.html">
                        <i class="icon-list"></i>
                    </a>
                </li>
                <li class="list-inline-item">
                    <a class="u-icon-v2 u-icon-size--xs g-brd-primary g-color-primary"
                        href="page-grid-filter-left-sidebar-1.html">
                        <i class="icon-grid"></i>
                    </a>
                </li>
            </ul>
            <!-- End Sort By -->
        </div>
        <!-- End Filters -->

        <!-- Products -->
        <div class="row g-pt-30 g-mb-50">
            @if ($brands)
                @foreach ($brands as $b)
                    <div class="col-6 col-lg-3 g-mb-30">
                        <!-- Product -->
                        <figure class="g-pos-rel g-mb-20">
                            <a href="{{ route('brand', ['alias' => $b->alias]) }}">
                                <img class="img-fluid" src="{{ $b->image ? $b->image : getNoImage() }}"
                                    alt="{{ $b->name_seo }}">
                            </a>
                        </figure>

                        <div class="media">
                            <!-- Product Info -->
                            <div class="d-flex flex-column">
                                <h4 class="h6 g-color-black mb-1">
                                    <a class="u-link-v5 g-color-black g-color-primary--hover"
                                        href="{{ route('brand', ['alias' => $b->alias]) }}">
                                        {{ $b->name_seo }}
                                    </a>
                                </h4>
                                {{-- <a class="d-inline-block g-color-gray-dark-v5 g-font-size-13" href="#">Man</a> --}}
                            </div>
                            <!-- End Product Info -->

                        </div>
                        <!-- End Product -->
                    </div>
                @endforeach
            @else
                {{ __('No data found') }}
            @endif
        </div>
        <!-- End Products -->

        <hr class="g-mb-60">

        <!-- Pagination -->
        <nav class="g-mb-100" aria-label="Page Navigation">
            {{ $brands->links('vendor.pagination.custom-pagination') }}
        </nav>
        <!-- End Pagination -->
    </div>

@endsection
@include('frontend.brand.stack')
