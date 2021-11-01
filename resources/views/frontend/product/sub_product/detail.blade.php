<!-- Product Info -->
<div class="g-mb-30">
    <h1 class="g-font-weight-500 mb-4 g-color-primary">{{ $product ? $product->p_name_seo : null }}</h1>
    <p>{!! $product ? $product->ingredient : null !!}</p>
</div>
<!-- End Product Info -->

<!-- Price -->
<div class="g-mb-30">
    <h2 class="g-color-gray-dark-v5 g-font-weight-400 g-font-size-12 text-uppercase mb-2">
        {{ $product ? $product->barcode : null }}
    </h2>
    <span
        class="g-color-black g-font-weight-300 g-font-size-30 mr-2">{{ $product ? getPrice($product->price) : null }}</span>
    {{-- <s class="g-color-gray-dark-v4 g-font-weight-500 g-font-size-16">$101.00</s> --}}
</div>
<!-- End Price -->

<!-- Accordion -->
<div id="accordion-01" role="tablist" aria-multiselectable="true">
    <div id="accordion-01-heading-01" class="g-brd-y g-brd-gray-light-v3 py-3" role="tab">
        <h5 class="g-font-weight-400 g-font-size-default mb-0">
            <a class="d-block g-color-gray-dark-v5 g-text-underline--none--hover" href="#accordion-01-body-01"
                data-toggle="collapse" data-parent="#accordion-01" aria-expanded="false"
                aria-controls="accordion-01-body-01">Details
                <span class="float-right g-pos-rel g-top-3 mr-1 fa fa-angle-down"></span></a>
        </h5>
    </div>
    <div id="accordion-01-body-01" class="collapse" role="tabpanel" aria-labelledby="accordion-01-heading-01">
        <div class="g-py-10">
            <p class="g-font-size-12 mb-2">{!! $product ? $product->benefit : null !!}</p>
        </div>
    </div>
</div>
<!-- End Accordion -->

<!-- Colour -->
{{-- <div class="d-flex justify-content-between align-items-center g-brd-bottom g-brd-gray-light-v3 py-3" role="tab">
    <h5 class="g-color-gray-dark-v5 g-font-weight-400 g-font-size-default mb-0">Colour</h5>

    <!-- Checkbox -->
    <label class="form-check-inline u-check mb-0 ml-auto g-mr-10">
        <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radInline1_1" type="radio">
        <span class="d-block u-check-icon-checkbox-v4 g-brd-transparent g-brd-gray-dark-v4--checked rounded-circle">
            <i class="d-block g-absolute-centered g-width-12 g-height-12 g-bg-primary rounded-circle"></i>
        </span>
    </label>
    <label class="form-check-inline u-check mb-0 g-mx-10">
        <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radInline1_1" type="radio">
        <span class="d-block u-check-icon-checkbox-v4 g-brd-transparent g-brd-gray-dark-v4--checked rounded-circle">
            <i class="d-block g-absolute-centered g-width-12 g-height-12 g-bg-beige rounded-circle"></i>
        </span>
    </label>
    <label class="form-check-inline u-check mb-0 g-mx-10">
        <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radInline1_1" type="radio">
        <span class="d-block u-check-icon-checkbox-v4 g-brd-transparent g-brd-gray-dark-v4--checked rounded-circle">
            <i class="d-block g-absolute-centered g-width-12 g-height-12 g-bg-black rounded-circle"></i>
        </span>
    </label>
    <label class="form-check-inline u-check mb-0 g-ml-10 mr-0">
        <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="radInline1_1" type="radio">
        <span class="d-block u-check-icon-checkbox-v4 g-brd-transparent g-brd-gray-dark-v4--checked rounded-circle">
            <i class="d-block g-absolute-centered g-width-12 g-height-12 g-bg-gray-dark-v4 rounded-circle"></i>
        </span>
    </label>
    <!-- End Checkbox -->
</div> --}}
<!-- End Colour -->

<!-- Size -->
<div class="d-flex justify-content-between align-items-center g-brd-bottom g-brd-gray-light-v3 py-3" role="tab">
    <h5 class="g-color-gray-dark-v5 g-font-weight-400 g-font-size-default mb-0">{{ __('Capacity') }}</h5>

    <!-- Checkbox -->
    <label class="form-check-inline u-check mb-0 ml-auto g-mr-15">
        <input class="g-hidden-xs-up g-pos-abs g-top-0 g-left-0" name="capacity" type="radio">
        <span class="d-block g-font-size-12 g-color-primary--checked">
            {{ $product ? $product->capa : null }}
        </span>
    </label>
    <!-- End Checkbox -->
</div>
<!-- End Size -->

