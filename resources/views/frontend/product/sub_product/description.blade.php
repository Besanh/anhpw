<div class="container">
    <div class="g-brd-y g-brd-gray-light-v4 g-pt-100 g-pb-70">
        <h2 class="h4 mb-3">{{ __('Description') }}</h2>
        <div class="row">
            <div class="col-md-4 g-mb-30">
                <p>{!! $product_detail->description !!}</p>
            </div>

            <div class="col-md-4 g-mb-0 g-mb-30--md">
                <!-- List -->
                <ul class="list-unstyled g-color-text">
                    <li class="g-brd-bottom--dashed g-brd-gray-light-v3 pt-1 mb-3">
                        <span>{{ __('Brand Name') }}:</span>
                        <span class="float-right g-color-black">
                            <a href="{{ route('brand', $product_detail->bid) }}">
                                {{ $product_detail->getBrands->name_seo }}
                            </a>
                        </span>
                    </li>
                    <li class="g-brd-bottom--dashed g-brd-gray-light-v3 pt-1 mb-3">
                        <span>{{ __('Public Year') }}:</span>
                        <span class="float-right g-color-black">{{ $product_detail->public_year }}</span>
                    </li>
                </ul>
                <!-- End List -->
            </div>

            <div class="col-md-4 g-mb-30">
                <!-- List -->
                <ul class="list-unstyled g-color-text">
                    <li class="g-brd-bottom--dashed g-brd-gray-light-v3 pt-1 mb-3">
                        <span>{{ __('Incense Group') }}:</span>
                        <span class="float-right g-color-black">{!! $product_detail->incense_group !!}</span>
                    </li>
                    <li class="g-brd-bottom--dashed g-brd-gray-light-v3 pt-1 mb-3">
                        <span>{{ __('Styles') }}:</span>
                        <span class="float-right g-color-black">{!! $product_detail->styles !!}</span>
                    </li>
                </ul>
                <!-- End List -->
            </div>
        </div>
    </div>
</div>
