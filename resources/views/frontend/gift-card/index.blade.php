<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Support\Arr;

$seo = metaData('giftcard_page');
$title = $seo ? $seo->title : config('app.name');
?>
@extends('frontend.layouts.main')
@push('meta')
    <meta name="description" content="{{ __($seo ? $seo->seo_desc : config('app.seo_desc')) }}">
    <meta name="keyword" content="{{ __($seo ? $seo->seo_keyword : config('app.seo_keyword')) }}">
    <link rel="canonical" href="{{ url()->current() }}">
    @if ($seo)
        <meta name="robots" content="{{ __($seo->seo_robot ? $seo->seo_robot : config('app.seo_robot')) }}">
    @endif
@endpush
@section('title', $title)
@section('content')
    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('gift-card') }}
    <!-- End Breadcrumbs -->

    <div class="container g-py-100">
        <div class="text-center g-mb-70">
            <h2 class="h1">{{ $title }}</h2>
            <span class="g-color-primary g-font-size-25">
                {{ getPrice(collect($gift_cards)->min('price')) . ' - ' . getPrice(collect($gift_cards)->max('price')) }}
            </span>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-4 g-mb-50">
                <div class="g-px-60">
                    <img class="img-fluid" src="{{ asset('frontend/img-temp/400x475/img1.png') }}"
                        alt="{{ __('Gift Card') }}">
                </div>
            </div>

            <div class="col-md-6 col-lg-4 g-mb-50">
                <!-- Amount -->
                <div class="g-mb-30">
                    <h4 class="h5 mb-3">{{ __('Amount') }}</h4>

                    <!-- Checkbox -->
                    <ul class="list-inline mb-0">
                        @foreach ($gift_cards as $k => $item)
                            <li class="list-inline-item g-mr-1">
                                <label class="form-check-inline u-check">
                                    <input class="select-giftcard g-hidden-xs-up g-pos-abs g-top-0 g-left-0"
                                        value="{{ $item->price_id }}" name="radInline2_1" type="radio">
                                    <span
                                        class="d-block u-check-icon-checkbox-v1 g-width-100 g-height-auto g-brd-gray-light-v3 text-center g-py-10">
                                        {{ getPrice($item->price) }}
                                    </span>
                                </label>
                            </li>
                        @endforeach
                    </ul>
                    <!-- End Checkbox -->
                </div>
                <!-- End Amount -->

                <!-- Quantity -->
                <div class="g-mb-30">
                    <h4 class="h5 mb-3">{{ __('Quantity') }}</h4>

                    <div class="js-quantity input-group u-quantity-v1 g-width-80 g-brd-primary--focus">
                        <input class="qty-giftcard js-result form-control text-center g-font-size-13 rounded-0" type="text"
                            value="1" readonly>

                        <div
                            class="input-group-addon d-flex align-items-center g-width-30 g-brd-gray-light-v2 g-bg-white g-font-size-13 rounded-0 g-pa-5">
                            <i class="js-plus g-color-gray g-color-primary--hover fa fa-angle-up"></i>
                            <i class="js-minus g-color-gray g-color-primary--hover fa fa-angle-down"></i>
                        </div>
                    </div>
                </div>
                <!-- End Quantity -->

                {{-- <button class="add-giftcard btn u-btn-primary g-font-size-12 text-uppercase g-py-12 g-px-25 g-mb-50" type="submit">
                    {{ __('Add to bag') }}
                </button> --}}
                <button class="add-giftcard btn u-btn-primary g-font-size-12 text-uppercase g-py-12 g-px-25 g-mb-50">
                    {{ __('Add to bag') }}
                </button>
            </div>
        </div>

        {!! Arr::get($gift_cards, '0.description') !!}
    </div>

    @include('frontend.home.sub_home._features')
    <div class="modal-notify">
        <div class="modal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">{{ __('Notification') }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        {{-- content --}}
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">{{ __('Close') }}</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('frontend.gift-card.stack')
