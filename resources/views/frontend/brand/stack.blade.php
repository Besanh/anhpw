@push('link-cate')
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
@push('script-cate')
    <!-- JS Global Compulsory -->
    <script src="{{ asset('frontend/js/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-migrate/jquery-migrate.min.js') }}"></script>
    <script src="{{ asset('frontend/js/popper/popper.min.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap/bootstrap.min.js') }}"></script>

    <script src="{{ asset('frontend/js/jquery-ui/widget.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui/widgets/menu.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui/widgets/mouse.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui/widgets/slider.js') }}"></script>
    <script src="{{ asset('frontend/js/dzsparallaxer/dzsparallaxer.js') }}"></script>
    <script src="{{ asset('frontend/js/dzsparallaxer/scroller.js') }}"></script>
    <script src="{{ asset('frontend/js/dzsparallaxer/plugin.js') }}"></script>
    <script src="{{ asset('frontend/js/hs-megamenu/hs.megamenu.js') }}"></script>
    <script src="{{ asset('frontend/js/malihu-scrollbar/jquery.mCustomScrollbar.concat.min.js') }}"></script>

    <!-- JS Unify -->
    <script src="{{ asset('frontend/js/hs-core/hs.core.js') }}"></script>
    <script src="{{ asset('frontend/js/hs-components/hs.header.js') }}"></script>
    <script src="{{ asset('frontend/js/hs-helpers/hs.hamburgers.js') }}"></script>
    <script src="{{ asset('frontend/js/hs-components/hs.dropdown.js') }}"></script>
    <script src="{{ asset('frontend/js/hs-components/hs.scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/js/hs-helpers/hs.rating.js') }}"></script>
    <script src="{{ asset('frontend/js/hs-components/hs.slider.js') }}"></script>
    <script src="{{ asset('frontend/js/hs-components/hs.go-to.js') }}"></script>

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

            // initialization of rating
            $.HSCore.helpers.HSRating.init();

            // initialization of range slider
            $.HSCore.components.HSSlider.init('#rangeSlider1');
        });

        // Filter search by brand
        // $(".search-brand").on("keyup", function() {
        //     var value = $(this).val().toLowerCase();
        //     $(".tab-brand .body-tab-brand").filter(function() {
        //         $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        //     });
        // });

        $(document).ready(function($) {
            // Set the Options for "Bloodhound" suggestion engine
            var brands = new Bloodhound({
                remote: {
                    url: '/search-brand/brand?search=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('search'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            $(".search-brand").typeahead({
                hint: true,
                // highlight: true,
                minLength: 1
            }, {
                source: brands.ttAdapter(),

                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                name: 'brands-name',

                // the key from the array we want to display (name,id,email,etc...)
                display: 'name',

                templates: {
                    // empty: [
                    //     '<div class="list-group-item">Nothing found.</div>'
                    // ],
                    header: [
                        '<div class="header-title" style="padding: 5px 10px;background: #dadada;font-weight: bold;">Brands</div><div class="list-group search-results-dropdown"></div>'
                    ],
                    suggestion: function(data) {
                        let path =
                            '/brand/' + data.alias;
                        return '<a href="' + path + '" class="list-group-item">' + '<img src="' + data
                            .image + '" style="width: 25%; height: 25%" />' +
                            '<span style="margin: 20px; font-weight: bold;font-size: 20px">' + data
                            .name_seo +
                            '</span>' +
                            '</a>'
                    }
                }
            }, );

            function convertToSlug(Text) {
                return Text
                    .toLowerCase()
                    .replace(/ /g, '-')
                    .replace(/[^\w-]+/g, '');
            }
        });

    </script>
@endpush
