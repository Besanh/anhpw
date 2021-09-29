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
                    src="{{ $logo->value_setting != 'no-image.png' ? $logo->value_setting : getNoImage() }}"
                    alt="Logo">
            </a>
            <!-- End Logo -->

            <!-- Navigation -->
            <div id="navBar" class="collapse navbar-collapse align-items-center flex-sm-row g-pt-15 g-pt-0--lg">
                <ul class="navbar-nav ml-auto">
                    <!-- Home - Submenu -->
                    {!! $tree !!}
                    <!-- End Home - Submenu -->

                    <!-- New Arrivals - Mega Menu -->
                    <li class="hs-has-mega-menu nav-item g-ml-10--lg g-ml-15--xl" data-animation-in="fadeIn"
                        data-animation-out="fadeOut" data-position="right">
                        <a id="mega-menu-label-5" class="nav-link text-uppercase g-color-primary--hover g-px-5 g-py-20"
                            href="#" aria-haspopup="true" aria-expanded="false">
                            New Arrivals
                            <i class="hs-icon hs-icon-arrow-bottom g-font-size-11 g-ml-7"></i>
                        </a>

                        <!-- Mega Menu -->
                        <div class="w-100 hs-mega-menu u-shadow-v11 g-text-transform-none g-brd-top g-brd-primary g-brd-top-2 g-bg-white g-pa-30 g-mt-17"
                            aria-labelledby="mega-menu-label-5">
                            <div class="row">
                                <div class="col-md-4 g-mb-30 g-mb-0--md">
                                    <!-- Article -->
                                    <article
                                        class="g-bg-size-cover g-bg-pos-center g-bg-cover g-bg-bluegray-opacity-0_3--after text-center g-px-40 g-py-80"
                                        data-bg-img-src="assets/img-temp/600x400/img1.jpg">
                                        <div class="g-pos-rel g-z-index-1">
                                            <span
                                                class="d-block g-color-white g-font-weight-400 text-uppercase mb-3">Blouse</span>
                                            <span class="d-block h2 g-color-white mb-4">Lafayette</span>
                                            <a class="btn u-btn-white g-brd-primary--hover g-color-white--hover g-bg-primary--hover g-font-size-11 text-uppercase g-py-10 g-px-20"
                                                href="#">Shop Now</a>
                                        </div>
                                    </article>
                                    <!-- End Article -->
                                </div>

                                <div class="col-md-4 g-mb-30 g-mb-0--md">
                                    <!-- Article -->
                                    <article
                                        class="g-bg-size-cover g-bg-pos-center g-bg-cover g-bg-bluegray-opacity-0_3--after text-center g-px-40 g-py-80"
                                        data-bg-img-src="assets/img-temp/600x400/img2.jpg">
                                        <div class="g-pos-rel g-z-index-1">
                                            <span
                                                class="d-block g-color-white g-font-weight-400 text-uppercase mb-3">Hamburg
                                                Hats</span>
                                            <span class="d-block h2 g-color-white mb-4">Beaver</span>
                                            <a class="btn u-btn-white g-brd-primary--hover g-color-white--hover g-bg-primary--hover g-font-size-11 text-uppercase g-py-10 g-px-20"
                                                href="#">Shop Now</a>
                                        </div>
                                    </article>
                                    <!-- End Article -->
                                </div>

                                <div class="col-md-4 g-mb-30 g-mb-0--md">
                                    <!-- Article -->
                                    <article
                                        class="g-bg-size-cover g-bg-pos-center g-bg-cover g-bg-bluegray-opacity-0_3--after text-center g-px-40 g-py-80"
                                        data-bg-img-src="assets/img-temp/600x400/img3.jpg">
                                        <div class="g-pos-rel g-z-index-1">
                                            <span
                                                class="d-block g-color-white g-font-weight-400 text-uppercase mb-3">Glasses</span>
                                            <span class="d-block h2 g-color-white mb-4">RayBan</span>
                                            <a class="btn u-btn-white g-brd-primary--hover g-color-white--hover g-bg-primary--hover g-font-size-11 text-uppercase g-py-10 g-px-20"
                                                href="#">Shop Now</a>
                                        </div>
                                    </article>
                                    <!-- End Article -->
                                </div>
                            </div>
                        </div>
                        <!-- End Mega Menu -->
                    </li>
                    <!-- End New Arrivals - Mega Menu -->
                </ul>
            </div>
            <!-- End Navigation -->
        </div>
    </nav>
</div>
