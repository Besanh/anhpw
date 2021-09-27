<div class="u-header__section g-brd-bottom g-brd-gray-light-v4 g-bg-black g-transition-0_3">
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
                                            href="{{ json_decode($item)->link }}" target="__blank">
                                            {!! json_decode($item)->icon !!}
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
                {{ $phone->value_setting }}
            </div>

            @include('frontend.layouts.sub-files.menu-topbar')

            <div class="col-sm-auto g-pr-15 g-pr-0--sm">
                <!-- Basket -->
                @include('frontend.layouts.sub-files.shopping-cart')
                <!-- End Basket -->

                <!-- Search -->
                @include('frontend.layouts.sub-files.search')
                <!-- End Search -->
            </div>
        </div>
    </div>
</div>
