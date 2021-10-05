<?php
$title = 'Comming Soon'; ?>
@extends('frontend.layouts.main')

@section('title', $title)

@section('content')
    <!-- Coming Soon -->
    <div class="g-pos-rel g-py-100">
        <div class="g-pos-rel g-z-index-1">
            <!-- Heading -->
            <div class="g-max-width-645 text-center mx-auto g-mb-70">
                <h2 class="g-font-size-50 mb-3">{!! $title !!}</h2>
                <p class="g-font-size-17">{!! $slogan ? $slogan->value_setting : '' !!}</p>
            </div>
            <!-- End Heading -->

            <div class="container">
                <!-- Countdown -->
                <div class="js-countdown u-countdown-v1 text-center g-mb-70" data-end-date="2021/11/01"
                    data-month-format="%m" data-days-format="%D" data-hours-format="%H" data-minutes-format="%M"
                    data-seconds-format="%S">
                    <div
                        class="d-inline-block u-shadow-v19 g-brd-around g-brd-gray-light-v3 rounded g-pa-20 g-mx-15 g-mb-30">
                        <div class="js-cd-month g-color-primary g-font-weight-700 g-font-size-40 g-line-height-1_4"></div>
                        <hr class="g-brd-gray-light-v3 my-2 mb-3">
                        <h3 class="h6 g-color-text g-font-weight-400 mb-0">Month</h3>
                    </div>

                    <div
                        class="d-inline-block u-shadow-v19 g-brd-around g-brd-gray-light-v3 rounded g-pa-20 g-mx-15 g-mb-30">
                        <div class="js-cd-days g-color-primary g-font-weight-700 g-font-size-40 g-line-height-1_4"></div>
                        <hr class="g-brd-gray-light-v3 my-2 mb-3">
                        <h3 class="h6 g-color-text g-font-weight-400 mb-0">Days</h3>
                    </div>

                    <div
                        class="d-inline-block u-shadow-v19 g-brd-around g-brd-gray-light-v3 rounded g-pa-20 g-mx-15 g-mb-30">
                        <div class="js-cd-hours g-color-primary g-font-weight-700 g-font-size-40 g-line-height-1_4"></div>
                        <hr class="g-brd-gray-light-v3 my-2 mb-3">
                        <h3 class="h6 g-color-text g-font-weight-400 mb-0">Hours</h3>
                    </div>

                    <div
                        class="d-inline-block u-shadow-v19 g-brd-around g-brd-gray-light-v3 rounded g-pa-20 g-mx-15 g-mb-30">
                        <div class="js-cd-minutes g-color-primary g-font-weight-700 g-font-size-40 g-line-height-1_4"></div>
                        <hr class="g-brd-gray-light-v3 my-2 mb-3">
                        <h3 class="h6 g-color-text g-font-weight-400 mb-0">Minutes</h3>
                    </div>

                    <div
                        class="d-inline-block u-shadow-v19 g-brd-around g-brd-gray-light-v3 rounded g-pa-20 g-mx-15 g-mb-30">
                        <div class="js-cd-seconds g-color-primary g-font-weight-700 g-font-size-40 g-line-height-1_4"></div>
                        <hr class="g-brd-gray-light-v3 my-2 mb-3">
                        <h3 class="h6 g-color-text g-font-weight-400 mb-0">Seconds</h3>
                    </div>
                </div>
                <!-- End Countdown -->

                <!-- Subscribe -->
                <div class="g-max-width-550 text-center mx-auto">
                    <div class="mb-4">
                        <h2 class="h4">Subscribe</h2>
                        <p class="g-color-gray-dark-v5">Subscribe and stay in touch with the latest news, deals and
                            promotions.</p>
                    </div>

                    <form class="input-group u-shadow-v21" action="" method="POST">
                        @csrf
                        <input
                            class="form-control g-color-gray-dark-v4 g-placeholder-gray-dark-v3 g-brd-gray-light-v4 g-px-25 g-py-17"
                            type="email" name="email" placeholder="Enter your email">
                        <span class="input-group-append u-shadow-v19 g-brd-none g-bg-white">
                            <button class="btn u-btn-primary g-font-size-12 text-uppercase g-py-12 g-px-15" type="submit"><i
                                    class="fa fa-long-arrow-right"></i></button>
                        </span>
                    </form>
                    <!-- End Subscribe -->
                </div>
            </div>
        </div>

        <div class="g-pos-abs g-bottom-0 g-right-minus-50 g-right-0--lg">
            <img class="img-fluid" src="assets/img-temp/444x359/img1.png" alt="Image Description">
        </div>
    </div>
    <!-- End Coming Soon -->
@endsection
