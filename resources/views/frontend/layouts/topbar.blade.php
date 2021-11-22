<div class="u-header__section g-brd-bottom g-brd-gray-light-v4 bg-main g-transition-0_3">
    <div class="container">
        <div class="row justify-content-between align-items-center g-mx-0--lg">
            <div class="col-sm-auto g-hidden-sm-down">
                <!-- Social Icons -->
                <ul class="list-inline g-py-14 mb-0">
                    <li class="list-inline-item">
                        @if ($socials && isJson($socials->value_setting))
                            @foreach (json_decode($socials->value_setting, true) as $s)
                                @foreach ($s as $item)
                                    @if (isJson($item))
                                        <a class="g-color-white-opacity-0_8 g-color-primary--hover g-pa-3"
                                            href="{{ isset(json_decode($item)->link) ? json_decode($item)->link : '' }}"
                                            target="__blank">
                                            {!! isset(json_decode($item)->icon) ? json_decode($item)->icon : '' !!}
                                        </a>
                                    @endif
                                @endforeach
                            @endforeach
                        @endif
                    </li>
                </ul>
                <!-- End Social Icons -->
            </div>

            <div
                class="col-sm-auto g-hidden-sm-down g-color-white-opacity-0_6 g-font-weight-400 g-pl-15 g-pl-0--sm g-py-14">
                <i
                    class="icon-communication-163 u-line-icon-pro g-font-size-18 g-valign-middle g-color-white-opacity-0_8 g-mr-10 g-mt-minus-2"></i>
                @if ($phone)
                    {{ $phone->value_setting }}
                @endif
            </div>

            @include('frontend.layouts.sub-files.menu-topbar')

            <div class="col-sm-auto g-pr-15 g-pr-0--sm">
                <!-- Search -->
                @include('frontend.layouts.sub-files.search')
                <!-- End Search -->

                <!-- Basket -->
                @include('frontend.layouts.sub-files.shopping-cart')
                <!-- End Basket -->
            </div>
        </div>
    </div>
</div>
