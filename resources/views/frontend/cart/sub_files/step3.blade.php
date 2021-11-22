<?php
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Price;
?>
<div id="step3">
    <div class="row">
        <div class="col-md-8 g-mb-30">
            <!-- Payment Methods -->
            <ul class="list-unstyled mb-5">
                <li class="g-brd-bottom g-brd-gray-light-v3 pb-3 my-3">
                    <label
                        class="form-check-inline u-check d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover g-pl-30">
                        <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="payment" value="cash"
                            type="radio" checked>
                        <span class="d-block u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                            <i class="fa" data-check-icon="&#xf00c"></i>
                        </span>
                        {{ __('Pay with Cash') }}
                        <i class="fa fa-money fa-lg" title="Cash" data-toggle="tooltip" data-placement="top"></i>
                    </label>
                </li>
                <li class="my-3">
                    <label
                        class="form-check-inline u-check d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover g-pl-30">
                        <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="payment" value="vnpay"
                            type="radio">
                        <span class="d-block u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                            <i class="fa" data-check-icon="&#xf00c"></i>
                        </span>
                        {{ __('Pay with Vnpay') }}
                        <img class="g-width-50 ml-2" src="{{ getImage('img/vnpay.svg') }}" alt="{{ __('VNPAY') }}">
                    </label>
                </li>
                <li class="g-brd-bottom g-brd-gray-light-v3 pb-3 my-3">
                    <label
                        class="form-check-inline u-check d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover g-pl-30">
                        <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="payment" value="paypal"
                            type="radio">
                        <span class="d-block u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                            <i class="fa" data-check-icon="&#xf00c"></i>
                        </span>
                        {{ __('Pay with Paypal') }}
                        <i class="fa fa-cc-paypal fa-lg" title="Paypal" data-toggle="tooltip" data-placement="top"></i>
                    </label>
                </li>
            </ul>
            <!-- End Payment Methods -->

            <!-- Alert -->
            <div class="alert g-brd-around g-brd-gray-dark-v5 rounded-0 g-pa-0 mb-4" role="alert">
                <div class="media">
                    <div class="d-flex g-brd-right g-brd-gray-dark-v5 g-pa-15">
                        <span class="u-icon-v1 u-icon-size--xs g-color-black">
                            <i class="align-middle icon-media-065 u-line-icon-pro g-color-primary"></i>
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
            <div class="ship_detail g-px-20 mb-5">
                <div class="d-flex justify-content-between g-brd-bottom g-brd-gray-light-v3 g-mb-15">
                    <h4 class="h6 text-uppercase mb-3">{{ __('Order Information') }}</h4>
                </div>
                <ul class="list-unstyled g-color-gray-dark-v4 g-font-size-15">
                    <li class="g-my-3">{{ __('Full Name') }}: <b><span id="ship_detail_fullname"></span></b></li>
                    <li class="g-my-3">{{ __('Gender') }}: <b><span id="ship_detail_gender"></span></b></li>
                    <li class="g-my-3">{{ __('Email Address') }}: <b><span id="ship_detail_email"></span></b></li>
                    <li class="g-my-3">{{ __('Phone Number') }}: <b><span id="ship_detail_phone"></span></b></li>
                    <li class="g-my-3">{{ __('Province/City') }}: <b><span id="ship_detail_province"></span></b>
                    </li>
                    <li class="g-my-3">{{ __('District') }}: <b><span id="ship_detail_district"></span></b></li>
                    <li class="g-my-3">{{ __('Zip Code') }}: <b><span id="ship_detail_zipcode"></span></b></li>
                    <li class="g-my-3">{{ __('Address') }}: <b><span id="ship_detail_address"></span></b></li>
                    <li class="g-my-3">{{ __('Note') }}: <b><span id="ship_detail_note"></span></b></li>
                </ul>
            </div>
            <!-- End Shipping Details -->

            <!-- Ship To -->
            <div class="shipto g-px-20 mb-5">
                <div class="d-flex justify-content-between g-brd-bottom g-brd-gray-light-v3 g-mb-15">
                    <h4 class="h6 text-uppercase mb-3">{{ __('Ship to') }}</h4>
                </div>
                <ul class="list-unstyled g-color-gray-dark-v4 g-font-size-15">
                    <li class="g-my-3">{{ __('Full Name') }}: <b><span id="shipto_fullname"></span></b></li>
                    <li class="g-my-3">{{ __('Phone Number') }}: <b><span id="shipto_phone"></span></b></li>
                    <li class="g-my-3">{{ __('Email Address') }}: <b><span id="shipto_email"></span></b></li>
                    <li class="g-my-3">{{ __('Address') }}: <b><span id="shipto_address"></span></b></li>
                    <li class="g-my-3">{{ __('Note') }}: <b><span id="shipto_note"></span></b></li>
                </ul>
            </div>
            <!-- End Ship To -->

            <div class="g-brd-bottom g-brd-gray-light-v3 g-pb-30 g-mb-30">
                <div class="text-right">
                    <button class="btn u-btn-primary g-font-size-13 text-uppercase g-px-40 g-py-15" type="submit"
                        name="make_payment" value="make_payment">{{ __('Make Payment') }}</button>
                </div>
            </div>

            <!-- Accordion -->
            {{-- <div id="accordion-04" class="g-max-width-300" role="tablist" aria-multiselectable="true">
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
            </div> --}}
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
                    <span class="g-color-black g-font-weight-300">{{ Cart::instance('shopping')->subtotal() }}</span>
                </div>
                <div class="mb-3">
                    <div class="d-flex justify-content-between mb-1">
                        <span class="g-color-black">{{ __('Shipping') }}</span>
                        <span class="g-color-black g-font-weight-300">{{ getPrice('15000') }}</span>
                    </div>
                    <p class="g-font-size-13">{{ __('Shipping Delivery - 2-3 Working Days') }}</p>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="g-color-black">{{ __('Tax') }}</span>
                    <span class="g-color-black g-font-weight-300">{{ Cart::instance('shopping')->tax() }}</span>
                </div>
                <div class="d-flex justify-content-between mb-3">
                    <span class="g-color-black">{{ __('Order Total') }}</span>
                    <span class="g-color-black g-font-weight-300">{{ Cart::instance('shopping')->total() }}</span>
                </div>

                <!-- Accordion -->
                <div id="accordion-05" class="mb-4" role="tablist" aria-multiselectable="true">
                    <div id="accordion-05-heading-05" class="g-brd-y g-brd-gray-light-v2 py-3" role="tab">
                        <h5 class="g-font-weight-400 g-font-size-default mb-0">
                            <a class="g-color-gray-dark-v4 g-text-underline--none--hover" href="#accordion-05-body-05"
                                data-toggle="collapse" data-parent="#accordion-05" aria-expanded="false"
                                aria-controls="accordion-05-body-05">{{ Cart::instance('shopping')->count() }}
                                {{ __('items in cart') }}
                                <span class="ml-3 fa fa-angle-down"></span></a>
                        </h5>
                    </div>
                    <div id="accordion-05-body-05" class="collapse" role="tabpanel"
                        aria-labelledby="accordion-05-heading-05">
                        <div class="g-py-15">
                            <ul class="list-unstyled mb-3">
                                @foreach (Cart::instance('shopping')->content() as $item)
                                    <!-- Product -->
                                    <li class="d-flex justify-content-start">
                                        <img class="g-width-100 g-height-100 mr-3" src="{{ getImage($item->options->image) }}"
                                            alt="{{ $item->options->name_seo }}">
                                        <div class="d-block">
                                            <h4 class="h6 g-color-black">{{ $item->options->name_seo }}
                                            </h4>
                                            <ul
                                                class="list-unstyled g-color-gray-dark-v4 g-font-size-12 g-line-height-1_4 mb-1">
                                                <li>{{ __('Size') }}: {{ $item->options->capa }}
                                                </li>
                                                <li>{{ __('Unit') }}:
                                                    {{ Price::getCapaNameViaCart($item->options->capa_id)->name }}
                                                </li>
                                                <li>
                                                    {{ __('Qty') }}: {{ $item->qty }}
                                                </li>
                                            </ul>
                                            <span class="d-block g-color-black g-font-weight-400">
                                                {{ getPrice($item->qty * $item->price) }}
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

            <!-- Invoice -->
            <div class="invoice_summary g-px-20 mb-5">
                <div class="d-flex justify-content-between g-brd-bottom g-brd-gray-light-v3 g-mb-15">
                    <h4 class="h6 text-uppercase mb-3">{{ __('Invoice Info') }}</h4>
                    <span class="g-color-gray-dark-v4 g-color-black--hover g-cursor-pointer">
                        <i class="fa fa-pencil"></i>
                    </span>
                </div>
                <ul class="list-unstyled g-color-gray-dark-v4 g-font-size-15">
                    <li class="g-my-3">{{ __('Company') }}: <b><span id="invoice_summary_company"></span></b>
                    </li>
                    <li class="g-my-3">{{ __('Tax Code') }}: <b><span id="invoice_summary_taxcode"></span></b></li>
                    <li class="g-my-3">{{ __('Email Address') }}: <b><span id="invoice_summary_email"></span></b>
                    </li>
                    <li class="g-my-3">{{ __('Phone Number') }}: <b><span id="invoice_summary_phone"></span></b>
                    </li>
                    <li class="g-my-3">{{ __('Address') }}: <b><span id="invoice_summary_address"></span></b></li>
                    <li class="g-my-3">{{ __('Note') }}: <b><span id="invoice_summary_note"></span></b></li>
                </ul>
            </div>
            <!-- End Ship To -->

            <!-- Shipping Method -->
            {{-- <div class="g-px-20 mb-5">
                <div class="d-flex justify-content-between g-brd-bottom g-brd-gray-light-v3 g-mb-15">
                    <h4 class="h6 text-uppercase mb-3">{{ __('Shipping Method') }}</h4>
                    <span class="g-color-gray-dark-v4 g-color-black--hover g-cursor-pointer">
                        <i class="fa fa-pencil"></i>
                    </span>
                </div>
                <p class="g-color-gray-dark-v4 g-font-size-15">UK Standard Delivery - 2-3 Working Days</p>
            </div> --}}
            <!-- End Shipping Method -->
        </div>
    </div>
</div>
