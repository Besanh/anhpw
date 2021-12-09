<?php
use Diglactic\Breadcrumbs\Breadcrumbs;
use Illuminate\Support\Arr;
use App\Models\Contact;

$seo = metaData('contact_page');
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
    {{ Breadcrumbs::render('contact') }}
    <!-- End Breadcrumbs -->

    <!-- Google Map -->
    <iframe
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3919.8588741871604!2d106.72735611411625!3d10.74535816270633!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x317525821f8c90a9%3A0xee9328acc43c9ff6!2zNDg3IEh14buzbmggVOG6pW4gUGjDoXQsIFTDom4gVGh14bqtbiDEkMO0bmcsIFF14bqtbiA3LCBUaMOgbmggcGjhu5EgSOG7kyBDaMOtIE1pbmgsIFZp4buHdCBOYW0!5e0!3m2!1svi!2s!4v1638885733382!5m2!1svi!2s"
        width="100%" height="450" style="border:0;" allowfullscreen="true" loading="lazy"></iframe>
    <!-- End Google Map -->

    <div class="container g-py-100">
        <!-- Contact Info -->
        <div class="row g-mb-100">
            <div class="col-md-6 col-lg-4 mx-auto g-py-15">
                <!-- Media -->
                <div class="media g-brd-around g-brd-gray-light-v4 rounded g-pa-40">
                    <div class="d-flex g-mr-30">
                        <i
                            class="d-inline-block g-color-primary g-font-size-40 g-pos-rel g-top-3 icon-communication-062 u-line-icon-pro"></i>
                    </div>
                    <div class="media-body">
                        <span
                            class="d-block g-font-weight-500 g-font-size-default text-uppercase mb-2">{{ __('Phone Numbers') }}</span>
                        <ul class="list-unstyled mb-0">
                            <li class="d-block g-color-gray-dark-v4">{!! $phone->value_setting !!}</li>
                        </ul>
                    </div>
                </div>
                <!-- End Media -->
            </div>

            <div class="col-md-6 col-lg-4 mx-auto g-py-15">
                <!-- Media -->
                <div class="media g-brd-around g-brd-gray-light-v4 rounded g-pa-40">
                    <div class="d-flex g-mr-30">
                        <i
                            class="d-inline-block g-color-primary g-font-size-40 g-pos-rel g-top-3 icon-real-estate-027 u-line-icon-pro"></i>
                    </div>
                    <div class="media-body">
                        <span
                            class="d-block g-font-weight-500 g-font-size-default text-uppercase mb-2">{{ __('Location') }}</span>
                        <span class="d-block g-color-gray-dark-v4">{!! $address->value_setting !!}</span>
                    </div>
                </div>
                <!-- End Media -->
            </div>

            <!-- Media -->
            <div class="col-md-6 col-lg-4 mx-auto g-py-15">
                <div class="media g-brd-around g-brd-gray-light-v4 rounded g-pa-40">
                    <div class="d-flex g-mr-30">
                        <i
                            class="d-inline-block g-color-primary g-font-size-40 g-pos-rel g-top-3 icon-hotel-restaurant-249 u-line-icon-pro"></i>
                    </div>
                    <div class="media-body text-left">
                        <span
                            class="d-block g-font-weight-500 g-font-size-default text-uppercase mb-2">{{ __('Office Hours') }}</span>
                        <ul class="list-unstyled mb-0">
                            {!! $time_working->value_setting !!}
                        </ul>
                    </div>
                </div>
                <!-- End Media -->
            </div>
        </div>
        <!-- End Contact Info -->

        <div class="g-max-width-645 text-center mx-auto g-mb-70">
            @if ($slogan && isJson($slogan->value_setting))
                @foreach (json_decode($slogan->value_setting, true) as $s)
                    <h2 class="h1 mb-3">{!! Arr::get($s, 'title') !!}</h2>
                    <p class="g-font-size-17 mb-0">{!! Arr::get($s, 'content') !!}</p>
                @endforeach
            @endif

        </div>

        <!-- Contact Form -->
        @if (Session::has('message'))
            <div class="g-max-width-645 text-center mx-auto g-mb-70">
                <div class="alert alert-success">
                    {!! Session::get('message') !!}
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div class="g-max-width-645 text-center mx-auto g-mb-70">
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {!! $error !!}
                    @endforeach
                </div>
            </div>
        @endif
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <form action="{{ route('contact.post-contact') }}" method="POST">
                    @csrf
                    <input type="hidden" name="type" value="{{ Arr::get(Contact::$types, 'contact') }}" />

                    <div class="row">
                        <div class="col-md-6 form-group g-mb-20">
                            <input
                                class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover rounded g-py-13 g-px-15"
                                type="text" name="name" placeholder="{{ __('Name') }}" required>
                        </div>

                        <div class="col-md-6 form-group g-mb-20">
                            <input
                                class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover rounded g-py-13 g-px-15"
                                type="email" name="email" placeholder="{{ __('Email') }}" required>
                        </div>

                        <div class="col-md-6 form-group g-mb-20">
                            <input
                                class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover rounded g-py-13 g-px-15"
                                type="text" name="address" placeholder="{{ __('Address') }}" required>
                        </div>

                        <div class="col-md-6 form-group g-mb-20">
                            <input
                                class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover rounded g-py-13 g-px-15"
                                type="tel" name="phone" placeholder="{{ __('Phone') }}" required>
                        </div>

                        <div class="col-md-12 form-group g-mb-20">
                            <input
                                class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover rounded g-py-13 g-px-15"
                                type="tex" name="subject" placeholder="{{ __('Subject') }}" required>
                        </div>

                        <div class="col-md-12 form-group g-mb-40">
                            <textarea
                                class="form-control g-color-black g-bg-white g-bg-white--focus g-brd-gray-light-v3 g-brd-primary--hover g-resize-none rounded g-py-13 g-px-15"
                                rows="7" name="content" placeholder="{{ __('Content') }}" required></textarea>
                        </div>
                    </div>

                    <div class="text-center">
                        <button class="btn u-btn-primary g-font-size-12 text-uppercase g-py-12 g-px-25" type="submit">
                            {{ __('Send Message') }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <!-- End Contact Form -->
    </div>
    @include('frontend.home.sub_home._features')
@endsection
@include('frontend.contact.stack')
