<section class="container g-py-100">
    <div class="text-center mx-auto g-max-width-600 g-mb-50">
        <h2 class="g-color-black mb-4">New Arrivals</h2>
        <p class="lead">We want to create a range of beautiful, practical and modern outerwear that doesn't cost
            the earth – but let's you still live life in style.</p>
    </div>

    <div class="row g-mx-minus-10 g-mb-50">
        @if ($arrival_products)
            @foreach ($arrival_products as $item)
                <div class="col-md-6 col-lg-4 g-px-10">
                    <!-- Article -->
                    <article class="media g-brd-around g-brd-gray-light-v4 g-bg-white rounded g-pa-10 g-mb-20">
                        <!-- Article Image -->
                        <div class="g-max-width-100 g-mr-15">
                            <img class="d-flex w-100" src="{{ $item->thumb ? getImage($item->thumb) : getNoImage() }}"
                                alt="Image Description">
                        </div>
                        <!-- End Article Image -->

                        <!-- Article Info -->
                        <div class="media-body align-self-center">
                            <h4 class="h5 g-mb-7">
                                <a class="g-color-black g-color-primary--hover g-text-underline--none--hover"
                                    href="#">{!! getTeaser($item->name, 3) !!}</a>
                            </h4>
                            <a class="d-inline-block g-color-gray-dark-v5 g-font-size-13 g-mb-10"
                                href="#">{!! getTeaser($item->cate_name, 5) !!}</a>
                            <!-- End Article Info -->

                            <!-- Article Footer -->
                            <footer class="d-flex justify-content-between g-font-size-16">
                                <span class="g-color-black g-line-height-1">{!! number_format($item->price) !!}&dstrok;</span>
                                <ul class="list-inline g-color-gray-light-v2 g-font-size-14 g-line-height-1">
                                    <li
                                        class="list-inline-item align-middle g-brd-right g-brd-gray-light-v3 g-pr-10 g-mr-6">
                                        <a class="g-color-gray-dark-v5 g-color-primary--hover g-text-underline--none--hover"
                                            href="#" title="Add to Cart" data-toggle="tooltip" data-placement="top">
                                            <i class="icon-finance-100 u-line-icon-pro"></i>
                                        </a>
                                    </li>
                                    <li class="list-inline-item align-middle">
                                        <a class="g-color-gray-dark-v5 g-color-primary--hover g-text-underline--none--hover"
                                            href="#" title="Add to Wishlist" data-toggle="tooltip" data-placement="top">
                                            <i class="icon-medical-022 u-line-icon-pro"></i>
                                        </a>
                                    </li>
                                </ul>
                            </footer>
                            <!-- End Article Footer -->
                        </div>
                    </article>
                    <!-- End Article -->
                </div>
            @endforeach
        @endif

    </div>

    <div class="text-center">
        <a class="btn u-btn-primary g-font-size-12 text-uppercase g-py-12 g-px-25" href="#">All New Arrivals</a>
    </div>
</section>
