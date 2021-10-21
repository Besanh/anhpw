<div class="container">
    <div class="g-brd-y g-brd-gray-light-v4 g-pt-100 g-pb-70">
        <h2 class="h4 mb-3">Description</h2>
        <div class="row">
            <div class="col-md-4 g-mb-30">
                <p>{!! $product ? $product->description : null !!}</p>
            </div>

            <div class="col-md-4 g-mb-0 g-mb-30--md">
                <!-- List -->
                <ul class="list-unstyled g-color-text">
                    <li class="g-brd-bottom--dashed g-brd-gray-light-v3 pt-1 mb-3">
                        <span>Brand Name:</span>
                    <span class="float-right g-color-black">{{$product ? $product->brand_name : null }}</span>
                    </li>
                    {{-- <li class="g-brd-bottom--dashed g-brd-gray-light-v3 pt-1 mb-3">
                        <span>Sleeve Length:</span>
                        <span class="float-right g-color-black">Full</span>
                    </li>
                    <li class="g-brd-bottom--dashed g-brd-gray-light-v3 pt-1 mb-3">
                        <span>Sleeve Style:</span>
                        <span class="float-right g-color-black">Regular</span>
                    </li>
                    <li class="g-brd-bottom--dashed g-brd-gray-light-v3 pt-1 mb-3">
                        <span>Pattern Type:</span>
                        <span class="float-right g-color-black">PAID</span>
                    </li>
                    <li class="g-brd-bottom--dashed g-brd-gray-light-v3 pt-1 mb-3">
                        <span>Style:</span>
                        <span class="float-right g-color-black">Casual</span>
                    </li> --}}
                </ul>
                <!-- End List -->
            </div>

            {{-- <div class="col-md-4 g-mb-30">
                <!-- List -->
                <ul class="list-unstyled g-color-text">
                    <li class="g-brd-bottom--dashed g-brd-gray-light-v3 pt-1 mb-3">
                        <span>Material:</span>
                        <span class="float-right g-color-black">Cotton, Nylon</span>
                    </li>
                    <li class="g-brd-bottom--dashed g-brd-gray-light-v3 pt-1 mb-3">
                        <span>Item Type:</span>
                        <span class="float-right g-color-black">Pullovers</span>
                    </li>
                    <li class="g-brd-bottom--dashed g-brd-gray-light-v3 pt-1 mb-3">
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
                    </li>
                </ul>
                <!-- End List -->
            </div> --}}
        </div>
    </div>
</div>
