<?php
use Illuminate\Support\Facades\Cache;
$b_str = '';
$b_main = '';
$b_child = '';
$product_in_menu_footer = Cache::get('product_in_menu_footer');
$brands_footer = Cache::get('brands_footer');
$socials = Cache::get('socials');
?>

<!-- Footer -->
<footer class="g-bg-main-light-v1">
    <!-- Content -->
    <div class="g-brd-bottom g-brd-secondary-light-v1">
        <div class="container g-pt-100">
            <div class="row justify-content-start g-mb-30 g-mb-0--md">
                <div class="col-md-5 g-mb-30">
                    <h2 class="h5 g-color-gray-light-v3 mb-4">
                        {{ __('Products') }}
                    </h2>

                    <div class="row">
                        <div class="col-4 g-mb-20">
                            <!-- Links -->
                            <ul class="list-unstyled g-font-size-13 mb-0">
                                @if ($product_in_menu_footer)
                                    @foreach ($product_in_menu_footer as $k => $p)
                                        @if ($k <= 4)
                                            <li class="g-mb-10">
                                                <a class="u-link-v5 g-color-gray-dark-v5 g-color-primary--hover"
                                                    href="{{ route('product-detail', ['brand_alias' => $p->b_alias, 'id' => $p->id, 'product_alias' => toAlias($p->name_seo)]) }}">{{ getTeaser($p->name_seo, 3) }}</a>
                                            </li>
                                        @endif

                                    @endforeach
                                @endif
                            </ul>
                            <!-- End Links -->
                        </div>

                        <div class="col-4 g-mb-20">
                            <!-- Links -->
                            <ul class="list-unstyled g-font-size-13 mb-0">
                                @if ($product_in_menu_footer)
                                    @foreach ($product_in_menu_footer as $k => $p)
                                        @if ($k > 4 && $k <= 9)
                                            <li class="g-mb-10">
                                                <a class="u-link-v5 g-color-gray-dark-v5 g-color-primary--hover"
                                                    href="{{ route('product-detail', ['brand_alias' => $p->b_alias, 'id' => $p->id, 'product_alias' => toAlias($p->name_seo)]) }}">
                                                    {{ getTeaser($p->price_name_seo, 3) }}
                                                </a>
                                            </li>
                                        @endif

                                    @endforeach
                                @endif
                            </ul>
                            <!-- End Links -->
                        </div>

                        <div class="col-4 g-mb-20">
                            <!-- Links -->
                            <ul class="list-unstyled g-font-size-13 mb-0">
                                @if ($product_in_menu_footer)
                                    @foreach ($product_in_menu_footer as $k => $p)
                                        @if ($k > 9)
                                            <li class="g-mb-10">
                                                <a class="u-link-v5 g-color-gray-dark-v5 g-color-primary--hover"
                                                    href="{{ route('product-detail', ['brand_alias' => $p->b_alias, 'id' => $p->id, 'product_alias' => toAlias($p->name_seo)]) }}">
                                                    {{ getTeaser($p->price_name_seo, 3) }}
                                                </a>
                                            </li>
                                        @endif

                                    @endforeach
                                @endif
                            </ul>
                            <!-- End Links -->
                        </div>

                    </div>
                </div>

                <div class="col-sm-6 col-md-3 g-mb-30 g-mb-0--sm">
                    <h2 class="h5 g-color-gray-light-v3 mb-4">
                        {{ __('Brands') }}
                    </h2>

                    <div class="row">
                        {!! $b_main !!}
                        <div class="col-6 g-mb-20">
                            <!-- Links -->
                            <ul class="list-unstyled g-font-size-13 mb-0">
                                @if ($brands_footer)
                                    @foreach ($brands_footer as $k => $item)
                                        @if ($k < 4)
                                            <li class="g-mb-10">
                                                <a class="u-link-v5 g-color-gray-dark-v5 g-color-primary--hover"
                                                    href="{{ route('brand', ['alias' => $item->alias]) }}">{{ getTeaser($item->name_seo, 3) }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                            <!-- End Links -->
                        </div>
                        <div class="col-6 g-mb-20">
                            <!-- Links -->
                            <ul class="list-unstyled g-font-size-13 mb-0">
                                @if ($brands_footer)
                                    @foreach ($brands_footer as $k => $item)
                                        @if ($k >= 4)
                                            <li class="g-mb-10">
                                                <a class="u-link-v5 g-color-gray-dark-v5 g-color-primary--hover"
                                                    href="{{ route('brand', ['alias' => $item->alias]) }}">{{ getTeaser($item->name_seo, 3) }}</a>
                                            </li>
                                        @endif
                                    @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5 col-md-3 ml-auto g-mb-30 g-mb-0--sm">
                    <h2 class="h5 g-color-gray-light-v3 mb-4">{{ __('Contacts') }}</h2>

                    <!-- Links -->
                    <ul class="list-unstyled g-color-gray-dark-v5 g-font-size-13">
                        <li class="media my-3">
                            <i class="d-flex mt-1 mr-3 icon-hotel-restaurant-235 u-line-icon-pro"></i>
                            <div class="media-body">
                                @if (Cache::has('address'))
                                    {{ Cache::get('address')->value_setting }}
                                @endif
                            </div>
                        </li>
                        <li class="media my-3">
                            <i class="d-flex mt-1 mr-3 icon-communication-062 u-line-icon-pro"></i>
                            <div class="media-body">
                                @if (Cache::has('email'))
                                    {{ Cache::get('email')->value_setting }}
                                @endif
                            </div>
                        </li>
                        <li class="media my-3">
                            <i class="d-flex mt-1 mr-3 icon-communication-033 u-line-icon-pro"></i>
                            <div class="media-body">
                                @if (Cache::has('phone'))
                                    {{ Cache::get('phone')->value_setting }}
                                @endif
                            </div>
                        </li>
                    </ul>
                    <!-- End Links -->
                </div>
            </div>

            <!-- Secondary Content -->
            <div class="row">
                <div class="col-md-4 g-mb-50">
                    <h2 class="h5 g-color-gray-light-v3 mb-4">{{ __('Subscribe') }}</h2>

                    <!-- Subscribe Form -->
                    <form action="{{ route('subscriber-store') }}" method="POST"
                        class="form-subscribe input-group u-shadow-v19 rounded">
                        @csrf
                        <input id="form-email"
                            class="form-control g-brd-none g-color-gray-dark-v5 g-bg-main-light-v2 g-bg-main-light-v2--focus g-placeholder-gray-dark-v3 rounded g-px-20 g-py-8"
                            type="email" name="email" placeholder="Enter your email" required>
                        <span class="input-group-addon u-shadow-v19 g-brd-none g-bg-main-light-v2 g-pa-5">
                            <button class="btn u-btn-primary rounded text-uppercase g-py-8 g-px-18" type="submit">
                                <i class="fa fa-angle-right"></i>
                            </button>
                        </span>
                    </form>
                    <!-- End Subscribe Form -->
                </div>

                <div class="col-6 col-md-3 offset-lg-1 g-mb-30">
                    <h2 class="h5 g-color-gray-light-v3 mb-4">{{ __('This Is Version Demo') }}</h2>
                </div>

                <div class="col-6 col-md-3 ml-auto g-mb-30">
                    <h2 class="h5 g-color-gray-light-v3 mb-4">{{ __('Follow Us On') }}:</h2>

                    <!-- Social Icons -->
                    <ul class="list-inline mb-50">
                        @if ($socials && isJson($socials->value_setting))
                            @foreach (json_decode($socials->value_setting, true) as $s)
                                @foreach ($s as $item)
                                    @if (isJson($item))
                                        <li class="list-inline-item g-mr-2">
                                            <a class="u-icon-v1 u-icon-slide-up--hover g-color-gray-dark-v4 g-color-white--hover {{ isset(json_decode($item)->background_hover) ? json_decode($item)->background_hover : '' }} rounded"
                                                href="{{ isset(json_decode($item)->link) ? json_decode($item)->link : '#' }}">
                                                <i
                                                    class="g-font-size-18 g-line-height-1 u-icon__elem-regular {{ isset(json_decode($item)->class) ? json_decode($item)->class : '' }}"></i>
                                                <i
                                                    class="g-color-white g-font-size-18 g-line-height-0_8 u-icon__elem-hover {{ isset(json_decode($item)->class) ? json_decode($item)->class : '' }}"></i>
                                            </a>
                                        </li>
                                    @endif
                                @endforeach
                            @endforeach
                        @endif
                    </ul>
                    <!-- End Social Icons -->
                </div>
            </div>
            <!-- End Secondary Content -->
        </div>
    </div>
    <!-- End Content -->

    <!-- Copyright -->
    <div class="container g-pt-30 g-pb-10">
        <div class="row justify-content-between align-items-center">
            <div class="col-md-6 g-mb-20">
                <p class="g-font-size-13 mb-0">{{ date('Y') }} &copy; {{ __(config('app.name')) }}.
                    {{ __('All Rights
                    Reserved') }}.
                </p>
            </div>

            <div class="col-md-6 text-md-right g-mb-20">
                <ul class="list-inline g-color-gray-dark-v5 g-font-size-25 mb-0">
                    @if (Cache::has('payment_support'))
                        {!! Cache::get('payment_support')->value_setting !!}
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <!-- End Copyright -->
</footer>
<!-- End Footer -->
