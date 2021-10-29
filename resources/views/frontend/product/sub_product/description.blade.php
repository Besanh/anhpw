<div class="container">
    <div class="g-brd-y g-brd-gray-light-v4 g-pt-100 g-pb-70">
        <h2 class="h4 mb-3">{{ __('Description') }}</h2>
        <div class="row">
            <div class="col-md-4 g-mb-30">
                <p>{!! $product->description !!}</p>
            </div>

            <div class="col-md-4 g-mb-0 g-mb-30--md">
                <!-- List -->
                <ul class="list-unstyled g-color-text">
                    <li class="g-brd-bottom--dashed g-brd-gray-light-v3 pt-1 mb-3">
                        <span>{{ __('Brand Name') }}:</span>
                        <span class="float-right g-color-black">{{ $product->brand_name }}</span>
                    </li>
                    <li class="g-brd-bottom--dashed g-brd-gray-light-v3 pt-1 mb-3">
                        <span>{{ __('Category') }}:</span>
                        <span class="float-right g-color-black">{{ $product->cate_name_seo }}</span>
                    </li>
                    <li class="g-brd-bottom--dashed g-brd-gray-light-v3 pt-1 mb-3">
                        <span>{{ __('Designer') }}:</span>
                        <span class="float-right g-color-black">{{ $product->designer }}</span>
                    </li>
                    <li class="g-brd-bottom--dashed g-brd-gray-light-v3 pt-1 mb-3">
                        <span>{{ __('Public Yea') }}r:</span>
                        <span class="float-right g-color-black">{{ $product->public_year }}</span>
                    </li>
                    {{-- <li class="g-brd-bottom--dashed g-brd-gray-light-v3 pt-1 mb-3">
                        <span>Style:</span>
                        <span class="float-right g-color-black">Casual</span>
                    </li> --}}
                </ul>
                <!-- End List -->
            </div>

            <div class="col-md-4 g-mb-30">
                <!-- List -->
                <ul class="list-unstyled g-color-text">
                    <li class="g-brd-bottom--dashed g-brd-gray-light-v3 pt-1 mb-3">
                        <span>{{ __('Incense Group') }}:</span>
                        <span class="float-right g-color-black">{!! $product->incense_group !!}</span>
                    </li>
                    <li class="g-brd-bottom--dashed g-brd-gray-light-v3 pt-1 mb-3">
                        <span>{{ __('Styles') }}:</span>
                        <span class="float-right g-color-black">{!! $product->styles !!}</span>
                    </li>
                    {{-- <li class="g-brd-bottom--dashed g-brd-gray-light-v3 pt-1 mb-3">
                        <span>Thickness:</span>
                        <span class="float-right g-color-black">Thin</span>
                    </li>
                    <li class="g-brd-bottom--dashed g-brd-gray-light-v3 pt-1 mb-3">
                        <span>Model Number:</span>
                        <span class="float-right g-color-black">TM-11013</span>
                    </li>
                    <li class="g-brd-bottom--dashed g-brd-gray-light-v3 pt-1 mb-3">
                        <span>Material:</span>
                        <span class="float-right g-color-black">80% COTTON</span>
                    </li> --}}
                </ul>
                <!-- End List -->
            </div>
        </div>
    </div>
</div>
