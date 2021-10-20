@section('title', $product->p_name_seo)
    @extends('frontend.layouts.main')
@section('content')
    <!-- Product Description -->
    <div class="container g-pt-50 g-pb-100">
        <div class="row">
            <div class="col-lg-7">
                <!-- Carousel -->
                @includeIf('frontend.product.sub_product.carousel', ['image' => $product->image, 'galleries' =>
                $product->galleries])
                <!-- End Carousel -->
            </div>

            <div class="col-lg-5">
                <div class="g-px-40--lg g-pt-70">
                    @include('frontend.product.sub_product.detail')
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Description -->

    <!-- Description -->
    @include('frontend.product.sub_product.description')
    <!-- End Description -->

    <!-- Review -->
    @include('frontend.product.sub_product.review')
    <!-- End Review -->

    <!-- Products -->
    @include('frontend.product.sub_product.related_product')
    <!-- End Products -->
@endsection
@include('frontend.product.stack')
