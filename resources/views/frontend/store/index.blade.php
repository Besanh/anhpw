<?php
use Diglactic\Breadcrumbs\Breadcrumbs;

$seo = metaData('store');
$title = $seo && $seo->count() > 0 ? $seo->title : config('app.name');
$k0 = $k1 = $k2 = $k3 = 0;
?>

@extends('frontend.layouts.main')
@section('title', $title)
    @push('meta')
        <meta name="description" content="{{ __($seo && $seo->count() > 0 ? $seo->seo_desc : config('app.seo_desc')) }}">
        <meta name="keyword" content="{{ __($seo && $seo->count() > 0 ? $seo->seo_keyword : config('app.seo_keyword')) }}">
        <link rel="canonical" href="{{ url()->current() }}">
        @if ($seo && $seo->count() > 0)
            <meta name="robots" content="{{ __($seo->seo_robot ? $seo->seo_robot : config('app.seo_robot')) }}">
        @endif
    @endpush

@section('content')
    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('store') }}
    <!-- End Breadcrumbs -->

    <!-- Content -->
    <div class="container g-py-100">
        @if ($stores)
            @foreach ($stores as $k => $item)
                <?php $k++; ?>
                @if ($k == 1)
                    <?php $k0 = $k; ?>
                    <div class="row">
                        <div class="col-md-6 g-brd-right--md g-brd-bottom--md g-brd-gray-light-v4 g-pr-40--md">
                            <!-- Store Info -->
                            <h2 class="h4 mb-3">{{ $item->name }}</h2>

                            <div class="row">
                                <div class="col g-mb-30">
                                    <h3 class="h6 g-color-gray-dark-v3">{{ __('Details') }}:</h3>
                                    <a href="{{ $item->link ? $item->link : '#' }}">
                                        <address class="g-color-text mb-3">
                                            {!! $item->location !!}
                                        </address>
                                    </a>
                                    <ul class="list-unstyled g-color-text">
                                        <li class="g-py-1">{{ __('Tel') }}: {{ $item->tel }}</li>
                                        <li class="g-py-1">{{ __('Email') }}: <a
                                                href="mailto:{{ $item->email }}">{{ $item->email }}</a></li>
                                        <li class="g-py-1">{{ __('Website') }}: <a
                                                href="//{{ $item->website }}">{{ $item->website }}</a></li>
                                    </ul>
                                </div>
                                <div class="col g-mb-30">
                                    <h3 class="h6 g-color-gray-dark-v3">{{ __('Business Hours') }}:</h3>
                                    <span class="d-block g-color-text mb-4">{!! $item->working_time !!}</span>
                                    @if ($item->image)
                                        <img class="img-fluid" src="{{ getImage($item->image) }}"
                                            alt="{{ $item->name }}">
                                    @endif
                                </div>
                            </div>
                            <!-- End Store Info -->
                        </div>


                @endif
                @if ($k == 2)
                    <?php $k1 = $k; ?>
                    <div class="col-md-6 g-brd-bottom--md g-brd-gray-light-v4 g-pl-40--md">
                        <!-- Store Info -->
                        <h2 class="h4 mb-3">{{ $item->name }}</h2>

                        <div class="row">
                            <div class="col g-mb-30">
                                <h3 class="h6 g-color-gray-dark-v3">{{ __('Details') }}:</h3>
                                <a href="{{ $item->link ? $item->link : '#' }}">
                                    <address class="g-color-text mb-3">
                                        {!! $item->location !!}
                                    </address>
                                </a>
                                <ul class="list-unstyled g-color-text">
                                    <li class="g-py-1">{{ __('Tel') }}: {{ $item->tel }}</li>
                                    <li class="g-py-1">{{ __('Email') }}: <a
                                            href="mailto:{{ $item->email }}">{{ $item->email }}</a></li>
                                    <li class="g-py-1">{{ __('Website') }}: <a
                                            href="//{{ $item->website }}">{{ $item->website }}</a></li>
                                </ul>
                            </div>
                            <div class="col g-mb-30">
                                <h3 class="h6 g-color-gray-dark-v3">{{ __('Business Hours') }}:</h3>
                                <span class="d-block g-color-text mb-4">{!! $item->working_time !!}</span>
                                @if ($item->image)
                                    <img class="img-fluid" src="{{ getImage($item->image) }}" alt="{{ $item->name }}">
                                @endif
                            </div>
                        </div>
                        <!-- End Store Info -->
                    </div>
    </div><!-- row -->
    @endif
    @if ($k == 3)
        <?php $k2 = $k; ?>
        <div class="row">
            <div class="col-md-6 g-brd-right--md g-brd-gray-light-v4 g-pt-40 g-pr-40--md">
                <!-- Store Info -->
                <h2 class="h4 mb-3">{{ $item->name }}</h2>

                <div class="row">
                    <div class="col g-mb-30">
                        <h3 class="h6 g-color-gray-dark-v3">{{ __('Details') }}:</h3>
                        <a href="{{ $item->link ? $item->link : '#' }}">
                            <address class="g-color-text mb-3">
                                {!! $item->location !!}
                            </address>
                        </a>
                        <ul class="list-unstyled g-color-text">
                            <li class="g-py-1">{{ __('Tel') }}: {{ $item->tel }}</li>
                            <li class="g-py-1">{{ __('Email') }}: <a
                                    href="mailto:{{ $item->email }}">{{ $item->email }}</a></li>
                            <li class="g-py-1">{{ __('Website') }}: <a
                                    href="//{{ $item->website }}">{{ $item->website }}</a></li>
                        </ul>
                    </div>
                    <div class="col g-mb-30">
                        <h3 class="h6 g-color-gray-dark-v3">{{ __('Business Hours') }}:</h3>
                        <span class="d-block g-color-text mb-4">{!! $item->working_time !!}</span>
                        @if ($item->image)
                            <img class="img-fluid" src="{{ getImage($item->image) }}" alt="{{ $item->name }}">
                        @endif
                    </div>
                </div>
                <!-- End Store Info -->
            </div>
    @endif
    @if ($k == 4)
        <?php $k3 = $k; ?>
        <div class="col-md-6 g-pt-40 g-pl-40--md">
            <!-- Store Info -->
            <h2 class="h4 mb-3">{{ $item->name }}</h2>

            <div class="row">
                <div class="col g-mb-30">
                    <h3 class="h6 g-color-gray-dark-v3">{{ __('Details') }}:</h3>
                    <a href="{{ $item->link ? $item->link : '#' }}">
                        <address class="g-color-text mb-3">
                            {!! $item->location !!}
                        </address>
                    </a>
                    <ul class="list-unstyled g-color-text">
                        <li class="g-py-1">{{ __('Tel') }}: {{ $item->tel }}</li>
                        <li class="g-py-1">{{ __('Email') }}: <a
                                href="mailto:{{ $item->email }}">{{ $item->email }}</a></li>
                        <li class="g-py-1">{{ __('Website') }}: <a
                                href="//{{ $item->website }}">{{ $item->website }}</a></li>
                    </ul>
                </div>
                <div class="col g-mb-30">
                    <h3 class="h6 g-color-gray-dark-v3">{{ __('Business Hours') }}:</h3>
                    <span class="d-block g-color-text mb-4">{!! $item->working_time !!}</span>
                    @if ($item->image)
                        <img class="img-fluid" src="{{ getImage($item->image) }}" alt="{{ $item->name }}">
                    @endif
                </div>
            </div>
            <!-- End Store Info -->
        </div>
        </div>
        {{-- </div> --}}
    @endif
    @endforeach

    @foreach ($stores as $j => $itm)
        <?php $j++; ?>
        @if ($j == $k0 + 4)
            <?php $k0 = $k0 + 4; ?>
            <div class="row">
                <div class="col-md-6 g-brd-right--md g-brd-bottom--md g-brd-gray-light-v4 g-pr-40--md">
                    <!-- Store Info -->
                    <h2 class="h4 mb-3">{{ $itm->name }}</h2>

                    <div class="row">
                        <div class="col g-mb-30">
                            <h3 class="h6 g-color-gray-dark-v3">{{ __('Details') }}:</h3>
                            <a href="{{ $itm->link ? $itm->link : '#' }}">
                                <address class="g-color-text mb-3">
                                    {!! $itm->location !!}
                                </address>
                            </a>
                            <ul class="list-unstyled g-color-text">
                                <li class="g-py-1">{{ __('Tel') }}: {{ $itm->tel }}</li>
                                <li class="g-py-1">{{ __('Email') }}: <a
                                        href="mailto:{{ $itm->email }}">{{ $itm->email }}</a></li>
                                <li class="g-py-1">{{ __('Website') }}: <a
                                        href="//{{ $itm->website }}">{{ $itm->website }}</a></li>
                            </ul>
                        </div>
                        <div class="col g-mb-30">
                            <h3 class="h6 g-color-gray-dark-v3">{{ __('Business Hours') }}:</h3>
                            <span class="d-block g-color-text mb-4">{!! $itm->working_time !!}</span>
                            @if ($itm->image)
                                <img class="img-fluid" src="{{ getImage($itm->image) }}" alt="{{ $itm->name }}">
                            @endif
                        </div>
                    </div>
                    <!-- End Store Info -->
                </div>
        @endif
        @if ($j == $k1 + 4)
            <?php $k1 = $k1 + 4; ?>
            <div class="col-md-6 g-brd-bottom--md g-brd-gray-light-v4 g-pl-40--md">
                <!-- Store Info -->
                <h2 class="h4 mb-3">{{ $itm->name }}</h2>

                <div class="row">
                    <div class="col g-mb-30">
                        <h3 class="h6 g-color-gray-dark-v3">{{ __('Details') }}:</h3>
                        <a href="{{ $itm->link ? $itm->link : '#' }}">
                            <address class="g-color-text mb-3">
                                {!! $itm->location !!}
                            </address>
                        </a>
                        <ul class="list-unstyled g-color-text">
                            <li class="g-py-1">{{ __('Tel') }}: {{ $itm->tel }}</li>
                            <li class="g-py-1">{{ __('Email') }}: <a
                                    href="mailto:{{ $itm->email }}">{{ $itm->email }}</a></li>
                            <li class="g-py-1">{{ __('Website') }}: <a
                                    href="//{{ $itm->website }}">{{ $itm->website }}</a></li>
                        </ul>
                    </div>
                    <div class="col g-mb-30">
                        <h3 class="h6 g-color-gray-dark-v3">{{ __('Business Hours') }}:</h3>
                        <span class="d-block g-color-text mb-4">{!! $itm->working_time !!}</span>
                        @if ($itm->image)
                            <img class="img-fluid" src="{{ getImage($itm->image) }}" alt="{{ $itm->name }}">
                        @endif
                    </div>
                </div>
                <!-- End Store Info -->
            </div>
            </div><!-- row -->
        @endif
        @if ($j == $k2 + 4)
            <?php $k2 = $k2 + 4; ?>
            <div class="row">
                <div class="col-md-6 g-brd-right--md g-brd-gray-light-v4 g-pt-40 g-pr-40--md">
                    <!-- Store Info -->
                    <h2 class="h4 mb-3">{{ $itm->name }}</h2>

                    <div class="row">
                        <div class="col g-mb-30">
                            <h3 class="h6 g-color-gray-dark-v3">{{ __('Details') }}:</h3>
                            <a href="{{ $itm->link ? $itm->link : '#' }}">
                                <address class="g-color-text mb-3">
                                    {!! $itm->location !!}
                                </address>
                            </a>
                            <ul class="list-unstyled g-color-text">
                                <li class="g-py-1">{{ __('Tel') }}: {{ $itm->tel }}</li>
                                <li class="g-py-1">{{ __('Email') }}: <a
                                        href="mailto:{{ $itm->email }}">{{ $itm->email }}</a></li>
                                <li class="g-py-1">{{ __('Website') }}: <a
                                        href="//{{ $itm->website }}">{{ $itm->website }}</a></li>
                            </ul>
                        </div>
                        <div class="col g-mb-30">
                            <h3 class="h6 g-color-gray-dark-v3">{{ __('Business Hours') }}:</h3>
                            <span class="d-block g-color-text mb-4">{!! $itm->working_time !!}</span>
                            @if ($itm->image)
                                <img class="img-fluid" src="{{ getImage($itm->image) }}" alt="{{ $itm->name }}">
                            @endif
                        </div>
                    </div>
                    <!-- End Store Info -->
                </div>
        @endif

        @if ($j == $k3 + 4)
            <?php $k3 = $k3 + 4; ?>
            <div class="col-md-6 g-pt-40 g-pl-40--md">
                <!-- Store Info -->
                <h2 class="h4 mb-3">{{ $itm->name }}</h2>

                <div class="row">
                    <div class="col g-mb-30">
                        <h3 class="h6 g-color-gray-dark-v3">{{ __('Details') }}:</h3>
                        <a href="{{ $itm->link ? $itm->link : '#' }}">
                            <address class="g-color-text mb-3">
                                {!! $itm->location !!}
                            </address>
                        </a>
                        <ul class="list-unstyled g-color-text">
                            <li class="g-py-1">{{ __('Tel') }}: {{ $itm->tel }}</li>
                            <li class="g-py-1">{{ __('Email') }}: <a
                                    href="mailto:{{ $itm->email }}">{{ $itm->email }}</a></li>
                            <li class="g-py-1">{{ __('Website') }}: <a
                                    href="//{{ $itm->website }}">{{ $itm->website }}</a></li>
                        </ul>
                    </div>
                    <div class="col g-mb-30">
                        <h3 class="h6 g-color-gray-dark-v3">{{ __('Business Hours') }}:</h3>
                        <span class="d-block g-color-text mb-4">{!! $itm->working_time !!}</span>
                        @if ($itm->image)
                            <img class="img-fluid" src="{{ getImage($itm->image) }}" alt="{{ $itm->name }}">
                        @endif
                    </div>
                </div>
                <!-- End Store Info -->
            </div>
            </div>
            </div>
        @endif
    @endforeach
    @endif
    </div>
    </div>
    <!-- End Content -->
    @include('frontend.home.sub_home._features')
@endsection
@include('frontend.store.stack')
