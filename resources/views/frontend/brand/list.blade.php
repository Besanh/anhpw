<?php
use App\Models\Category;

$seo = metaData('all_brand_page');
?>
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
            style="background-image: url({{ getImage('userfiles/images/breadcrumb_bg/breadcrumb_perfume.jpg') }});">
            <div class="g-pos-rel g-z-index-1 g-pa-50">
                <span class="d-block g-color-primary g-font-weight-700 g-font-size-40 mb-0"></span>
                <h2 class="g-color-white g-font-size-50 mb-3">{{ __('All Brand') }}</h2>
            </div>
        </div>
        <!-- End Banner -->

        <!-- Filters -->
        {{-- <div class="d-flex justify-content-end align-items-center g-brd-bottom g-brd-gray-light-v4 g-pt-40 g-pb-20">
            <!-- Sort By -->
            <div class="g-mr-60">
                <h2 class="h6 align-middle d-inline-block g-font-weight-400 text-uppercase g-pos-rel g-top-1 mb-0">
                    {{ __('Sort by') }}:
                </h2>

                <!-- Secondary Button -->
                <div class="d-inline-block btn-group g-line-height-1_2">
                    <button type="button"
                        class="btn btn-secondary dropdown-toggle h6 align-middle g-brd-none g-color-gray-dark-v5 g-color-black--hover g-bg-transparent text-uppercase g-font-weight-300 g-font-size-12 g-pa-0 g-pl-10 g-ma-0"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {!! array_key_exists($sort, Category::arrayFilterProduct()) ? Arr::get(Category::arrayFilterProduct(), $sort) : 'Default' !!}
                    </button>
                    <div class="dropdown-menu rounded-0">
                        @if (Category::arrayFilterProduct())
                            @foreach (Category::arrayFilterProduct() as $k => $item)
                                <a class="dropdown-item g-color-gray-dark-v4 g-font-weight-300"
                                    href="{{ URL::full() . (strpos(URL::full(), '?') ? '&' : '?') . 'filter[sort]=' . $k }}">{!! $item !!}</a>
                            @endforeach
                        @endif
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
        </div> --}}
        <!-- End Filters -->

        <!-- Search brand -->
        <div class="col-md-12 g-pt-20 mx-auto">
            <form class="g-pos-rel form-search-brand">
                <span class="g-pos-abs g-top-1 g-left-0 g-z-index-3 g-px-13 g-py-10">
                    <i class="g-color-gray-dark-v4 g-font-size-12 icon-education-045 u-line-icon-pro"></i>
                </span>
                <input
                    class="search-brand form-control u-form-control g-brd-around g-brd-gray-light-v3 g-brd-primary--focus g-font-size-13 g-rounded-3 g-pl-35"
                    type="search" placeholder="{{ __('Type to find brand') }}">
            </form>
        </div>
        <!-- End search brand -->

        <!-- Products -->
        <div class="row g-pt-30 g-mb-50 tab-brand">
            @if ($brands)
                @foreach ($brands as $b)
                    <div class="col-6 col-lg-3 g-mb-30 text-center body-tab-brand">
                        <!-- Product -->
                        <figure class="g-pos-rel g-mb-20">
                            <a href="{{ route('brand', ['alias' => $b->alias]) }}">
                                <img class="img-thumbnail" src="{{ $b->image ? $b->image : getNoImage() }}"
                                    alt="{{ $b->name_seo }}">
                            </a>
                        </figure>

                        <div class="media">
                            <!-- Product Info -->
                            <div class="d-flex flex-column">
                                <h4 class="h6 g-color-black mb-1">
                                    <a class="u-link-v5 g-color-black g-color-primary--hover"
                                        href="{{ route('brand', ['alias' => $b->alias]) }}">
                                        {{ strtoupper($b->name_seo) }}
                                    </a>
                                </h4>
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
