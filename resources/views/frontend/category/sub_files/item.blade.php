<div id="pjax-cate-container">
    <!-- Products -->
    <div class="row g-pt-30 g-mb-50">
        @if ($products)
            @foreach ($products as $k => $item)
                <div class="col-6 col-lg-4 g-mb-30">
                    <!-- Product -->
                    <figure class="g-pos-rel g-mb-20">
                        <img class="im img-responsive img-product-cate img-fluid"
                            src="{{ $item->image ? getImage($item->image) : asset('frontend/img-temp/480x700/img1.jpg') }}"
                            alt="{{ $item->name }}">

                        @if ($item->stock < minStock())
                            <figcaption
                                class="w-100 g-bg-lightred text-center g-pos-abs g-bottom-0 g-transition-0_2 g-py-5">
                                <span class="g-color-white g-font-size-11 text-uppercase g-letter-spacing-1">Sold
                                    Out</span>
                            </figcaption>
                        @else
                            @if (validateArrival($item->created_at))
                                <figcaption
                                    class="w-100 g-bg-primary g-bg-black--hover text-center g-pos-abs g-bottom-0 g-transition-0_2 g-py-5">
                                    <a class="g-color-white g-font-size-11 text-uppercase g-letter-spacing-1 g-text-underline--none--hover"
                                        href="#">New Arrival</a>
                                </figcaption>
                            @endif
                        @endif
                    </figure>

                    <div class="media">
                        <!-- Product Info -->
                        <div class="d-flex flex-column">
                            <h4 class="h6 g-color-black mb-1">
                                <a class="u-link-v5 g-color-black g-color-primary--hover" href="">
                                    {{ getTeaser($item->name, 3) }}
                                </a>
                            </h4>
                            <a class="d-inline-block g-color-gray-dark-v5 g-font-size-13"
                                href="#">{{ $item->cate_name }}</a>
                            <span class="d-block g-color-black g-font-size-17">{!! getPrice($item->price) !!}</span>
                        </div>
                        <!-- End Product Info -->

                        <!-- Products Icons -->
                        <ul class="list-inline media-body text-right">
                            <li class="list-inline-item align-middle mx-0">
                                <a class="u-icon-v1 u-icon-size--sm g-color-gray-dark-v5 g-color-primary--hover g-font-size-15 rounded-circle"
                                    href="#" data-toggle="tooltip" data-placement="top" title="Add to Cart">
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
            {!! 'No product found' !!}
        @endif

    </div>
    <!-- End Products -->

    <hr class="g-mb-60">

    <!-- Pagination -->
    <nav class="g-mb-100" aria-label="Page Navigation">
        {{ $products->links('vendor.pagination.custom-pagination') }}
    </nav>
</div>
