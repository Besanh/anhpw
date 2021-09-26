<div class="u-header__section g-brd-bottom g-brd-gray-light-v4 g-bg-black g-transition-0_3">
    <div class="container">
        <div class="row justify-content-between align-items-center g-mx-0--lg">
            <div class="col-sm-auto g-hidden-sm-down">
                <!-- Social Icons -->
                <ul class="list-inline g-py-14 mb-0">
                    <li class="list-inline-item">
                        @if ($socials && isJson($socials->value_setting))
                            @foreach (json_decode($socials->value_setting, true) as $s)
                                @foreach ($s as $item)
                                    @if (isJson($item))
                                        <a class="g-color-white-opacity-0_8 g-color-primary--hover g-pa-3"
                                            href="{{ json_decode($item)->link }}" target="__blank">
                                            {!! json_decode($item)->icon !!}
                                        </a>
                                    @endif
                                @endforeach
                            @endforeach
                        @endif
                    </li>
                </ul>
                <!-- End Social Icons -->
            </div>

            <div
                class="col-sm-auto g-hidden-sm-down g-color-white-opacity-0_6 g-font-weight-400 g-pl-15 g-pl-0--sm g-py-14">
                <i
                    class="icon-communication-163 u-line-icon-pro g-font-size-18 g-valign-middle g-color-white-opacity-0_8 g-mr-10 g-mt-minus-2"></i>
                {{ $phone->value_setting }}
            </div>

            @include('frontend.layouts.sub-files.menu-topbar')

            <div class="col-sm-auto g-pr-15 g-pr-0--sm">
                <!-- Basket -->
                <div class="u-basket d-inline-block g-z-index-3">
                    <div class="g-py-10 g-px-6">
                        <a href="#" id="basket-bar-invoker"
                            class="u-icon-v1 g-color-white-opacity-0_8 g-color-primary--hover g-font-size-17 g-text-underline--none--hover"
                            aria-controls="basket-bar" aria-haspopup="true" aria-expanded="false"
                            data-dropdown-event="hover" data-dropdown-target="#basket-bar"
                            data-dropdown-type="css-animation" data-dropdown-duration="300"
                            data-dropdown-hide-on-scroll="false" data-dropdown-animation-in="fadeIn"
                            data-dropdown-animation-out="fadeOut">
                            <span
                                class="u-badge-v1--sm g-color-white g-bg-primary g-font-size-11 g-line-height-1_4 g-rounded-50x g-pa-4"
                                style="top: 7px !important; right: 3px !important;">4</span>
                            <i class="icon-hotel-restaurant-105 u-line-icon-pro"></i>
                        </a>
                    </div>

                    <div id="basket-bar"
                        class="u-basket__bar u-dropdown--css-animation u-dropdown--hidden g-text-transform-none g-bg-white g-brd-around g-brd-gray-light-v4"
                        aria-labelledby="basket-bar-invoker">
                        <div class="g-brd-bottom g-brd-gray-light-v4 g-pa-15 g-mb-10">
                            <span class="d-block h6 text-center text-uppercase mb-0">Shopping Cart</span>
                        </div>
                        <div class="js-scrollbar g-height-200">
                            <!-- Product -->
                            <div class="u-basket__product g-brd-none g-px-20">
                                <div class="row no-gutters g-pb-5">
                                    <div class="col-4 pr-3">
                                        <a class="u-basket__product-img" href="#">
                                            <img class="img-fluid" src="../assets/img-temp/150x150/img1.jpg"
                                                alt="Image Description">
                                        </a>
                                    </div>

                                    <div class="col-8">
                                        <h6 class="g-font-weight-400 g-font-size-default">
                                            <a class="g-color-black g-color-primary--hover g-text-underline--none--hover"
                                                href="#">Black Glasses</a>
                                        </h6>
                                        <small class="g-color-primary g-font-size-12">1 x $22.00</small>
                                    </div>
                                </div>
                                <button type="button" class="u-basket__product-remove">&times;</button>
                            </div>
                            <!-- End Product -->
                        </div>

                        <div class="clearfix g-px-15">
                            <div
                                class="row align-items-center text-center g-brd-y g-brd-gray-light-v4 g-font-size-default">
                                <div class="col g-brd-right g-brd-gray-light-v4">
                                    <strong
                                        class="d-block g-py-10 text-uppercase g-color-main g-font-weight-500 g-py-10">Total</strong>
                                </div>
                                <div class="col">
                                    <strong
                                        class="d-block g-py-10 g-color-main g-font-weight-500 g-py-10">$433.00</strong>
                                </div>
                            </div>
                        </div>

                        <div class="g-pa-20">
                            <div class="text-center g-mb-15">
                                <a class="text-uppercase g-color-primary g-color-main--hover g-font-weight-400 g-font-size-13 g-text-underline--none--hover"
                                    href="page-checkout-1.html">
                                    View Cart
                                    <i class="ml-2 icon-finance-100 u-line-icon-pro"></i>
                                </a>
                            </div>
                            <a class="btn btn-block u-btn-black g-brd-primary--hover g-bg-primary--hover g-font-size-12 text-uppercase rounded g-py-10"
                                href="page-checkout-1.html">Proceed to Checkout</a>
                        </div>
                    </div>
                </div>
                <!-- End Basket -->

                <!-- Search -->
                <div class="d-inline-block g-valign-middle">
                    <div class="g-py-10 g-pl-15">
                        <a href="#"
                            class="g-color-white-opacity-0_8 g-color-primary--hover g-font-size-17 g-text-underline--none--hover"
                            aria-haspopup="true" aria-expanded="false" data-dropdown-event="click"
                            aria-controls="searchform-1" data-dropdown-target="#searchform-1"
                            data-dropdown-type="css-animation" data-dropdown-duration="300"
                            data-dropdown-animation-in="fadeInUp" data-dropdown-animation-out="fadeOutDown">
                            <i class="g-pos-rel g-top-3 icon-education-045 u-line-icon-pro"></i>
                        </a>
                    </div>

                    <!-- Search Form -->
                    <form id="searchform-1"
                        class="u-searchform-v1 u-dropdown--css-animation u-dropdown--hidden u-shadow-v20 g-brd-around g-brd-gray-light-v4 g-bg-white g-right-0 rounded g-pa-10 1g-mt-8">
                        <div class="input-group">
                            <input class="form-control g-font-size-13" type="search" placeholder="Search Here...">
                            <div class="input-group-append p-0">
                                <button class="btn u-btn-primary g-font-size-12 text-uppercase g-py-13 g-px-15"
                                    type="submit">Go</button>
                            </div>
                        </div>
                    </form>
                    <!-- End Search Form -->
                </div>
                <!-- End Search -->
            </div>
        </div>
    </div>
</div>
