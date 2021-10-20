<div id="carouselCus1" class="js-carousel g-pt-10 g-mb-10" data-infinite="true" data-fade="true"
    data-arrows-classes="u-arrow-v1 g-brd-around g-brd-white g-absolute-centered--y g-width-45 g-height-45 g-font-size-14 g-color-white g-color-primary--hover rounded-circle"
    data-arrow-left-classes="fa fa-angle-left g-left-40" data-arrow-right-classes="fa fa-angle-right g-right-40"
    data-nav-for="#carouselCus2">
    @if ($image)
        <div class="js-slide g-bg-cover g-bg-black-opacity-0_1--after">
            <img class="img-fluid w-100" src="{{ getImage($image) }}" alt="Image Description">
        </div>
    @endif
    @if ($galleries && is_array(json_decode($galleries)))
        @foreach (json_decode($galleries) as $item)
            <div class="js-slide g-bg-cover g-bg-black-opacity-0_1--after">
                <img class="img-fluid w-100" src="{{ getImage($item) }}" alt="Image Description">
            </div>
        @endforeach
    @endif
</div>

<div id="carouselCus2" class="js-carousel text-center u-carousel-v3 g-mx-minus-5" data-infinite="true"
    data-center-mode="true" data-slides-show="3" data-is-thumbs="true" data-nav-for="#carouselCus1">
    @if ($image)
        <div class="js-slide g-cursor-pointer g-px-5">
            <img class="img-fluid" src="{{ getImage($image) }}" alt="Image Description">
        </div>
    @endif
    @if ($galleries && is_array(json_decode($galleries)))
        @foreach (json_decode($galleries) as $item)
            <div class="js-slide g-cursor-pointer g-px-5">
                <img class="img-fluid" src="{{ getImage($item) }}" alt="Image Description">
            </div>
        @endforeach
    @endif

</div>