<!-- Quantity -->
<div class="d-flex justify-content-between align-items-center g-brd-bottom g-brd-gray-light-v3 py-3 g-mb-30" role="tab">
    <h5 class="g-color-gray-dark-v5 g-font-weight-400 g-font-size-default mb-0">{{ __('Quantity') }}</h5>

    <div class="js-quantity input-group u-quantity-v1 g-width-80 g-brd-primary--focus">
        <input class="js-result form-control text-center g-font-size-13 rounded-0" name="quantity" type="text" value="1"
            readonly>

        <div
            class="input-group-addon d-flex align-items-center g-width-30 g-brd-gray-light-v2 g-bg-white g-font-size-13 rounded-0 g-pa-5">
            <i class="js-plus g-color-gray g-color-primary--hover fa fa-angle-up"></i>
            <i class="js-minus g-color-gray g-color-primary--hover fa fa-angle-down"></i>
        </div>
    </div>
</div>
<!-- End Quantity -->

<!-- Buttons -->
<div class="row g-mx-minus-5 g-mb-20">
    <div class="col g-px-5 g-mb-10">
        <button class="btn btn-block u-btn-primary g-font-size-12 text-uppercase g-py-15 g-px-25" type="button">
            {{ __('Add to Cart') }} <i class="align-middle ml-2 icon-finance-100 u-line-icon-pro"></i>
        </button>
    </div>
    <div class="col g-px-5 g-mb-10">
        <button
            class="btn btn-block u-btn-outline-black g-brd-gray-dark-v5 g-brd-black--hover g-color-gray-dark-v4 g-color-white--hover g-font-size-12 text-uppercase g-py-15 g-px-25"
            type="button">
            {{ __('Add to Wishlist') }} <i class="align-middle ml-2 icon-medical-022 u-line-icon-pro"></i>
        </button>
    </div>
</div>
<!-- End Buttons -->

<!-- Nav Tabs -->
<ul class="nav d-flex justify-content-between g-font-size-12 text-uppercase" role="tablist"
    data-target="nav-1-1-default-hor-left">
    <li class="nav-item g-brd-bottom g-brd-gray-dark-v4">
        <a class="nav-link active g-color-primary--parent-active g-pa-0 g-pb-1" data-toggle="tab"
            href="#nav-1-1-default-hor-left--3" role="tab">Returns</a>
    </li>
    {{-- <li class="nav-item g-brd-bottom g-brd-gray-dark-v4">
        <a class="nav-link g-color-primary--parent-active g-pa-0 g-pb-1" data-toggle="tab"
            href="#nav-1-1-default-hor-left--1" role="tab">View Size Guide</a>
    </li> --}}
    <li class="nav-item g-brd-bottom g-brd-gray-dark-v4">
        <a class="nav-link g-color-primary--parent-active g-pa-0 g-pb-1" data-toggle="tab"
            href="#nav-1-1-default-hor-left--2" role="tab">Delivery</a>
    </li>
</ul>
<!-- End Nav Tabs -->

