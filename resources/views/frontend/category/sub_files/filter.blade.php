<div class="col-md-3 order-md-1 g-brd-right--lg g-brd-gray-light-v4 g-pt-40 g-pb-40">
    <div class="g-pr-15--lg g-pt-60">
        <!-- Categories -->
        @if ($other_cate && $other_cate->count() > 0)
            <div class="g-mb-30">
                <h3 class="h5 mb-3">Categories</h3>
                <ul class="list-unstyled">
                    @foreach (arrayIndex($other_cate, 'id') as $item)
                        <li class="my-3">
                            <a class="d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover"
                                href="{!! route('cate', $item->alias) !!}">
                                {!! $item->name !!}
                                <span class="float-right g-font-size-12">{!! $item->get_products_count !!}</span></a>
                        </li>
                    @endforeach

                </ul>
            </div>
        @endif
        <!-- End Categories -->

        <hr>
        <!-- Brand -->
        @if ($brands && $brands->count() > 0)
            <div class="g-mb-30">
                <h3 class="h5 mb-3">Brand</h3>

                <ul class="list-unstyled list-brand">
                    @foreach (arrayIndex($brands, 'id') as $b)
                        <li class="my-2">
                            <label
                                class="form-check-inline u-check d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover g-pl-30">
                                <input class="filter-bid g-hidden-xs-up g-pos-abs g-top-0 g-left-0"
                                    value="{{ $b->id }}" name="bid" type="checkbox"
                                    {{ in_array($b->id, explode(',', request()->input('filter.bid'))) ? 'checked' : '' }}
                                    data-name="bid">
                                <span class="d-block u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                                    <i class="fa" data-check-icon="&#xf00c"></i>
                                </span>
                                {!! getTeaser($b->name, 3) !!}
                                <span class="float-right g-font-size-13">{!! $b->get_products_count !!}</span>
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- End Brand -->

        <hr>

        <!-- Pricing -->
        <div class="g-mb-30">
            <h3 class="h5 mb-3">Pricing</h3>

            <div class="text-center">
                <span class="d-block g-color-primary mb-4">(<span id="rangeSliderAmount3">0</span>)đ</span>
                <div id="rangeSlider1" class="u-slider-v1-3" data-result-container="rangeSliderAmount3"
                    data-range="true" data-default="1000000, 50000000" data-min="100000" data-max="100000000"></div>
            </div>
        </div>
        <!-- End Pricing -->

        <hr>

        <!-- Size -->
        @if ($capas && $capas->count() > 0)
            <div class="g-mb-30">
                <h3 class="h5 mb-3">Capacity</h3>

                <ul class="list-unstyled list-capa">

                    @foreach ($capas as $c)
                        <li class="my-2">
                            <label
                                class="form-check-inline u-check d-block u-link-v5 g-color-gray-dark-v4 g-color-primary--hover g-pl-30">
                                <input class="filter-capa g-hidden-xs-up g-pos-abs g-top-0 g-left-0"
                                    value="{{ $c->capa }}" name="capa" type="checkbox"
                                    {{ in_array($c->capa, explode(',', request()->input('filter.capa'))) ? 'checked' : '' }}
                                    data-name="capa">
                                <span class="d-block u-check-icon-checkbox-v4 g-absolute-centered--y g-left-0">
                                    <i class="fa" data-check-icon="&#xf00c"></i>
                                </span>
                                {!! $c->capa !!}
                                <span class="float-right g-font-size-13">{!! $c->sum_capa !!}</span>
                            </label>
                        </li>
                    @endforeach
                </ul>
            </div>
        @endif
        <!-- End Size -->

        <hr>

        <!-- Rating -->
        <div class="g-mb-30">
            <h3 class="h5 mb-3">Rating</h3>

            <ul class="js-rating u-rating-v1 g-font-size-20 g-color-gray-light-v3 mb-0"
                data-hover-classes="g-color-primary">
                <li class="g-color-primary click">
                    <i class="fa fa-star"></i>
                </li>
                <li class="g-color-primary click">
                    <i class="fa fa-star"></i>
                </li>
                <li class="g-color-primary click">
                    <i class="fa fa-star"></i>
                </li>
                <li class="g-color-primary click">
                    <i class="fa fa-star"></i>
                </li>
                <li>
                    <i class="fa fa-star"></i>
                </li>
            </ul>
        </div>
        <!-- End Rating -->

        <input class="cate" type="hidden" name="cate" value="{{ $alias }}" />
        <hr>

        <button id="filter" class="btn btn-block u-btn-black g-font-size-12 text-uppercase g-py-12 g-px-25"
            type="button" data-href="{{ route('cate', ['alias' => $alias]) }}">Find</button>
    </div>
</div>
