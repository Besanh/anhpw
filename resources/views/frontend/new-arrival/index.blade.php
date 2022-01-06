@php
use Diglactic\Breadcrumbs\Breadcrumbs;

$seo = metaData('new_arrival');
$min_stock = minStock();
@endphp
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
    {{ Breadcrumbs::render('new-arrival') }}
    <div class="container">
        <!-- Products -->
        <div class="row g-pt-30 g-mb-50">
            @if ($products)
                @foreach ($products as $item)
                    @php
                        $product_link = route('product-detail', ['brand_alias' => $item->b_alias, 'id' => $item->id, 'product_alias' => toAlias($item->name_seo)]);
                    @endphp
                    <div class="col-6 col-lg-3 g-mb-30">
                        <!-- Product -->
                        <figure class="g-pos-rel g-mb-20">
                            <a href="{{ $product_link }}">
                                <img class="d-flex w-100" src="{{ $item->image ? getImage($item->image) : getNoImage() }}"
                                    alt="{{ $item->name_seo }}">
                            </a>
                            <figcaption
                                class="w-100 g-bg-primary g-bg-black--hover text-center g-pos-abs g-bottom-0 g-transition-0_2 g-py-5">
                                <a class="g-color-white g-font-size-11 text-uppercase g-letter-spacing-1 g-text-underline--none--hover"
                                    href="{{ $product_link }}">{{ __('New Arrival') }}</a>
                            </figcaption>
                        </figure>

                        <div class="media">
                            <!-- Product Info -->
                            <div class="d-flex flex-column">
                                <h4 class="h6 g-color-black mb-1">
                                    <a class="u-link-v5 g-color-black g-color-primary--hover" href="{{ $product_link }}">
                                        {!! getTeaser($item->price_name_seo, 5) !!}
                                    </a>
                                </h4>
                                <a class="u-link-v5 d-inline-block g-color-gray-dark-v5 g-font-size-13"
                                    href="{{ route('cate', ['alias' => $item->cate_alias]) }}">{!! getTeaser($item->cate_name_seo, 5) !!}</a>
                                <span class="d-block g-color-black g-font-size-17">{!! getPrice($item->price) !!}</span>
                            </div>
                            <!-- End Product Info -->

                            <!-- Products Icons -->
                            <ul class="list-inline media-body text-right">
                                <li class="list-inline-item align-middle mx-0">
                                    <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle"
                                        href="{{ route('cart.add', ['id' => $item->price_id]) }}"
                                        title="{{ __('Add to Cart') }}" data-toggle="tooltip" data-placement="top">
                                        <i class="icon-finance-100 u-line-icon-pro"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item align-middle mx-0">
                                    <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle"
                                        href="#" data-toggle="tooltip" data-placement="top"
                                        title="{{ __('Add to Wishlist') }}">
                                        <i class="icon-medical-022 u-line-icon-pro"></i>
                                    </a>
                                </li>
                            </ul>
                            <!-- End Products Icons -->
                        </div>
                        <!-- End Product -->
                    </div>
                @endforeach
            @endif
        </div>
        <!-- End Products -->
        <hr class="g-mb-60">

        <!-- Pagination -->
        <nav class="g-mb-100" aria-label="Pagination">
            {{ $products->links('vendor.pagination.custom-pagination') }}
        </nav>
    </div>

@endsection
@include('frontend.new-arrival.stack-arrival')
