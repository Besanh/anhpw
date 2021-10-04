<div class="u-header__section u-header__section--light g-bg-white g-transition-0_3 g-py-10">
    <nav class="js-mega-menu navbar navbar-expand-lg">
        <div class="container">
            <!-- Responsive Toggle Button -->
            <button
                class="navbar-toggler navbar-toggler-right btn g-line-height-1 g-brd-none g-pa-0 g-pos-abs g-top-3 g-right-0"
                type="button" aria-label="Toggle navigation" aria-expanded="false" aria-controls="navBar"
                data-toggle="collapse" data-target="#navBar">
                <span class="hamburger hamburger--slider g-pr-0">
                    <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                    </span>
                </span>
            </button>
            <!-- End Responsive Toggle Button -->

            <!-- Logo -->
            <a class="navbar-brand" href="home-page-1.html">
                <img class="img img-responsive img-logo"
                    src="{{ $logo && $logo->value_setting != 'no-image.png' ? $logo->value_setting : getNoImage() }}"
                    alt="Logo">
            </a>
            <!-- End Logo -->

            <!-- Navigation -->
            <div id="navBar" class="collapse navbar-collapse align-items-center flex-sm-row g-pt-15 g-pt-0--lg">
                <ul class="navbar-nav ml-auto">
                    <!-- Home - Submenu -->
                    @if ($tree)
                        {!! $tree !!}
                    @endif
                    <!-- End Home - Submenu -->
                </ul>
            </div>
            <!-- End Navigation -->
        </div>
    </nav>
</div>
