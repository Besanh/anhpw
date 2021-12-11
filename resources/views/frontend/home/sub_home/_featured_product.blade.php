<?php
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

$minStock = minStock();
$products = Cache::get('home_products');
?>
<div class="container g-pb-5 mt-5">
    <div class="text-center mx-auto g-max-width-600 g-mb-50">
        @if ($slogan_feature_product && isJson($slogan_feature_product->value_setting))
            @foreach (json_decode($slogan_feature_product->value_setting, true) as $s)
                <h2 class="g-color-black mb-4">{!! Arr::get($s, 'title') !!}</h2>
                <p class="lead">{!! Arr::get($s, 'content') !!}</p>
            @endforeach
        @endif
    </div>

    <div id="carouselCus1" class="js-carousel g-pb-100 g-mx-minus-10" data-infinite="true" data-slides-show="4"
        data-lazy-load="ondemand"
        data-arrows-classes="u-arrow-v1 g-pos-abs g-bottom-0 g-width-45 g-height-45 g-color-gray-dark-v5 g-bg-secondary g-color-white--hover g-bg-primary--hover rounded"
        data-arrow-left-classes="fa fa-angle-left g-left-10" data-arrow-right-classes="fa fa-angle-right g-right-10"
        data-pagi-classes="u-carousel-indicators-v1 g-absolute-centered--x g-bottom-20 text-center">
        @if ($products)
            @foreach ($products as $p)
                <div class="js-slide">
                    <div class="g-px-10">
                        <!-- Product -->
                        <figure class="g-pos-rel g-mb-20">
                            <a
                                href="{{ $p->stock < $minStock ? 'javascript:void(0)' : route('product-detail', ['brand_alias' => $p->b_alias, 'id' => $p->id, 'product_alias' => toAlias($p->name_seo)]) }}">
                                <img class="img-thumbnail"
                                    data-lazy="{{ $p->image ? getImage($p->image) : getNoImage() }}"
                                    alt="{{ $p->price_name_seo }}">

                                @if ($p->stock < $minStock)
                                    <figcaption
                                        class="w-100 g-bg-lightred text-center g-pos-abs g-bottom-0 g-transition-0_2 g-py-5">
                                        <span
                                            class="g-color-white g-font-size-11 text-uppercase g-letter-spacing-1">{{ __('Sold Out') }}</span>
                                    </figcaption>
                                @else
                                    @if (validateArrival($p->created_at))
                                        <figcaption
                                            class="w-100 g-bg-primary g-bg-black--hover text-center g-pos-abs g-bottom-0 g-transition-0_2 g-py-5">
                                            <a class="g-color-white g-font-size-11 text-uppercase g-letter-spacing-1 g-text-underline--none--hover"
                                                href="{{ route('product-detail', ['brand_alias' => $p->b_alias, 'id' => $p->id, 'product_alias' => toAlias($p->name_seo)]) }}">
                                                {{ __('New Arrival') }}
                                            </a>
                                        </figcaption>
                                    @endif
                                @endif
                            </a>
                            {{-- <span
                                class="u-ribbon-v1 g-width-40 g-height-40 g-color-white g-bg-primary g-font-size-13 text-center text-uppercase g-rounded-50x g-top-10 g-right-minus-10 g-px-2 g-py-10">-40%</span> --}}
                        </figure>

                        <div class="media">
                            <!-- Product Info -->
                            <div class="d-flex flex-column">
                                <h4 class="h6 g-color-black mb-1">
                                    <a class="u-link-v5 g-color-black g-color-primary--hover"
                                        href="{{ route('product-detail', ['brand_alias' => $p->b_alias, 'id' => $p->id, 'product_alias' => toAlias($p->name_seo)]) }}">
                                        {{ getTeaser($p->price_name_seo, 5) }}
                                    </a>
                                </h4>
                                <a class="u-link-v5 d-inline-block g-color-gray-dark-v5 g-font-size-13"
                                    href="{{ route('cate', ['alias' => $p->cate_alias]) }}">{{ getTeaser($p->cate_name_seo, 5) }}</a>
                                <span class="d-block g-color-black g-font-size-17">
                                    {!! getPrice($p->price) !!}
                                </span>
                            </div>
                            <!-- End Product Info -->

                            <!-- Products Icons -->
                            <ul class="list-inline media-body text-right">
                                <li class="list-inline-item align-middle mx-0">
                                    <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle"
                                        href="{{ route('cart.add', ['id' => $p->price_id]) }}" data-toggle="tooltip"
                                        data-placement="top" title="Add to Cart">
                                        <i class="icon-finance-100 u-line-icon-pro"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item align-middle mx-0">
                                    <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle"
                                        href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist">
                                        <i class="icon-medical-022 u-line-icon-pro"></i>
                                    </a>
                                </li>
                            </ul>
                            <!-- End Products Icons -->
                        </div>
                        <!-- End Product -->
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</div>
