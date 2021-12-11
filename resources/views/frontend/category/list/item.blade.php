<?php
$min_stock = minStock(); ?>
<!-- Products -->
<div id="pjax-cate-container">
    <div class="g-brd-bottom g-brd-gray-light-v4">
        @if ($products)
            @foreach ($products as $item)
                <?php $p_route = $item->stock < $min_stock ? 'javascript:void(0)' :
                    route('product-detail', ['brand_alias'=> $item->b_alias, 'id' => $item->id, 'product_alias' =>
                    toAlias($item->name)]); ?>
                    <div class="row g-pt-30">
                        <div class="col-6 col-sm-5 col-lg-4 g-mb-30">
                            <figure class="g-pos-rel">
                                <a href="{{ $p_route }}">
                                    <img class="img-thumbnail"
                                        src="{{ $item->image ? getImage($item->image) : asset('frontend/img-temp/480x700/img1.jpg') }}"
                                        alt="{{ $item->name_seo }}">
                                </a>

                                @if ($item->stock < $min_stock)
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
                                                href="{{ $p_route }}">{{ __('New Arrival') }}</a>
                                        </figcaption>
                                    @endif
                                @endif
                            </figure>
                        </div>

                        <div class="col-6 col-sm-7 col-lg-8 g-mb-15">
                            <!-- Product Info -->
                            <div class="g-mb-30">
                                <h4 class="h5 g-color-black mb-0 mt-1">
                                    <a class="u-link-v5 g-color-black g-color-primary--hover"
                                        href="{{ $p_route }}">
                                        {{ getTeaser($item->price_name_seo, 5) }}
                                    </a>
                                </h4>
                                <a class="u-link-v5 d-inline-block g-color-gray-dark-v5 g-font-size-13 mb-2 g-color-primary--hover"
                                    href="{{ route('cate', ['alias' => $item->cate_alias]) }}">
                                    {{ $item->cate_name_seo }}
                                </a>
                                <span
                                    class="d-block g-color-black g-font-size-20 mb-4">{{ getPrice($item->price) }}</span>
                                <p>{!! getTeaser($item->benefit ? $item->benefit : $item->ingredient, 10) !!}</p>
                            </div>
                            <!-- End Product Info -->

                            <!-- Products Icons -->
                            <ul class="list-inline g-mb-30">
                                <li
                                    class="list-inline-item align-middle g-brd-right g-brd-gray-light-v4 g-pr-20 g-mr-20">
                                    <a class="d-inline-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover rounded-circle"
                                        href="#">
                                        <i class="align-middle mr-1 icon-medical-022 u-line-icon-pro"></i>
                                        {{ __('Add to Wishlist') }}
                                    </a>
                                </li>
                                <li class="list-inline-item align-middle">
                                    <a class="d-inline-block g-color-gray-dark-v4 g-color-primary--hover g-text-underline--none--hover rounded-circle"
                                        href="#">
                                        <i class="align-middle mr-1 icon-finance-149 u-line-icon-pro"></i>
                                        {{ __('Add to Compare') }}
                                    </a>
                                </li>
                            </ul>
                            <!-- End Products Icons -->

                            <a class="btn u-btn-primary g-font-size-12 text-uppercase g-py-10 g-px-20"
                                href="{{ route('cart.add', ['id' => $item->price_id]) }}">
                                {{ __('Add to Cart') }}
                                <i class="ml-2 icon-finance-100 u-line-icon-pro"></i>
                            </a>
                        </div>
                    </div>
            @endforeach
        @else
            <div>{{ 'Data not found' }}</div>
        @endif
    </div>
    <!-- End Products -->
    <hr class="g-mb-60">

    <!-- Pagination -->
    <nav class="g-mb-100" aria-label="Page Navigation">
        {{ $products->links('vendor.pagination.custom-pagination') }}
    </nav>
</div>
