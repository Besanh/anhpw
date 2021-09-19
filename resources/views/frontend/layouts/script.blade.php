<!-- JS Global Compulsory -->
<script src="{{ asset('frontend/js/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('frontend/js/jquery-migrate/jquery-migrate.min.js') }}"></script>
<script src="{{ asset('frontend/js/popper/popper.min.js') }}"></script>
<script src="{{ asset('frontend/js/bootstrap/bootstrap.min.js') }}"></script>

<!-- JS Implementing Plugins -->
<script src="{{ asset('frontend/js/jquery-countdown/jquery.countdown.min.js') }}"></script>
<script src="{{ asset('frontend/js/slick-carousel/slick.js') }}"></script>
<script src="{{ asset('frontend/js/hs-megamenu/hs.megamenu.js') }}"></script>
<script src="{{ asset('frontend/js/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script src="{{ asset('frontend/js/appear.js') }}"></script>

<!-- JS Revolution Slider -->
<script src="{{ asset('frontend/js/revolution-slider/jquery.themepunch.tools.min.js') }}"></script>
<script src="{{ asset('frontend/js/revolution-slider/revolution/jquery.themepunch.revolution.min.js') }}"></script>

<script src="{{ asset('frontend/js/revolution-slider/revolution-addons/revolution.addon.typewriter.min.js') }}">
</script>

<script src="{{ asset('frontend/js/revolution-slider/extensions/revolution.extension.actions.min.js') }}">
</script>
<script src="{{ asset('frontend/js/revolution-slider/extensions/revolution.extension.carousel.min.js') }}">
</script>
<script src="{{ asset('frontend/js/revolution-slider/extensions/revolution.extension.kenburn.min.js') }}">
</script>
<script src="{{ asset('frontend/js//revolution-slider/extensions/revolution.extension.layeranimation.min.js') }}">
</script>
<script src="{{ asset('frontend/js/revolution-slider/extensions/revolution.extension.migration.min.js') }}">
</script>
<script src="{{ asset('frontend/js/revolution-slider/extensions/revolution.extension.navigation.min.js') }}">
</script>
<script src="{{ asset('/revolution-slider/extensions/revolution.extension.parallax.min.js') }}">
</script>
<script
    src="{{ asset('frontend/js/revolution-slider/revolution/js/extensions/revolution.extension.slideanims.min.js') }}">
</script>
<script src="{{ asset('frontend/js/revolution-slider/revolution/js/extensions/revolution.extension.video.min.js') }}">
</script>

<!-- JS Unify -->
<script src="{{ assets('frontend/js/hs-core/hs.core.js') }}"></script>
<script src="{{ assets('frontend/js/hs-components/hs.header.js') }}"></script>
<script src="{{ assets('frontend/js/hs-helpers/hs.hamburgers.js') }}"></script>
<script src="{{ assets('frontend/js/hs-components/hs.dropdown.js') }}"></script>
<script src="{{ assets('frontend/js/hs-components/hs.scrollbar.js') }}"></script>
<script src="{{ assets('frontend/js/hs-components/hs.countdown.js') }}"></script>
<script src="{{ assets('frontend/js/hs-components/hs.carousel.js') }}"></script>
<script src="{{ assets('frontend/js/hs-components/hs.go-to.js') }}"></script>
<script src="{{ assets('frontend/js/hs-components/hs.count-qty.js') }}"></script>

<!-- JS Customization -->
<script src="{{ asset('frontend/js/custom.js') }}"></script>

