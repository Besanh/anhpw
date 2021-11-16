<?php
use Gloudemans\Shoppingcart\Facades\Cart; ?>
@extends('frontend.layouts.main')
@section('title', $title)
@section('content')
    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('shopping_cart') }}
    <!-- End Breadcrumbs -->

    <!-- Checkout Form -->
    @if ($errors->any())
        <div>
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <div class="container g-pt-100 g-pb-70">
        <form method="POST" action="{{ route('cart.post-cart') }}" class="js-validate js-step-form"
            data-progress-id="#stepFormProgress" data-steps-id="#stepFormSteps">
            @csrf

            <input id="link-get-province-name" type="hidden" data-url={{ route('cart.get-province') }} />
            <input id="link-get-district-name" type="hidden" data-url="{{ route('cart.get-district-name') }}" />
            <div class="g-mb-100">
                <!-- Step Titles -->
                @include('frontend.cart.sub_files.stepProgress')
                <!-- End Step Titles -->
            </div>

            <div id="stepFormSteps">
                <!-- Shopping Cart -->
                @include('frontend.cart.sub_files.step1')
                <!-- End Shopping Cart -->

                <!-- Shipping -->
                @include('frontend.cart.sub_files.step2')
                <!-- End Shipping -->

                <!-- Payment & Review -->
                @include('frontend.cart.sub_files.step3')
                <!-- End Payment & Review -->
            </div>
        </form>
    </div>
    <!-- End Checkout Form -->
@endsection
@include('frontend.cart.stack')
