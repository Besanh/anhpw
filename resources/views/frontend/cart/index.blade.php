<?php
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Price;
?>
@extends('frontend.layouts.main')
@section('title', $title)
@section('content')
    <!-- Breadcrumbs -->
    {{ Breadcrumbs::render('shopping_cart') }}
    <!-- End Breadcrumbs -->

    <!-- Checkout Form -->
    <div class="container g-pt-100 g-pb-70">
        <form method="POST" action="{{ route('cart.post-cart') }}" class="js-validate js-step-form"
            data-progress-id="#stepFormProgress" data-steps-id="#stepFormSteps">
            @csrf
            <div class="g-mb-100">
                <!-- Step Titles -->
                <ul id="stepFormProgress"
                    class="js-step-progress row justify-content-center list-inline text-center g-font-size-17 mb-0">
                    <li class="col-3 list-inline-item g-mb-20 g-mb-0--sm">
                        <span
                            class="d-block u-icon-v2 u-icon-size--sm g-rounded-50x g-brd-primary g-color-primary g-color-white--parent-active g-bg-primary--active g-color-white--checked g-bg-primary--checked mx-auto mb-3">
                            <i class="g-font-style-normal g-font-weight-700 g-hide-check">1</i>
                            <i class="fa fa-check g-show-check"></i>
                        </span>
                        <h4 class="g-font-size-16 text-uppercase mb-0">{{ __($title) }}</h4>
                    </li>

                    <li class="col-3 list-inline-item g-mb-20 g-mb-0--sm">
                        <span
                            class="d-block u-icon-v2 u-icon-size--sm g-rounded-50x g-brd-gray-light-v2 g-color-gray-dark-v5 g-brd-primary--active g-color-white--parent-active g-bg-primary--active g-color-white--checked g-bg-primary--checked mx-auto mb-3">
                            <i class="g-font-style-normal g-font-weight-700 g-hide-check">2</i>
                            <i class="fa fa-check g-show-check"></i>
                        </span>
                        <h4 class="g-font-size-16 text-uppercase mb-0">{{ __('Shipping') }}</h4>
                    </li>

                    <li class="col-3 list-inline-item">
                        <span
                            class="d-block u-icon-v2 u-icon-size--sm g-rounded-50x g-brd-gray-light-v2 g-color-gray-dark-v5 g-brd-primary--active g-color-white--parent-active g-bg-primary--active g-color-white--checked g-bg-primary--checked mx-auto mb-3">
                            <i class="g-font-style-normal g-font-weight-700 g-hide-check">3</i>
                            <i class="fa fa-check g-show-check"></i>
                        </span>
                        <h4 class="g-font-size-16 text-uppercase mb-0">{{ __('Payment &amp; Review') }}</h4>
                    </li>
                </ul>
                <!-- End Step Titles -->
            </div>

            <div id="stepFormSteps">
                <!-- Shopping Cart -->
                <div id="step1" class="active">
                    <div class="row">
                        <div class="col-md-8 g-mb-30">
                            <!-- Products Block -->
                            <div class="g-overflow-x-scroll g-overflow-x-visible--lg">
                                <table class="text-center w-100">
                                    <thead class="h6 g-brd-bottom g-brd-gray-light-v3 g-color-black text-uppercase">
                                        <tr>
                                            <th class="g-font-weight-400 text-left g-pb-20">{{ __('Product') }}</th>
                                            <th class="g-font-weight-400 g-width-130 g-pb-20">{{ __('Price') }}</th>
                                            <th class="g-font-weight-400 g-width-50 g-pb-20">{{ __('Qty') }}</th>
                                            <th class="g-font-weight-400 g-width-130 g-pb-20">{{ __('Total') }}</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                        <!-- Item-->
                                        @foreach (Cart::instance('shopping')->content() as $item)

                                            <tr class="g-brd-bottom g-brd-gray-light-v3">
                                                <td class="text-left g-py-25">
                                                    <img class="d-inline-block g-width-100 mr-4"
                                                        src="{{ getImage($item->options->image) }}"
                                                        alt="{{ $item->options->name_seo }}">
                                                    <div class="d-inline-block align-middle">
                                                        <h4 class="h6 g-color-black">
                                                            {{ $item->options->name_seo }}</h4>
                                                        <ul
                                                            class="list-unstyled g-color-gray-dark-v4 g-font-size-12 g-line-height-1_6 mb-0">
                                                            <li>{{ __('Size') }}: {{ $item->options->capa }}</li>
                                                            <li>{{ __('Unit') }}:
                                                                {{ Price::getCapaNameViaCart($item->options->capa_id)->name }}
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                                <td class="g-color-gray-dark-v2 g-font-size-13">
                                                    {{ getPrice($item->price) }}
                                                </td>
                                                <td>
                                                    <div
                                                        class="js-quantity input-group u-quantity-v1 g-width-80 g-brd-primary--focus">
                                                        <input
                                                            class="js-result form-control text-center g-font-size-13 rounded-0 g-pa-0"
                                                            type="text" name="qty[{{ $item->rowId }}]"
                                                            value="{{ $item->qty }}" readonly>

                                                        <div
                                                            class="input-group-addon d-flex align-items-center g-width-30 g-brd-gray-light-v2 g-bg-white g-font-size-12 rounded-0 g-px-5 g-py-6">
                                                            <i
                                                                class="js-plus g-color-gray g-color-primary--hover fa fa-angle-up"></i>
                                                            <i
                                                                class="js-minus g-color-gray g-color-primary--hover fa fa-angle-down"></i>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="text-right g-color-black">
                                                    <span
                                                        class="g-color-gray-dark-v2 g-font-size-13 mr-4">{{ getPrice($item->price * $item->qty) }}</span>
                                                    <span
                                                        class="g-color-gray-dark-v4 g-color-black--hover g-cursor-pointer">
                                                        <a href="{{ route('cart.delete', ['rowId' => $item->rowId]) }}">
                                                            <i class="mt-auto fa fa-trash"></i>
                                                        </a>
                                                    </span>
                                                </td>
                                            </tr>
                                        @endforeach
                                        <!-- End Item-->
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Products Block -->
                        </div>

                        <div class="col-md-4 g-mb-30">
                            <!-- Summary -->
                            <div class="g-bg-gray-light-v5 g-pa-20 g-pb-50 mb-4">
                                <h4 class="h6 text-uppercase mb-3">{{ __('Summary') }}</h4>

                                <!-- Accordion -->
                                <div id="accordion-01" class="mb-4" role="tablist" aria-multiselectable="true">
                                    <div id="accordion-01-heading-01" class="g-brd-y g-brd-gray-light-v2 py-3" role="tab">
                                        <h5 class="g-font-weight-400 g-font-size-default mb-0">
                                            <a class="g-color-gray-dark-v4 g-text-underline--none--hover"
                                                href="#accordion-01-body-01" data-toggle="collapse"
                                                data-parent="#accordion-01" aria-expanded="false"
                                                aria-controls="accordion-01-body-01">Estimate shipping
                                                <span class="ml-3 fa fa-angle-down"></span></a>
                                        </h5>
                                    </div>
                                    <div id="accordion-01-body-01" class="collapse" role="tabpanel"
                                        aria-labelledby="accordion-01-heading-01">
                                        <div class="g-py-10">
                                            <div class="mb-3">
                                                <label class="d-block g-color-gray-dark-v2 g-font-size-13">Country</label>
                                                <input id="inputGroup1"
                                                    class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                                    name="country" type="text" placeholder="United Kingdom" required>
                                            </div>
                                            <div class="mb-3">
                                                <label
                                                    class="d-block g-color-gray-dark-v2 g-font-size-13">State/Province</label>
                                                <input id="inputGroup2"
                                                    class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                                    name="stateProvince" type="text" placeholder="London" required>
                                            </div>
                                            <label class="d-block g-color-gray-dark-v2 g-font-size-13">ZIP/Postal
                                                Code</label>
                                            <input id="inputGroup3"
                                                class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                                name="zip" type="text" placeholder="e.g. AB123" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Accordion -->

                                <div class="d-flex justify-content-between mb-2">
                                    <span class="g-color-black">{{ __('Subtotal') }}</span>
                                    <span
                                        class="g-color-black g-font-weight-300">{{ Cart::instance('shopping')->subTotal() }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="g-color-black">{{ __('Tax') }}</span>
                                    <span
                                        class="g-color-black g-font-weight-300">{{ Cart::instance('shopping')->tax() }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="g-color-black">{{ __('Order Total') }}</span>
                                    <span
                                        class="g-color-black g-font-weight-300">{{ Cart::instance('shopping')->total() }}</span>
                                </div>
                            </div>
                            <!-- End Summary -->

                            <button
                                class="btn btn-block u-btn-outline-black g-brd-gray-light-v1 g-bg-black--hover g-font-size-13 text-uppercase g-py-15 mb-4"
                                type="submit" name="update_shopping_cart" value="update_shopping_cart">
                                {{ __('Update Shopping Cart') }}
                            </button>
                            <button class="btn btn-block u-btn-primary g-font-size-13 text-uppercase g-py-15 mb-4"
                                type="button" data-next-step="#step2">{{ __('Proceed to Checkout') }}</button>

                            <a class="d-inline-block g-color-black g-color-primary--hover g-text-underline--none--hover mb-3"
                                href="#">
                                <i class="mr-2 fa fa-info-circle"></i>{{ __('Delivery') }}
                            </a>

                            <!-- Accordion -->
                            <div id="accordion-02" role="tablist" aria-multiselectable="true">
                                <div id="accordion-02-heading-02" role="tab">
                                    <h5 class="g-font-weight-400 g-font-size-default mb-0">
                                        <a class="g-color-black g-text-underline--none--hover" href="#accordion-02-body-02"
                                            data-toggle="collapse" data-parent="#accordion-02" aria-expanded="false"
                                            aria-controls="accordion-02-body-02">{{ __('Apply discount code') }}
                                            <span class="ml-3 fa fa-angle-down"></span></a>
                                    </h5>
                                </div>
                                <div id="accordion-02-body-02" class="collapse" role="tabpanel"
                                    aria-labelledby="accordion-02-heading-02">
                                    <div class="input-group rounded g-pt-15">
                                        <input
                                            class="form-control g-brd-gray-light-v1 g-brd-right-none g-color-gray-dark-v3 g-placeholder-gray-dark-v3"
                                            type="text" placeholder="Enter discount code">
                                        <span class="input-group-append g-brd-gray-light-v1 g-bg-white">
                                            <button class="btn u-btn-primary" type="submit">{{ __('Apply') }}</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Accordion -->
                        </div>
                    </div>
                </div>
                <!-- End Shopping Cart -->

                <!-- Shipping -->
                <div id="step2">
                    <h4 class="h6 text-uppercase mb-5">{{ __('Ordering information') }}</h4>
                    <div class="row">
                        <div class="col-md-8 g-mb-30">
                            <div class="row">
                                <div class="col-sm-6 g-mb-20">
                                    <div class="form-group">
                                        <label
                                            class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Full Name') }}</label>
                                        <input id="inputGroup4"
                                            class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                            name="fullname" type="text" placeholder="{{ __('Full Name') }}" required
                                            data-msg="This field is mandatory" data-error-class="u-has-error-v1"
                                            data-success-class="u-has-success-v1">
                                    </div>
                                </div>

                                <div class="col-sm-6 g-mb-20">
                                    <div class="form-group">
                                        <label
                                            class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Gender') }}</label>
                                        <select
                                            class="js-custom-select u-select-v1 g-brd-gray-light-v2 g-color-gray-light-v1 g-py-12"
                                            style="width: 100%;" data-placeholder="Choose your gender"
                                            data-open-icon="fa fa-angle-down" data-close-icon="fa fa-angle-up" required
                                            data-msg="This field is mandatory" data-error-class="u-has-error-v1"
                                            data-success-class="u-has-success-v1">
                                            <option></option>
                                            <option value="0">{{ __('Male') }}</option>
                                            <option value="1">{{ __('Female') }}</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 g-mb-20">
                                    <div class="form-group">
                                        <label
                                            class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Email Address') }}</label>
                                        <input id="inputGroup6"
                                            class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                            name="email" type="email" placeholder="{{ __('Email Address') }}" required
                                            data-msg="This field is mandatory" data-error-class="u-has-error-v1"
                                            data-success-class="u-has-success-v1">
                                    </div>
                                </div>

                                <div class="col-sm-6 g-mb-20">
                                    <div class="form-group">
                                        <label
                                            class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Phone Number') }}</label>
                                        <input id="inputGroup10"
                                            class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                            name="phone" type="number" placeholder="{{ __('Phone Number') }}" required
                                            data-msg="This field is mandatory" data-error-class="u-has-error-v1"
                                            data-success-class="u-has-success-v1">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-6 g-mb-20">
                                    <div class="form-group">
                                        <label
                                            class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Province/City') }}</label>
                                        <input id="inputGroup8"
                                            class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                            name="province" type="text" placeholder="Ho Chi Minh city" required
                                            data-msg="This field is mandatory" data-error-class="u-has-error-v1"
                                            data-success-class="u-has-success-v1">
                                    </div>
                                </div>

                                <div class="col-sm-6 g-mb-20">
                                    <div class="form-group">
                                        <label
                                            class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('District') }}</label>
                                        <input id="inputGroup8"
                                            class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                            name="district" type="text" placeholder="District 1" required
                                            data-msg="This field is mandatory" data-error-class="u-has-error-v1"
                                            data-success-class="u-has-success-v1">
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-sm-6 g-mb-20">
                                    <div class="form-group">
                                        <label
                                            class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Zip/Postal Code') }}</label>
                                        <input id="inputGroup9"
                                            class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                            name="zip_code" type="text" placeholder="AB123"
                                            data-msg="This field is mandatory" data-error-class="u-has-error-v1"
                                            data-success-class="u-has-success-v1" maxlength="15">
                                    </div>
                                </div>

                                <div class="col-sm-6 g-mb-20">
                                    <div class="form-group">
                                        <label
                                            class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Address') }}</label>
                                        <input id="inputGroup9"
                                            class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                            name="address" type="text" placeholder="{{ __('Address') }}" required
                                            data-msg="This field is mandatory" data-error-class="u-has-error-v1"
                                            data-success-class="u-has-success-v1">
                                    </div>
                                </div>

                                {{-- <div class="col-sm-6 g-mb-20">
                                    <div class="form-group">
                                        <label class="d-block g-color-gray-dark-v2 g-font-size-13">Country</label>
                                        <select
                                            class="js-custom-select u-select-v1 g-brd-gray-light-v2 g-color-gray-light-v1 g-py-12"
                                            style="width: 100%;" data-placeholder="Choose your Country"
                                            data-open-icon="fa fa-angle-down" data-close-icon="fa fa-angle-up" required
                                            data-msg="This field is mandatory" data-error-class="u-has-error-v1"
                                            data-success-class="u-has-success-v1">
                                            <option></option>
                                        </select>
                                    </div>
                                </div> --}}
                            </div>

                            {{-- Thong tin nguoi nhan --}}
                            <hr class="g-mb-50">
                            <h4 class="h6 text-uppercase g-color-gray-dark-v4 g-text-underline--none--hover collapsed">
                                <a class="g-color-gray-dark-v4 g-text-underline--none--hover collapsed"
                                    href="#consignee_info" data-toggle="collapse" data-parent="#consignee_info"
                                    aria-expanded="false" aria-controls="consignee_info">
                                    {{ __('Consignee Information') }}
                                    <span class="ml-3 fa fa-angle-down"></span>
                                </a>
                            </h4>
                            <div id="consignee_info" class="collapse" role="tabpanel" aria-labelledby="consignee_info_body">
                                <div class="row">
                                    <div class="col-sm-6 g-mb-20">
                                        <div class="form-group">
                                            <label
                                                class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('First Name') }}</label>
                                            <input id="inputGroup9"
                                                class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                                name="consignee_first_name" type="text"
                                                placeholder="{{ __('First Name') }}" required=""
                                                data-msg="This field is mandatory" data-error-class="u-has-error-v1"
                                                data-success-class="u-has-success-v1" aria-required="true">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 g-mb-20">
                                        <div class="form-group">
                                            <label
                                                class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Last Name') }}</label>
                                            <input id="inputGroup9"
                                                class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                                name="consignee_last_name" type="text"
                                                placeholder="{{ __('Last Name') }}" required=""
                                                data-msg="This field is mandatory" data-error-class="u-has-error-v1"
                                                data-success-class="u-has-success-v1" aria-required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 g-mb-20">
                                        <div class="form-group">
                                            <label
                                                class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Email') }}</label>
                                            <input id="inputGroup9"
                                                class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                                name="consignee_email" type="email" placeholder="{{ __('Email') }}"
                                                required="" data-msg="This field is mandatory"
                                                data-error-class="u-has-error-v1" data-success-class="u-has-success-v1"
                                                aria-required="true">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 g-mb-20">
                                        <div class="form-group">
                                            <label
                                                class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Phone Number') }}</label>
                                            <input id="inputGroup9"
                                                class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                                name="consignee_phone_number" type="text"
                                                placeholder="{{ __('Phone Number') }}" required=""
                                                data-msg="This field is mandatory" data-error-class="u-has-error-v1"
                                                data-success-class="u-has-success-v1" aria-required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 g-mb-20">
                                        <div class="form-group">
                                            <label
                                                class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Address') }}</label>
                                            <input id="inputGroup9"
                                                class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                                name="consignee_address" type="text" placeholder="{{ __('Address') }}"
                                                required="" data-msg="This field is mandatory"
                                                data-error-class="u-has-error-v1" data-success-class="u-has-success-v1"
                                                aria-required="true">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="g-mb-50">

                            {{-- Hoa don cong ty --}}
                            <h4 class="h6 text-uppercase g-color-gray-dark-v4 g-text-underline--none--hover collapsed">
                                <a class="g-color-gray-dark-v4 g-text-underline--none--hover collapsed" href="#invoice"
                                    data-toggle="collapse" data-parent="#invoice" aria-expanded="false"
                                    aria-controls="invoice">
                                    {{ __('Company Invoice') }}
                                    <span class="ml-3 fa fa-angle-down"></span>
                                </a>
                            </h4>
                            <div id="invoice" class="collapse" role="tabpanel" aria-labelledby="invoice">
                                <div class="row">
                                    <div class="col-sm-6 g-mb-20">
                                        <div class="form-group">
                                            <label
                                                class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Company') }}</label>
                                            <input id="inputGroup9"
                                                class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                                name="invoice_company" type="text" placeholder="{{ __('Company') }}"
                                                required="" data-msg="This field is mandatory"
                                                data-error-class="u-has-error-v1" data-success-class="u-has-success-v1"
                                                aria-required="true">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 g-mb-20">
                                        <div class="form-group">
                                            <label
                                                class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Tax Code') }}</label>
                                            <input id="inputGroup9"
                                                class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                                name="invoice_tax_code" type="text" placeholder="{{ __('Tax Code') }}"
                                                required="" data-msg="This field is mandatory"
                                                data-error-class="u-has-error-v1" data-success-class="u-has-success-v1"
                                                aria-required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-6 g-mb-20">
                                        <div class="form-group">
                                            <label
                                                class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Email') }}</label>
                                            <input id="inputGroup9"
                                                class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                                name="invoice_email" type="email" placeholder="{{ __('Email') }}"
                                                required="" data-msg="This field is mandatory"
                                                data-error-class="u-has-error-v1" data-success-class="u-has-success-v1"
                                                aria-required="true">
                                        </div>
                                    </div>

                                    <div class="col-sm-6 g-mb-20">
                                        <div class="form-group">
                                            <label
                                                class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Phone Number') }}</label>
                                            <input id="inputGroup9"
                                                class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                                name="invoice_phone_number" type="text"
                                                placeholder="{{ __('Phone Number') }}" required=""
                                                data-msg="This field is mandatory" data-error-class="u-has-error-v1"
                                                data-success-class="u-has-success-v1" aria-required="true">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12 g-mb-20">
                                        <div class="form-group">
                                            <label
                                                class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Address') }}</label>
                                            <input id="inputGroup9"
                                                class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                                name="invoice_address" type="text" placeholder="{{ __('Address') }}"
                                                required="" data-msg="This field is mandatory"
                                                data-error-class="u-has-error-v1" data-success-class="u-has-success-v1"
                                                aria-required="true">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <hr class="g-mb-50">

                            <h4 class="h6 text-uppercase mb-5">{{ __('Shipping method') }}</h4>

                            <!-- Shipping Mehtod -->
                            <table class="mb-5">
                                <thead class="h6 g-brd-bottom g-brd-gray-light-v3 g-color-gray-dark-v3 g-font-size-13">
                                    <tr>
                                        <th class="g-width-70 g-font-weight-500 g-pa-0 g-pb-10">{{ __('Destination') }}
                                        </th>
                                        <th class="g-width-110 g-font-weight-500 g-pa-0 g-pb-10">
                                            {{ __('Delivery type') }}
                                        </th>
                                        <th class="g-width-150 g-font-weight-500 g-pa-0 g-pb-10">
                                            {{ __('Delivery time') }}
                                        </th>
                                        <th class="g-width-70 g-font-weight-500 text-right g-pa-0 g-pb-10">
                                            {{ __('Cost') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="g-color-gray-dark-v4 g-font-size-13">
                                        <td class="align-top g-py-10">UK</td>
                                        <td class="align-top g-py-10">Standard delivery</td>
                                        <td class="align-top g-py-10">2-3 Working days</td>
                                        <td class="align-top text-right g-py-10">$5.5</td>
                                    </tr>
                                    <tr class="g-color-gray-dark-v4 g-font-size-13">
                                        <td class="align-top g-py-10"></td>
                                        <td class="align-top g-py-10">Next day</td>
                                        <td class="align-top g-py-10">Order before 12pm monday - thursday and receive it the
                                            next day</td>
                                        <td class="align-top text-right g-py-10">$9.5</td>
                                    </tr>
                                    <tr class="g-color-gray-dark-v4 g-font-size-13">
                                        <td class="align-top g-py-10"></td>
                                        <td class="align-top g-py-10">Saturday delivery</td>
                                        <td class="align-top g-py-10">Saturday delivery for orders placed before 12pm on
                                            friday</td>
                                        <td class="align-top text-right g-py-10">$12.00</td>
                                    </tr>
                                    <tr class="g-color-gray-dark-v4 g-font-size-13">
                                        <td class="align-top g-py-10">Europe</td>
                                        <td class="align-top g-py-10">Standard delivery</td>
                                        <td class="align-top g-py-10">3-9 Working days</td>
                                        <td class="align-top text-right g-py-10">$20.00</td>
                                    </tr>
                                    <tr class="g-color-gray-dark-v4 g-font-size-13">
                                        <td class="align-top g-py-10">America</td>
                                        <td class="align-top g-py-10">Standard delivery</td>
                                        <td class="align-top g-py-10">3-9 Working days</td>
                                        <td class="align-top text-right g-py-10">$25.00</td>
                                    </tr>
                                </tbody>
                            </table>
                            <!-- End Shipping Mehtod -->

                            <button class="btn u-btn-primary g-font-size-13 text-uppercase g-px-40 g-py-15" type="button"
                                data-next-step="#step3">{{ __('Proceed to Payment') }}</button>
                        </div>

                        <div class="col-md-4 g-mb-30">
                            <!-- Order Summary -->
                            <div class="g-bg-gray-light-v5 g-pa-20 g-pb-50 mb-4">
                                <h4 class="h6 text-uppercase mb-3">{{ __('Order summary') }}</h4>

                                <!-- Accordion -->
                                <div id="accordion-03" class="mb-4" role="tablist" aria-multiselectable="true">
                                    <div id="accordion-03-heading-03" class="g-brd-y g-brd-gray-light-v2 py-3" role="tab">
                                        <h5 class="g-font-weight-400 g-font-size-default mb-0">
                                            <a class="g-color-gray-dark-v4 g-text-underline--none--hover"
                                                href="#accordion-03-body-03" data-toggle="collapse"
                                                data-parent="#accordion-03" aria-expanded="false"
                                                aria-controls="accordion-03-body-03">
                                                {{ Cart::instance('shopping')->count() }}
                                                {{ __('items in cart') }}
                                                <span class="ml-3 fa fa-angle-down"></span>
                                            </a>
                                        </h5>
                                    </div>
                                    <div id="accordion-03-body-03" class="collapse" role="tabpanel"
                                        aria-labelledby="accordion-03-heading-03">
                                        <div class="g-py-15">
                                            <ul class="list-unstyled mb-3">
                                                @foreach (Cart::instance('shopping')->content() as $item)
                                                    <!-- Product -->
                                                    <li class="d-flex justify-content-start mb-3">
                                                        <img class="g-width-100 g-height-100 mr-3"
                                                            src="{{ getImage($item->options->image) }}"
                                                            alt="{{ $item->options->name_seo }}">
                                                        <div class="d-block">
                                                            <h4 class="h6 g-color-black">{{ $item->options->name_seo }}
                                                            </h4>
                                                            <ul
                                                                class="list-unstyled g-color-gray-dark-v4 g-font-size-12 g-line-height-1_4 mb-1">
                                                                <li>{{ __('Size') }}: {{ $item->options->capa }}</li>
                                                                <li>{{ __('Unit') }}:
                                                                    {{ Price::getCapaNameViaCart($item->options->capa_id)->name }}
                                                                </li>
                                                                <li>
                                                                    {{ __('Qty') }}: {{ $item->qty }}
                                                                </li>
                                                            </ul>
                                                            <span class="d-block g-color-black g-font-weight-400">
                                                                {{ getPrice($item->price) }}
                                                            </span>
                                                        </div>
                                                    </li>
                                                    <!-- End Product -->
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- End Accordion -->

                                <div class="d-flex justify-content-between mb-2">
                                    <span class="g-color-black">{{ __('Subtotal') }}</span>
                                    <span
                                        class="g-color-black g-font-weight-300">{{ Cart::instance('shopping')->subtotal() }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-2">
                                    <span class="g-color-black">{{ __('Tax') }}</span>
                                    <span
                                        class="g-color-black g-font-weight-300">{{ Cart::instance('shopping')->tax() }}</span>
                                </div>
                                <div class="d-flex justify-content-between">
                                    <span class="g-color-black">{{ __('Order Total') }}</span>
                                    <span
                                        class="g-color-black g-font-weight-300">{{ Cart::instance('shopping')->total() }}</span>
                                </div>
                            </div>
                            <!-- End Order Summary -->
                        </div>
                    </div>
                </div>
                <!-- End Shipping -->

                <!-- Payment & Review -->
                <div id="step3">
                    <div class="row">
                        <div class="col-md-8 g-mb-30">
                            <!-- Payment Methods -->
                            <ul class="list-unstyled mb-5">
                                <li class="g-brd-bottom g-brd-gray-light-v3 pb-3 my-3">
                                    <label
                                        class="form-check-inline u-check d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover g-pl-30">
                                        <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radInline1_1"
                                            type="radio">
                                        <span class="d-block u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                                            <i class="fa" data-check-icon="&#xf00c"></i>
                                        </span>
                                        {{ __('Pay with') }}
                                        <img class="g-width-70 ml-2" src="assets/img-temp/200x55/img1.jpg"
                                            alt="Image Description">
                                    </label>
                                </li>
                                <li class="my-3">
                                    <label
                                        class="form-check-inline u-check d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover g-pl-30">
                                        <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radInline1_1"
                                            type="radio" checked>
                                        <span class="d-block u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                                            <i class="fa" data-check-icon="&#xf00c"></i>
                                        </span>
                                        {{ __('Pay with Credit Card') }}
                                        <img class="g-width-50 ml-2" src="assets/img-temp/200x55/img2.jpg"
                                            alt="Image Description">
                                    </label>
                                </li>
                            </ul>
                            <!-- End Payment Methods -->

                            <!-- Alert -->
                            <div class="alert g-brd-around g-brd-gray-dark-v5 rounded-0 g-pa-0 mb-4" role="alert">
                                <div class="media">
                                    <div class="d-flex g-brd-right g-brd-gray-dark-v5 g-pa-15">
                                        <span class="u-icon-v1 u-icon-size--xs g-color-black">
                                            <i class="align-middle icon-media-065 u-line-icon-pro"></i>
                                        </span>
                                    </div>
                                    <div class="media-body g-pa-15">
                                        <p class="g-color-black m-0">
                                            {{ __('My billing and shipping address are the correct') }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- End Alert -->

                            <!-- Shipping Details -->
                            <ul class="list-unstyled g-color-gray-dark-v4 g-font-size-15 g-pl-70 mb-5">
                                <li class="g-my-3">Chester Ryan</li>
                                <li class="g-my-3">chester@gmail.com</li>
                                <li class="g-my-3">51 Hailee Park</li>
                                <li class="g-my-3">New York, NY, 10013</li>
                                <li class="g-my-3">AB123</li>
                                <li class="g-my-3">United States</li>
                                <li class="g-my-3">+01 731 878 77</li>
                            </ul>
                            <!-- End Shipping Details -->

                            <div class="g-brd-bottom g-brd-gray-light-v3 g-pb-30 g-mb-30">
                                <div class="text-right">
                                    <button class="btn u-btn-primary g-font-size-13 text-uppercase g-px-40 g-py-15"
                                        type="button">{{ __('Make Payment') }}</button>
                                </div>
                            </div>

                            <!-- Accordion -->
                            <div id="accordion-04" class="g-max-width-300" role="tablist" aria-multiselectable="true">
                                <div id="accordion-04-heading-04" role="tab">
                                    <h5 class="h6 text-uppercase mb-0">
                                        <a class="g-color-black g-text-underline--none--hover" href="#accordion-04-body-04"
                                            data-toggle="collapse" data-parent="#accordion-04" aria-expanded="false"
                                            aria-controls="accordion-04-body-04">{{ __('Apply discount code') }}
                                            <span class="ml-3 fa fa-angle-down"></span></a>
                                    </h5>
                                </div>
                                <div id="accordion-04-body-04" class="collapse" role="tabpanel"
                                    aria-labelledby="accordion-04-heading-04">
                                    <div class="input-group rounded g-pt-15">
                                        <input
                                            class="form-control g-brd-gray-light-v1 g-brd-right-none g-color-gray-dark-v3 g-placeholder-gray-dark-v3"
                                            type="text" placeholder="Enter discount code">
                                        <span class="input-group-append g-brd-gray-light-v1 g-bg-white">
                                            <button class="btn u-btn-primary" type="submit">{{ __('Apply') }}</button>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <!-- End Accordion -->
                        </div>

                        <div class="col-md-4 g-mb-30">
                            <!-- Order Summary -->
                            <div class="g-bg-gray-light-v5 g-pa-20 g-pb-50 mb-4">
                                <div class="g-brd-bottom g-brd-gray-light-v3 g-mb-15">
                                    <h4 class="h6 text-uppercase mb-3">{{ __('Order summary') }}</h4>
                                </div>

                                <div class="d-flex justify-content-between mb-3">
                                    <span class="g-color-black">{{ __('Cart Subtotal') }}</span>
                                    <span
                                        class="g-color-black g-font-weight-300">{{ Cart::instance('shopping')->subtotal() }}</span>
                                </div>
                                <div class="mb-3">
                                    <div class="d-flex justify-content-between mb-1">
                                        <span class="g-color-black">{{ __('Shipping') }}</span>
                                        <span class="g-color-black g-font-weight-300">$5.5</span>
                                    </div>
                                    <p class="g-font-size-13">{{ __('Shipping Delivery - 2-3 Working Days') }}</p>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <span class="g-color-black">{{ __('Tax') }}</span>
                                    <span
                                        class="g-color-black g-font-weight-300">{{ Cart::instance('shopping')->tax() }}</span>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <span class="g-color-black">{{ __('Order Total') }}</span>
                                    <span
                                        class="g-color-black g-font-weight-300">{{ Cart::instance('shopping')->total() }}</span>
                                </div>

                                <!-- Accordion -->
                                <div id="accordion-05" class="mb-4" role="tablist" aria-multiselectable="true">
                                    <div id="accordion-05-heading-05" class="g-brd-y g-brd-gray-light-v2 py-3" role="tab">
                                        <h5 class="g-font-weight-400 g-font-size-default mb-0">
                                            <a class="g-color-gray-dark-v4 g-text-underline--none--hover"
                                                href="#accordion-05-body-05" data-toggle="collapse"
                                                data-parent="#accordion-05" aria-expanded="false"
                                                aria-controls="accordion-05-body-05">{{ Cart::instance('shoppping')->count() }}
                                                {{ __('items in cart') }}
                                                <span class="ml-3 fa fa-angle-down"></span></a>
                                        </h5>
                                    </div>
                                    <div id="accordion-05-body-05" class="collapse" role="tabpanel"
                                        aria-labelledby="accordion-05-heading-05">
                                        <div class="g-py-15">
                                            <ul class="list-unstyled mb-3">
                                                @foreach (Cart::instance('shopping')->content() as $item)<?= 1 ?>
                                                                                                                            <!-- Product -->
                                                                                                                            <li class="d-flex justify-content-start">
                                                                                                                                <img class="g-width-100 g-height-100 mr-3"
                                                                                                                                    src="{{ $item->image }}"
                                                                                                                                    alt="{{ $item->options->name_seo }}">
                                                                                                                                <div class="d-block">
                                                                                                                                    <h4 class="h6 g-color-black">{{ $item->options->name_seo }}
                                                                                                                                    </h4>
                                                                                                                                    <ul
                                                                                                                                        class="list-unstyled g-color-gray-dark-v4 g-font-size-12 g-line-height-1_4 mb-1">
                                                                                                                                        <li>{{ __('Size') }}: {{ $item->options->capa }}</li>
                                                                                                                                        <li>{{ __('Unit') }}:
                                                                                                                                            {{ Price::getCapaNameViaCart($item->options->capa_id)->name }}
                                                                                                                                        </li>
                                                                                                                                        <li>
                                                                                                                                            {{ __('Qty') }}: {{ $item->qty }}
                                                                                                                                        </li>
                                                                                                                                    </ul>
                                                                                                                                    <span class="d-block g-color-black g-font-weight-400">
                                                                                                                                        {{ getPrice($item->price) }}
                                                                                                                                    </span>
                                                                                                                                </div>
                                                                                                                            </li>
                                                                                                                            <!-- End Product -->
                                                                                                                        @endforeach
                                                                                                                    </ul>
                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                        <!-- End Accordion -->
                                                                                                    </div>
                                                                                                    <!-- End Order Summary -->

                                                                                                    <!-- Ship To -->
                                                                                                    <div class="g-px-20 mb-5">
                                                                                                        <div class="d-flex justify-content-between g-brd-bottom g-brd-gray-light-v3 g-mb-15">
                                                                                                            <h4 class="h6 text-uppercase mb-3">Ship to</h4>
                                                                                                            <span class="g-color-gray-dark-v4 g-color-black--hover g-cursor-pointer">
                                                                                                                <i class="fa fa-pencil"></i>
                                                                                                            </span>
                                                                                                        </div>
                                                                                                        <ul class="list-unstyled g-color-gray-dark-v4 g-font-size-15">
                                                                                                            <li class="g-my-3">Chester Ryan</li>
                                                                                                            <li class="g-my-3">chester@gmail.com</li>
                                                                                                            <li class="g-my-3">51 Hailee Park</li>
                                                                                                            <li class="g-my-3">New York, NY, 10013</li>
                                                                                                            <li class="g-my-3">AB123</li>
                                                                                                            <li class="g-my-3">United States</li>
                                                                                                            <li class="g-my-3">+01 731 878 77</li>
                                                                                                        </ul>
                                                                                                    </div>
                                                                                                    <!-- End Ship To -->

                                                                                                    <!-- Shipping Method -->
                                                                                                    <div class="g-px-20 mb-5">
                                                                                                        <div class="d-flex justify-content-between g-brd-bottom g-brd-gray-light-v3 g-mb-15">
                                                                                                            <h4 class="h6 text-uppercase mb-3">Shipping Method</h4>
                                                                                                            <span class="g-color-gray-dark-v4 g-color-black--hover g-cursor-pointer">
                                                                                                                <i class="fa fa-pencil"></i>
                                                                                                            </span>
                                                                                                        </div>
                                                                                                        <p class="g-color-gray-dark-v4 g-font-size-15">UK Standard Delivery - 2-3 Working Days</p>
                                                                                                    </div>
                                                                                                    <!-- End Shipping Method -->
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <!-- End Payment & Review -->
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                            <!-- End Checkout Form -->
@endsection
@include('frontend.cart.stack')
