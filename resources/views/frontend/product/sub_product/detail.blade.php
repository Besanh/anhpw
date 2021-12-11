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
                aria-controls="accordion-01-body-01">{{ __('Details') }}
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
        <button class="btn btn-block u-btn-primary g-font-size-12 text-uppercase g-py-15 g-px-25" type="button"
            onclick="window.location='{{ route('cart.add', ['id' => $product->price_id]) }}'">
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
            href="#nav-1-1-default-hor-left--3" role="tab">{{ __('Returns') }}</a>
    </li>
    <li class="nav-item g-brd-bottom g-brd-gray-dark-v4">
        <a class="nav-link g-color-primary--parent-active g-pa-0 g-pb-1" data-toggle="tab"
            href="#nav-1-1-default-hor-left--2" role="tab">{{ __('Delivery') }}</a>
    </li>
</ul>
<!-- End Nav Tabs -->

<!-- Tab Panes -->
<div id="nav-1-1-default-hor-left" class="tab-content">
    <div class="tab-pane fade show active g-pt-30" id="nav-1-1-default-hor-left--3" role="tabpanel">
        <p class="g-color-gray-dark-v4 g-font-size-13 mb-0">
            {{ __('You can return/exchange your orders in Unify E-commerce. For more information, read our') }}
            <a href="{{ route('help') }}">{{ __('Help') }}</a>.
        </p>
    </div>

    <div class="tab-pane fade g-pt-30" id="nav-1-1-default-hor-left--2" role="tabpanel">
        <!-- Shipping Mehtod -->
        <table>
            <thead class="h6 g-brd-bottom g-brd-gray-light-v3 g-color-gray-dark-v3 g-font-size-13">
                <tr>
                    <th class="g-width-100 g-font-weight-500 g-pa-0 g-pb-10">{{ __('Destination') }}</th>
                    <th class="g-width-140 g-font-weight-500 g-pa-0 g-pb-10">{{ __('Delivery Type') }}</th>
                    <th class="g-width-150 g-font-weight-500 g-pa-0 g-pb-10">{{ __('Delivery Time') }}</th>
                    <th class="g-font-weight-500 text-right g-pa-0 g-pb-10">{{ __('Cost') }}</th>
                </tr>
            </thead>
            <tbody>
                @if ($shippingFees)
                    <?php $count = 0; ?>
                    @foreach (arrayMap($shippingFees, 'delivery_type', null, 'destination') as $destination => $s)
                        @if (count($s) == 1)
                            <tr class="g-color-gray-dark-v4 g-font-size-13">
                                <td class="align-top g-py-10">{{ $destination }}</td>
                                @foreach ($s as $k => $v)
                                    <td class="align-top g-py-10">{{ $v->delivery_type }}</td>
                                    <td class="align-top g-py-10">{{ $v->delivery_time }}</td>
                                    <td class="align-top text-right g-py-10">{{ $v->cost }}</td>
                                @endforeach
                            </tr>
                        @else
                            @foreach ($s as $k => $v)
                                <tr class="g-color-gray-dark-v4 g-font-size-13">
                                    <td class="align-top g-py-10">{{ $destination }}</td>
                                    <td class="align-top g-py-10">{{ $v->delivery_type }}</td>
                                    <td class="align-top g-py-10">{{ $v->delivery_time }}</td>
                                    <td class="align-top text-right g-py-10">{{ $v->cost }}</td>
                                </tr>
                            @endforeach
                        @endif
                    @endforeach
                @endif
            </tbody>
        </table>
        <!-- End Shipping Mehtod -->
    </div>
</div>
<!-- End Tab Panes -->
