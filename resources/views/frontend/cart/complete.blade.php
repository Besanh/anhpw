<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
$data_msg = getConfig('order_msg_complete');
?>
@extends('frontend.layouts.main')
@section('title', __('Notify - Order Complete'))
@section('content')
    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('cart-complete') }}
    <!-- End Breadcrumbs -->

    <div class="container g-py-100">
        <div
            class="u-shadow-v19 g-max-width-645 g-brd-around g-brd-gray-light-v4 text-center rounded mx-auto g-pa-30 g-pa-50--md">
            <span class="u-icon-v3 u-icon-size--lg g-color-white g-bg-primary rounded-circle g-pa-15 mb-5">
                <svg width="30" height="30" version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 497.5 497.5"
                    style="enable-background:new 0 0 497.5 497.5;" xml:space="preserve">
                    <g>
                        <path
                            d="M487.75,78.125c-13-13-33-13-46,0l-272,272l-114-113c-13-13-33-13-46,0s-13,33,0,46l137,136,c6,6,15,10,23,10s17-4,23-10l295-294C500.75,112.125,500.75,91.125,487.75,78.125z"
                            fill="#fff" />
                    </g>
                </svg>
            </span>

            <div class="mb-5">
                @if ($data_msg && isJson($data_msg))
                    @foreach (json_decode($data_msg, true) as $item)
                        <h2 class="mb-4">{{ __(Arr::get($item, 'title')) }}</h2>
                        <p>{{ __(Arr::get($item, 'content')) }}</p>
                    @endforeach
                @endif
                <p>{{ __('Your track number is') }}: <b>{{ $bill_no }}</b>. <a href="#">{{ __('Track Order') }}</a>
                </p>
            </div>

            <a class="btn u-btn-primary g-font-size-12 text-uppercase g-py-12 g-px-25"
                href="{{ route('frontend.default') }}">
                {{ __('Continue Shopping') }}
            </a>
        </div>
    </div>
@endsection
@push('link-cart-notify')
    <!-- CSS Global Compulsory -->
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/icon-line/simple-line-icons.css') }}">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ asset('frontend/css/icon-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/icon-line-pro/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/icon-hs/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/hs-megamenu/hs.megamenu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/malihu-scrollbar/jquery.mCustomScrollbar.min.css') }}">

    <!-- CSS Unify Theme -->
    <link rel="stylesheet" href="{{ asset('frontend/css/styles.e-commerce.css') }}">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
@endpush

@push('script-cart-notify')
    <!-- JS Global Compulsory -->
    <script src="{{ asset('frontend/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-migrate/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap/bootstrap.min.js') }}"></script>

    <!-- JS Implementing Plugins -->
    <script src="{{ asset('frontend/js/hs-megamenu/hs.megamenu.js') }}"></script>
    <script src="{{ asset('frontend/js/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <!-- JS Unify -->
    <script src="{{ asset('frontend/js/hs-core/hs.core.js') }}"></script>
    <script src="{{ asset('frontend/js/hs-components/hs.header.js') }}"></script>
    <script src="{{ asset('frontend/js/hs-helpers/hs.hamburgers.js') }}"></script>
    <script src="{{ asset('frontend/js/hs-components/hs.dropdown.js') }}"></script>
    <script src="{{ asset('frontend/js/hs-components/hs.scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/js/hs-components/hs.go-to.js') }}"></script>

    <!-- JS Customization -->
    <script src="{{ asset('frontend/js/custom.js') }}"></script>

    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function() {
            // initialization of header
            $.HSCore.components.HSHeader.init($('#js-header'));
            $.HSCore.helpers.HSHamburgers.init('.hamburger');

            // initialization of HSMegaMenu component
            $('.js-mega-menu').HSMegaMenu({
                event: 'hover',
                pageContainer: $('.container'),
                breakpoint: 991
            });

            // initialization of HSDropdown component
            $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {
                afterOpen: function() {
                    $(this).find('input[type="search"]').focus();
                }
            });

            // initialization of HSScrollBar component
            $.HSCore.components.HSScrollBar.init($('.js-scrollbar'));

            // initialization of go to
            $.HSCore.components.HSGoTo.init('.js-go-to');
        });

    </script>
@endpush