<!-- Tab Panes -->
<div id="nav-1-1-default-hor-left" class="tab-content">
    <div class="tab-pane fade show active g-pt-30" id="nav-1-1-default-hor-left--3" role="tabpanel">
        <p class="g-color-gray-dark-v4 g-font-size-13 mb-0">You can return/exchange your orders in Unify E-commerce. For
            more information, read our
            <a href="page-help-1.html">Help</a>.
        </p>
    </div>

    {{-- <div class="tab-pane fade g-pt-30" id="nav-1-1-default-hor-left--1" role="tabpanel">
        <h4 class="g-font-size-15 mb-3">General Clothing Size Guide</h4>

        <!-- Size -->
        <table>
            <tbody>
                <tr class="g-color-gray-dark-v4 g-font-size-12">
                    <td class="align-top g-width-150 g-py-5">Unify Size (UK)</td>
                    <td class="align-top g-width-50 g-py-5">S</td>
                    <td class="align-top g-width-50 g-py-5">M</td>
                    <td class="align-top g-width-50 g-py-5">L</td>
                    <td class="align-top g-width-50 g-py-5">XL</td>
                    <td class="align-top g-width-50 g-py-5">XXL</td>
                </tr>
                <tr class="g-color-gray-dark-v4 g-font-size-12">
                    <td class="align-top g-width-150 g-py-5">UK</td>
                    <td class="align-top g-width-50 g-py-5">6</td>
                    <td class="align-top g-width-50 g-py-5">8</td>
                    <td class="align-top g-width-50 g-py-5">10</td>
                    <td class="align-top g-width-50 g-py-5">12</td>
                    <td class="align-top g-width-50 g-py-5">14</td>
                </tr>
                <tr class="g-color-gray-dark-v4 g-font-size-12">
                    <td class="align-top g-width-150 g-py-5">Europe</td>
                    <td class="align-top g-width-50 g-py-5">32</td>
                    <td class="align-top g-width-50 g-py-5">34</td>
                    <td class="align-top g-width-50 g-py-5">36</td>
                    <td class="align-top g-width-50 g-py-5">38</td>
                    <td class="align-top g-width-50 g-py-5">40</td>
                </tr>
                <tr class="g-color-gray-dark-v4 g-font-size-12">
                    <td class="align-top g-width-150 g-py-5">US</td>
                    <td class="align-top g-width-50 g-py-5">2</td>
                    <td class="align-top g-width-50 g-py-5">4</td>
                    <td class="align-top g-width-50 g-py-5">6</td>
                    <td class="align-top g-width-50 g-py-5">8</td>
                    <td class="align-top g-width-50 g-py-5">10</td>
                </tr>
                <tr class="g-color-gray-dark-v4 g-font-size-12">
                    <td class="align-top g-width-150 g-py-5">Australia</td>
                    <td class="align-top g-width-50 g-py-5">6</td>
                    <td class="align-top g-width-50 g-py-5">8</td>
                    <td class="align-top g-width-50 g-py-5">10</td>
                    <td class="align-top g-width-50 g-py-5">12</td>
                    <td class="align-top g-width-50 g-py-5">14</td>
                </tr>
                <tr class="g-color-gray-dark-v4 g-font-size-12">
                    <td class="align-top g-width-150 g-py-5">Japan</td>
                    <td class="align-top g-width-50 g-py-5">7</td>
                    <td class="align-top g-width-50 g-py-5">9</td>
                    <td class="align-top g-width-50 g-py-5">11</td>
                    <td class="align-top g-width-50 g-py-5">13</td>
                    <td class="align-top g-width-50 g-py-5">15</td>
                </tr>
            </tbody>
        </table>
        <!-- End Size -->
    </div> --}}

    <div class="tab-pane fade g-pt-30" id="nav-1-1-default-hor-left--2" role="tabpanel">
        <!-- Shipping Mehtod -->
        <table>
            <thead class="h6 g-brd-bottom g-brd-gray-light-v3 g-color-gray-dark-v3 g-font-size-13">
                <tr>
                    <th class="g-width-100 g-font-weight-500 g-pa-0 g-pb-10">Destination</th>
                    <th class="g-width-140 g-font-weight-500 g-pa-0 g-pb-10">Delivery type</th>
                    <th class="g-width-150 g-font-weight-500 g-pa-0 g-pb-10">Delivery time</th>
                    <th class="g-font-weight-500 text-right g-pa-0 g-pb-10">Cost</th>
                </tr>
            </thead>
            <tbody>
                <tr class="g-color-gray-dark-v4 g-font-size-12">
                    <td class="align-top g-py-10">UK</td>
                    <td class="align-top g-py-10">Standard delivery</td>
                    <td class="align-top g-font-size-11 g-py-10">2-3 Working days</td>
                    <td class="align-top text-right g-py-10">$5.5</td>
                </tr>
                <tr class="g-color-gray-dark-v4 g-font-size-12">
                    <td class="align-top g-py-10"></td>
                    <td class="align-top g-py-10">Next day</td>
                    <td class="align-top g-font-size-11 g-py-10">Order before 12pm monday - thursday and receive it the
                        next day</td>
                    <td class="align-top text-right g-py-10">$9.5</td>
                </tr>
                <tr class="g-color-gray-dark-v4 g-font-size-12">
                    <td class="align-top g-py-10"></td>
                    <td class="align-top g-py-10">Saturday delivery</td>
                    <td class="align-top g-font-size-11 g-py-10">Saturday delivery for orders placed before 12pm on
                        friday</td>
                    <td class="align-top text-right g-py-10">$12.00</td>
                </tr>
                <tr class="g-color-gray-dark-v4 g-font-size-12">
                    <td class="align-top g-py-10">Europe</td>
                    <td class="align-top g-py-10">Standard delivery</td>
                    <td class="align-top g-font-size-11 g-py-10">3-9 Working days</td>
                    <td class="align-top text-right g-py-10">$20.00</td>
                </tr>
                <tr class="g-color-gray-dark-v4 g-font-size-12">
                    <td class="align-top g-py-10">America</td>
                    <td class="align-top g-py-10">Standard delivery</td>
                    <td class="align-top g-font-size-11 g-py-10">3-9 Working days</td>
                    <td class="align-top text-right g-py-10">$25.00</td>
                </tr>
            </tbody>
        </table>
        <!-- End Shipping Mehtod -->
    </div>
</div>
<!-- End Tab Panes -->