<!-- JS Plugins Init. -->
<script>
    $(document).on('ready', function() {
        // initialization of carousel
        $.HSCore.components.HSCarousel.init('[class*="js-carousel"]');

        $('#carouselCus1').slick('setOption', 'responsive', [{
            breakpoint: 1200,
            settings: {
                slidesToShow: 4
            }
        }, {
            breakpoint: 992,
            settings: {
                slidesToShow: 3
            }
        }, {
            breakpoint: 768,
            settings: {
                slidesToShow: 2
            }
        }], true);
    });

    // initialization of header
    $.HSCore.components.HSHeader.init($('#js-header'));
    $.HSCore.helpers.HSHamburgers.init('.hamburger');

    // initialization of HSMegaMenu component
    $('.js-mega-menu').HSMegaMenu({
        event: 'hover',
        pageContainer: $('.container'),
        breakpoint: 991
    });

    // initialization of HSDropdown component
    $.HSCore.components.HSDropdown.init($('[data-dropdown-target]'), {
        afterOpen: function() {
            $(this).find('input[type="search"]').focus();
        }
    });

    // initialization of go to
    $.HSCore.components.HSGoTo.init('.js-go-to');

    // initialization of countdowns
    var countdowns = $.HSCore.components.HSCountdown.init('.js-countdown', {
        yearsElSelector: '.js-cd-years',
        monthElSelector: '.js-cd-month',
        daysElSelector: '.js-cd-days',
        hoursElSelector: '.js-cd-hours',
        minutesElSelector: '.js-cd-minutes',
        secondsElSelector: '.js-cd-seconds'
    });

    // initialization of quantity counter
    $.HSCore.components.HSCountQty.init('.js-quantity');

    $(window).on('load', function() {
        // initialization of HSScrollBar component
        $.HSCore.components.HSScrollBar.init($('.js-scrollbar'));
    });

    // initialization of revolution slider
    var tpj = jQuery;

    var revapi1014;
    tpj(document).ready(function() {
        if (tpj("#rev_slider_1014_1").revolution == undefined) {
            revslider_showDoubleJqueryError("#rev_slider_1014_1");
        } else {
            revapi1014 = tpj("#rev_slider_1014_1").show().revolution({
                sliderType: "standard",
                jsFileLocation: "revolution/js/",
                sliderLayout: "fullscreen",
                dottedOverlay: "none",
                delay: 9000,
                navigation: {
                    keyboardNavigation: "off",
                    keyboard_direction: "horizontal",
                    mouseScrollNavigation: "off",
                    mouseScrollReverse: "default",
                    onHoverStop: "off",
                    touch: {
                        touchenabled: "on",
                        swipe_threshold: 75,
                        swipe_min_touches: 1,
                        swipe_direction: "horizontal",
                        drag_block_vertical: false
                    },
                    arrows: {
                        style: "uranus",
                        enable: true,
                        hide_onmobile: true,
                        hide_under: 768,
                        hide_onleave: false,
                        tmp: '',
                        left: {
                            h_align: "left",
                            v_align: "center",
                            h_offset: 20,
                            v_offset: 0
                        },
                        right: {
                            h_align: "right",
                            v_align: "center",
                            h_offset: 20,
                            v_offset: 0
                        }
                    }
                },
                parallax: {
                    type: "mouse",
                    origo: "slidercenter",
                    speed: 2000,
                    levels: [2, 3, 4, 5, 6, 7, 12, 16, 10, 50],
                    disable_onmobile: "on"
                },
                responsiveLevels: [1240, 1024, 778, 480],
                visibilityLevels: [1240, 1024, 778, 480],
                gridwidth: [1240, 1024, 778, 480],
                gridheight: [868, 768, 960, 600],
                lazyType: "none",
                shadow: 0,
                spinner: "off",
                stopLoop: "on",
                stopAfterLoops: 0,
                stopAtSlide: 1,
                shuffle: "off",
                autoHeight: "off",
                fullScreenAutoWidth: "off",
                fullScreenAlignForce: "off",
                fullScreenOffsetContainer: "#js-header",
                fullScreenOffset: "",
                disableProgressBar: "on",
                hideThumbsOnMobile: "off",
                hideSliderAtLimit: 0,
                hideCaptionAtLimit: 0,
                hideAllCaptionAtLilmit: 0,
                debugMode: false,
                fallbacks: {
                    simplifyAll: "off",
                    nextSlideOnWindowFocus: "off",
                    disableFocusListener: false
                }
            });
        }

        RsTypewriterAddOn(tpj, revapi1014);
    });

</script>
