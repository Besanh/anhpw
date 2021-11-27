<div class="container g-pt-100 g-pb-70">
    <div class="text-center mx-auto g-max-width-600 g-mb-50">
        <h2 class="g-color-black mb-4">{{ __('Related Products') }}</h2>
    </div>

    <!-- Products -->
    <div class="row">
        @if ($related_products)
            @foreach ($related_products as $item)
                <div class="col-6 col-lg-3 g-mb-30">
                    <!-- Product -->
                    <figure class="g-pos-rel g-mb-20">
                        <img class="img-fluid" src="{{ $item->image ? getImage($item->image) : getNoImage() }}"
                            alt="Image Description">

                        @if ($item->stock < minStock())
                            <figcaption
                                class="w-100 g-bg-lightred text-center g-pos-abs g-bottom-0 g-transition-0_2 g-py-5">
                                <span class="g-color-white g-font-size-11 text-uppercase g-letter-spacing-1">
                                    {{ __('Sold Out') }}
                                </span>
                            </figcaption>
                        @else
                            @if (validateArrival($item->created_at))
                                <figcaption
                                    class="w-100 g-bg-primary g-bg-black--hover text-center g-pos-abs g-bottom-0 g-transition-0_2 g-py-5">
                                    <a class="g-color-white g-font-size-11 text-uppercase g-letter-spacing-1 g-text-underline--none--hover"
                                        href="{{ route('product-detail', ['brand_alias' => $item->b_alias, 'id' => $item->id, 'product_alias' => toAlias($item->name)]) }}">
                                        {{ __('New Arrival') }}
                                    </a>
                                </figcaption>
                            @endif
                        @endif
                    </figure>

                    <div class="media">
                        <!-- Product Info -->
                        <div class="d-flex flex-column">
                            <h4 class="h6 g-color-black mb-1">
                                <a class="u-link-v5 g-color-black g-color-primary--hover"
                                    href="{{ route('product-detail', ['brand_alias' => $item->b_alias, 'id' => $item->id, 'product_alias' => toAlias($item->name)]) }}">
                                    {{ $item->name_seo }}
                                </a>
                            </h4>
                            <a class="u-link-v5 d-inline-block g-color-gray-dark-v5 g-font-size-13"
                                href="{{ route('cate', ['alias' => $item->cate_alias]) }}">{{ getTeaser($item->cate_name_seo, 3) }}</a>
                            <span class="d-block g-color-black g-font-size-17">{{ getPrice($item->price) }}</span>
                        </div>
                        <!-- End Product Info -->

                        <!-- Products Icons -->
                        <ul class="list-inline media-body text-right">
                            <li class="list-inline-item align-middle mx-0">
                                <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle"
                                    href="{{ route('cart.add', ['id' => $item->price_id]) }}" data-toggle="tooltip" data-placement="top" title="Add to Cart">
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
            @endforeach
        @else
            <div>{{ __('No Data Found') }}</div>
        @endif

    </div>
    <!-- End Products -->
</div>
