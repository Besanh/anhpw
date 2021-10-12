@extends('frontend.layouts.main')
@section('content')
    <!-- Breadcrumbs -->
    @include('frontend.category.sub_files.breadcrumb')
    <!-- End Breadcrumbs -->
    <!-- Products -->
    <div class="container" id="pjax-cate-container">
        <div class="row">
            <!-- Content -->
            <div class="col-md-9 order-md-2">
                <div class="g-pl-15--lg">
                    <!-- Banner -->
                    <div class="g-bg-size-cover g-bg-pos-center g-mt-30 g-py-40"
                        style="background-image: url({{ $cate ? getImage($cate->big_thumb) : asset('frontend/img-temp/900x450/img1.jpg') }}">
                        <div class="g-pos-rel g-z-index-1 g-pa-50">
                            <span class="d-block g-color-primary g-font-weight-700 g-font-size-40 mb-0">-40%</span>
                            <h2 class="g-color-white g-font-size-50 mb-3">Summer Collection</h2>
                            <a class="btn u-btn-white g-brd-primary--hover g-color-primary g-color-white--hover g-bg-primary--hover g-font-size-12 text-uppercase g-py-12 g-px-25"
                                href="home-page-1.html">Shop Now</a>
                        </div>
                    </div>
                    <!-- End Banner -->

                    <!-- Filters -->
                    @include('frontend.category.sub_files.filter_show', compact(['alias', 'limit']))
                    <!-- End Filters -->

                    <!-- Products -->
                    <div class="row g-pt-30 g-mb-50">
                        @if ($products)
                            @foreach ($products as $k => $item)
                                <div class="col-6 col-lg-4 g-mb-30">
                                    <!-- Product -->
                                    <figure class="g-pos-rel g-mb-20">
                                        <img class="im img-responsive img-product-cate img-fluid"
                                            src="{{ $item->image ? getImage($item->image) : asset('frontend/img-temp/480x700/img1.jpg') }}"
                                            alt="{{ $item->name }}">

                                        <figcaption
                                            class="w-100 g-bg-primary g-bg-black--hover text-center g-pos-abs g-bottom-0 g-transition-0_2 g-py-5">
                                            <a class="g-color-white g-font-size-11 text-uppercase g-letter-spacing-1 g-text-underline--none--hover"
                                                href="#">New Arrival</a>
                                        </figcaption>
                                    </figure>

                                    <div class="media">
                                        <!-- Product Info -->
                                        <div class="d-flex flex-column">
                                            <h4 class="h6 g-color-black mb-1">
                                                <a class="u-link-v5 g-color-black g-color-primary--hover" href="">
                                                    {{ getTeaser($item->name, 3) }}
                                                </a>
                                            </h4>
                                            <a class="d-inline-block g-color-gray-dark-v5 g-font-size-13"
                                                href="#">{{ $item->cate_name }}</a>
                                            <span
                                                class="d-block g-color-black g-font-size-17">{!! getPrice($item->price) !!}</span>
                                        </div>
                                        <!-- End Product Info -->

                                        <!-- Products Icons -->
                                        <ul class="list-inline media-body text-right">
                                            <li class="list-inline-item align-middle mx-0">
                                                <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle"
                                                    href="#" data-toggle="tooltip" data-placement="top" title="Add to Cart">
                                                    <i class="icon-finance-100 u-line-icon-pro"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item align-middle mx-0">
                                                <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle"
                                                    href="#" data-toggle="tooltip" data-placement="top"
                                                    title="Add to Wishlist">
                                                    <i class="icon-medical-022 u-line-icon-pro"></i>
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- End Products Icons -->
                                    </div>
                                    <!-- End Product -->
                                </div>
                            @endforeach
                        @else
                            {!! 'No product found' !!}
                        @endif

                    </div>
                    <!-- End Products -->

                    <hr class="g-mb-60">

                    <!-- Pagination -->
                    {{ $products->links('vendor.pagination.custom-pagination') }}
                    {{-- <nav class="g-mb-100" aria-label="Page Navigation">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item hidden-down">
                                <a class="active u-pagination-v1__item g-width-30 g-height-30 g-brd-gray-light-v3 g-brd-primary--active g-color-white g-bg-primary--active g-font-size-12 rounded-circle g-pa-5"
                                    href="#">1</a>
                            </li>
                            <li class="list-inline-item hidden-down">
                                <a class="u-pagination-v1__item g-width-30 g-height-30 g-color-gray-dark-v5 g-color-primary--hover g-font-size-12 rounded-circle g-pa-5"
                                    href="#">2</a>
                            </li>
                            <li class="list-inline-item g-hidden-xs-down">
                                <a class="u-pagination-v1__item g-width-30 g-height-30 g-color-gray-dark-v5 g-color-primary--hover g-font-size-12 rounded-circle g-pa-5"
                                    href="#">3</a>
                            </li>
                            <li class="list-inline-item hidden-down">
                                <span
                                    class="g-width-30 g-height-30 g-color-gray-dark-v5 g-font-size-12 rounded-circle g-pa-5">...</span>
                            </li>
                            <li class="list-inline-item g-hidden-xs-down">
                                <a class="u-pagination-v1__item g-width-30 g-height-30 g-color-gray-dark-v5 g-color-primary--hover g-font-size-12 rounded-circle g-pa-5"
                                    href="#">15</a>
                            </li>
                            <li class="list-inline-item">
                                <a class="u-pagination-v1__item g-width-30 g-height-30 g-brd-gray-light-v3 g-brd-primary--hover g-color-gray-dark-v5 g-color-primary--hover g-font-size-12 rounded-circle g-pa-5 g-ml-15"
                                    href="#" aria-label="Next">
                                    <span aria-hidden="true">
                                        <i class="fa fa-angle-right"></i>
                                    </span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                            <li class="list-inline-item float-right">
                                <span class="u-pagination-v1__item-info g-color-gray-dark-v4 g-font-size-12 g-pa-5">Page 1
                                    of 15</span>
                            </li>
                        </ul>
                    </nav> --}}
                    <!-- End Pagination -->
                </div>
            </div>
            <!-- End Content -->

            <!-- Filters -->
            @include('frontend.category.sub_files.filter', compact(['brands', 'other_cate', 'capas']))
            <!-- End Filters -->
        </div>
    </div>
    <!-- End Products -->

    <!-- Call to Action -->
    @include('frontend.category.sub_files.action')
    <!-- End Call to Action -->

@endsection

@include('frontend.category/stack-cate')
