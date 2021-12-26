<?php
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Price;
?>
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
                            <?php $p_route = route('product-detail', ['brand_alias' =>
                            $item->options->b_alias, 'id' => $item->id, 'product_alias' =>
                            toAlias($item->options->name_seo)]); ?>
                            <tr class="g-brd-bottom g-brd-gray-light-v3">
                                <td class="text-left g-py-25">
                                    <a href="">
                                        <img class="d-inline-block g-width-100 mr-4"
                                            src="{{ getImage($item->options->image) }}"
                                            alt="{{ $item->options->name_seo }}">
                                    </a>
                                    <div class="d-inline-block align-middle">
                                        <a class="u-link-v5" href="{{ $p_route }}">
                                            <h4 class="h6 g-color-black">
                                                {{ $item->options->name_seo }}
                                            </h4>
                                        </a>
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
                                    <div class="js-quantity input-group u-quantity-v1 g-width-80 g-brd-primary--focus">
                                        <input
                                            class="js-result form-control text-center g-font-size-13 rounded-0 g-pa-0"
                                            type="text" name="qty[{{ $item->rowId }}]" value="{{ $item->qty }}"
                                            readonly>

                                        <div
                                            class="input-group-addon d-flex align-items-center g-width-30 g-brd-gray-light-v2 g-bg-white g-font-size-12 rounded-0 g-px-5 g-py-6">
                                            <i class="js-plus g-color-gray g-color-primary--hover fa fa-angle-up"></i>
                                            <i
                                                class="js-minus g-color-gray g-color-primary--hover fa fa-angle-down"></i>
                                        </div>
                                    </div>
                                </td>
                                <td class="text-right g-color-black">
                                    <span
                                        class="g-color-gray-dark-v2 g-font-size-13 mr-4">{{ getPrice($item->price * $item->qty) }}</span>
                                    <span class="g-color-gray-dark-v4 g-color-black--hover g-cursor-pointer">
                                        <a href="{{ route('cart.delete', ['rowId' => $item->rowId]) }}"
                                            onclick="return confirm('Are you sure?')">
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

                <div class="d-flex justify-content-between mb-2">
                    <span class="g-color-black">{{ __('Subtotal') }}</span>
                    <span class="g-color-black g-font-weight-300">{{ Cart::instance('shopping')->subTotal() }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="g-color-black">{{ __('Tax') }}</span>
                    <span class="g-color-black g-font-weight-300">{{ Cart::instance('shopping')->tax() }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="g-color-black">{{ __('Order Total') }}</span>
                    <span class="g-color-black g-font-weight-300">{{ Cart::instance('shopping')->total() }}</span>
                </div>
            </div>
            <!-- End Summary -->

            <button
                class="btn btn-block u-btn-outline-black g-brd-gray-light-v1 g-bg-black--hover g-font-size-13 text-uppercase g-py-15 mb-4"
                type="submit" name="update_shopping_cart" value="update_shopping_cart">
                {{ __('Update Shopping Cart') }}
            </button>
            <button class="btn btn-block u-btn-primary g-font-size-13 text-uppercase g-py-15 mb-4" type="button"
                data-next-step="#step2">{{ __('Proceed to Checkout') }}</button>

            <a class="d-inline-block g-color-black g-color-primary--hover g-text-underline--none--hover mb-3" href="#">
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
                            <button class="btn u-btn-primary" type="button">{{ __('Apply') }}</button>
                        </span>
                    </div>
                </div>
            </div>
            <!-- End Accordion -->
        </div>
    </div>
</div>
