<?php
use Gloudemans\Shoppingcart\Facades\Cart;
$cart = Cart::instance('shopping');
?>
<div class="u-basket d-inline-block g-z-index-3">
    <div class="g-py-10 g-px-6">
        <a href="#" id="basket-bar-invoker"
            class="u-icon-v1 g-color-white-opacity-0_8 g-color-primary--hover g-font-size-17 g-text-underline--none--hover"
            aria-controls="basket-bar" aria-haspopup="true" aria-expanded="false" data-dropdown-event="hover"
            data-dropdown-target="#basket-bar" data-dropdown-type="css-animation" data-dropdown-duration="300"
            data-dropdown-hide-on-scroll="false" data-dropdown-animation-in="fadeIn"
            data-dropdown-animation-out="fadeOut">
            <span
                class="u-badge-v1--sm g-color-white g-bg-primary g-font-size-11 g-line-height-1_4 g-rounded-50x g-pa-4"
                style="top: 7px !important; right: 3px !important;">{{ $cart->count() }}</span>
            <i class="icon-hotel-restaurant-105 u-line-icon-pro"></i>
        </a>
    </div>

    <div id="basket-bar"
        class="u-basket__bar u-dropdown--css-animation u-dropdown--hidden g-text-transform-none g-bg-white g-brd-around g-brd-gray-light-v4"
        aria-labelledby="basket-bar-invoker">
        <div class="g-brd-bottom g-brd-gray-light-v4 g-pa-15 g-mb-10">
            <span class="d-block h6 text-center text-uppercase mb-0">{{ __('Shopping Cart') }}</span>
        </div>
        <div class="js-scrollbar g-height-200">
            @if ($cart->count() > 0)
                @foreach ($cart->content() as $item)
                    <?php $p_route = route('product-detail', ['brand_alias' => $item->options->b_alias,
                    'id' => $item->id, 'product_alias' => toAlias($item->options->name_seo)]); ?>
                    <!-- Product -->
                    <div class="u-basket__product g-brd-none g-px-20">
                        <div class="row no-gutters g-pb-5">
                            <div class="col-4 pr-3">
                                <a class="u-basket__product-img" href="{{ $p_route }}">
                                    <img class="img-fluid" src="{{ getImage($item->options->image) }}"
                                        alt="{{ $item->options->name_seo }}">
                                </a>
                            </div>

                            <div class="col-8">
                                <h6 class="g-font-weight-400 g-font-size-default">
                                    <a class="g-color-black g-color-primary--hover g-text-underline--none--hover"
                                        href="{{ $p_route }}">{{ $item->options->name_seo }}</a>
                                </h6>
                                <small
                                    class="g-color-primary g-font-size-12">{{ $item->qty . ' x ' . getPrice($item->price) }}</small>
                            </div>
                        </div>
                        {{-- <button type="button" class="u-basket__product-remove">&times;</button> --}}
                        <a class="u-link-v5 u-basket__product-remove"
                            href="{{ route('cart.delete', ['rowId' => $item->rowId]) }}">&times;</a>
                    </div>
                    <!-- End Product -->
                @endforeach
            @else
                {{-- {{ __('Empty Cart') }} --}}
            @endif
        </div>

        <div class="clearfix g-px-15">
            <div class="row align-items-center text-center g-brd-y g-brd-gray-light-v4 g-font-size-default">
                <div class="col g-brd-right g-brd-gray-light-v4">
                    <strong
                        class="d-block g-py-10 text-uppercase g-color-main g-font-weight-500 g-py-10">{{ __('Total') }}</strong>
                </div>
                <div class="col">
                    <strong
                        class="d-block g-py-10 g-color-main g-font-weight-500 g-py-10">{{ $cart->total() }}</strong>
                </div>
            </div>
        </div>

        <div class="g-pa-20">
            {{-- <div class="text-center g-mb-15">
                <a class="text-uppercase g-color-primary g-color-main--hover g-font-weight-400 g-font-size-13 g-text-underline--none--hover"
                    href="{{ route('cart.index') }}">
                    {{ __('View Cart') }}
                    <i class="ml-2 icon-finance-100 u-line-icon-pro"></i>
                </a>
            </div> --}}
            <a class="btn btn-block u-btn-black g-brd-primary--hover g-bg-primary--hover g-font-size-12 text-uppercase rounded g-py-10"
        href="{{route('cart.index')}}">{{ __('Proceed to Checkout') }}</a>
        </div>
    </div>
</div>
