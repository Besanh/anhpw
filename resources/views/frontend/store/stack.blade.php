@push('link-store')
    <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/icon-line/simple-line-icons.css') }}">

    <!-- CSS Implementing Plugins -->
    <link rel="stylesheet" href="{{ asset('frontend/css/icon-awesome/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/icon-line-pro/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/icon-hs/style.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/dzsparallaxer/dzsparallaxer.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/dzsparallaxer/scroller.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/dzsparallaxer/plugin.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/hamburgers/hamburgers.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/hs-megamenu/hs.megamenu.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/malihu-scrollbar/jquery.mCustomScrollbar.min.css') }}">

    <!-- CSS Unify Theme -->
    <link rel="stylesheet" href="{{ asset('frontend/css/styles.e-commerce.css') }}">

    <!-- CSS Customization -->
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
@endpush
@push('script-store')
    <!-- JS Global Compulsory -->
    <script src="{{ asset('frontend/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-migrate/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap/bootstrap.min.js') }}"></script>

    <!-- JS Implementing Plugins -->
    <script src="{{ asset('frontend/js/hs-megamenu/hs.megamenu.js') }}"></script>
    <script src="{{ asset('frontend/js/dzsparallaxer/dzsparallaxer.js') }}"></script>
    <script src="{{ asset('frontend/js/dzsparallaxer/scroller.js') }}"></script>
    <script src="{{ asset('frontend/js/dzsparallaxer/plugin.js') }}"></script>
    <script src="{{ asset('frontend/js/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-countdown/jquery.countdown.min.js') }}"></script>

    <!-- JS Unify -->
    <script src="{{ asset('frontend/js/hs-core/hs.core.js') }}"></script>
    <script src="{{ asset('frontend/js/hs-components/hs.header.js') }}"></script>
    <script src="{{ asset('frontend/js/hs-helpers/hs.hamburgers.js') }}"></script>
    <script src="{{ asset('frontend/js/hs-components/hs.dropdown.js') }}"></script>
    <script src="{{ asset('frontend/js/hs-components/hs.scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/js/hs-components/hs.go-to.js') }}"></script>
    <script src="{{ asset('frontend/js/hs-components/hs.countdown.js') }}"></script>

    <!-- JS Customization -->
    <script src="{{ asset('frontend/js/custom.js') }}"></script>

    <!-- JS Plugins Init. -->
    <script>
        $(document).on('ready', function() {
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

            // initialization of HSScrollBar component
            $.HSCore.components.HSScrollBar.init($('.js-scrollbar'));

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
        });

    </script>
@endpush
