<?php
use Diglactic\Breadcrumbs\Breadcrumbs;

$seo = metaData('help_page');
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
    <!-- Breadcrumb -->
    {{ Breadcrumbs::render('help') }}

    <!-- Help -->
    <div class="container g-pt-100 g-pb-70">
        <div class="row g-mb-20">
            <div class="col-md-4 g-mb-30">
                <h2 class="mb-5">{{ __('Browse Help Topics') }}</h2>

                <!-- Nav tabs -->
                <ul class="nav flex-column u-nav-v5-3 u-nav-primary g-bg-gray-light-v5 rounded g-pa-20" role="tablist"
                    data-target="nav-5-3-primary-ver" data-tabs-mobile-type="slide-up-down"
                    data-btn-classes="btn btn-md btn-block rounded-0 u-btn-outline-primary">
                    @if ($helps)
                        @foreach ($helps as $k => $item)
                            <li class="nav-item">
                                <a class="nav-link {{ $k == 0 ? 'active' : '' }} g-brd-bottom-none g-color-primary--hover"
                                    data-toggle="tab" href="#nav-5-3-primary-ver--{{ $k }}"
                                    role="tab">{!! $item->title !!}</a>
                            </li>
                        @endforeach
                    @endif
                </ul>
                <!-- End Nav tabs -->
            </div>

            <div class="col-md-8 g-mb-30">
                <!-- Search Form -->
                <form class="g-pos-rel g-mb-50">
                    <span class="g-pos-abs g-top-1 g-left-0 g-z-index-3 g-px-13 g-py-10">
                        <i class="g-color-gray-dark-v4 g-font-size-12 icon-education-045 u-line-icon-pro"></i>
                    </span>
                    <input
                        class="search-topic form-control u-form-control g-brd-around g-brd-gray-light-v3 g-brd-primary--focus g-font-size-13 g-rounded-3 g-pl-35"
                        type="search" placeholder="{{ __('Type to find answer') }}">
                </form>
                <!-- End Search Form -->

                <!-- Tab panes -->
                <div id="nav-5-3-primary-ver" class="tab-content g-pt-20 g-pt-0--md">
                    @if ($helps)
                        @foreach ($helps as $k => $itm)
                            <div class="tab-pane fade show {{ $k == 0 ? 'active' : '' }}"
                                id="nav-5-3-primary-ver--{{ $k }}" role="tabpanel">
                                <h3 class="h5 g-color-gray-dark-v2 g-mb-30">{!! $itm->sub_title !!}</h3>

                                <!-- Accordion -->
                                @if (count($itm->getHelpContent) > 0)
                                    <?php $stt = 0; ?>
                                    @foreach ($itm->getHelpContent as $j => $node)
                                        <?php $stt++; ?>
                                        <div id="accordion-12-{{ $j }}"
                                            class="body-topic u-accordion u-accordion-color-primary" role="tablist"
                                            aria-multiselectable="true">
                                            <!-- Card -->
                                            <div
                                                class="card g-brd-none g-brd-bottom g-brd-gray-light-v3 rounded-0 g-pb-30 g-mb-30">
                                                <div id="accordion-12-{{ $j }}-heading-01"
                                                    class="u-accordion__header g-color-gray-dark-v4 g-font-weight-500 g-font-size-16 g-pa-0"
                                                    role="tab">
                                                    <span
                                                        class="g-color-primary g-font-weight-700 g-font-size-16 g-line-height-1_2">{{ $stt }}.</span>
                                                    {!! $node->title !!}
                                                </div>
                                                <div id="accordion-12-{{ $j }}-body-01" class="collapse show"
                                                    role="tabpanel"
                                                    aria-labelledby="accordion-12-{{ $j }}-heading-01">
                                                    <div class="u-accordion__body g-color-gray-dark-v4">
                                                        {!! $node->content !!}
                                                    </div>
                                                </div>
                                                <h5 class="g-font-weight-400 g-font-size-13 g-pl-8 mt-3 mb-0">
                                                    <a class="g-color-primary g-text-underline--none--hover g-pa-10"
                                                        href="#accordion-12-{{ $j }}-body-01"
                                                        data-toggle="collapse"
                                                        data-parent="#accordion-12-{{ $j }}"
                                                        aria-expanded="false"
                                                        aria-controls="accordion-12-{{ $j }}-body-01">
                                                        <span class="u-accordion__control-icon">
                                                            <i class="g-font-style-normal">{{ __('Read More') }}
                                                                <span class="ml-2 fa fa-caret-up"></span>
                                                            </i>
                                                            <i class="g-font-style-normal">{{ __('Read Less') }}
                                                                <span class="ml-2 fa fa-caret-down"></span>
                                                            </i>
                                                        </span>
                                                    </a>
                                                </h5>
                                            </div>
                                            <!-- End Card -->
                                        </div>
                                    @endforeach
                                @endif
                                <!-- End Accordion -->
                            </div>
                        @endforeach
                    @endif
                </div>
                <!-- End Tab panes -->
            </div>
        </div>

        @include('frontend.help.contact')
    </div>
    <!-- End Help -->
@endsection
@include('frontend.help.stack')
