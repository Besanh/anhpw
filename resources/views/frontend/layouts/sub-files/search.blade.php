<div class="d-inline-block g-valign-middle">
    <div class="g-py-10 g-pl-15">
        <a href="#"
            class="g-color-white-opacity-0_8 g-color-primary--hover g-font-size-17 g-text-underline--none--hover"
            aria-haspopup="true" aria-expanded="false" data-dropdown-event="click" aria-controls="searchform-1"
            data-dropdown-target="#searchform-1" data-dropdown-type="css-animation" data-dropdown-duration="300"
            data-dropdown-animation-in="fadeInUp" data-dropdown-animation-out="fadeOutDown">
            <i class="g-pos-rel g-top-3 icon-education-045 u-line-icon-pro"></i>
        </a>
    </div>

    <!-- Search Form -->
    <!-- Dung google search cho form khi submit -->
    <form id="searchform-1"
        class="u-searchform-v1 u-dropdown--css-animation u-dropdown--hidden u-shadow-v20 g-brd-around g-brd-gray-light-v4 g-bg-white g-right-0 rounded g-pa-10 1g-mt-8">
        <div class="input-group" id="multiple-datasets">
            <input class="form-control g-font-size-13 typeahead" id="typeahead-search" type="search" name="search"
                placeholder="Search Here...">
            <div class="input-group-append p-0">
                <button class="btn u-btn-primary g-font-size-12 text-uppercase g-px-15"
                    type="submit">{{ __('Go') }}</button>
            </div>
        </div>
    </form>
    <!-- End Search Form -->
</div>
@push('typeahead-search')
    <script type="text/javascript">
        $(document).ready(function($) {
            // Set the Options for "Bloodhound" suggestion engine
            var products = new Bloodhound({
                remote: {
                    url: '/search-product/product?search=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('search'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            var prices = new Bloodhound({
                remote: {
                    url: '/search-price/price?search=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('search'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            var cates = new Bloodhound({
                remote: {
                    url: '/search-cate/cate?search=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('search'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            var brands = new Bloodhound({
                remote: {
                    url: '/search-brand/brand?search=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('search'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            $("#multiple-datasets .typeahead").typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                source: products.ttAdapter(),

                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                name: 'product-name',

                // the key from the array we want to display (name,id,email,etc...)
                display: 'name',

                templates: {
                    // empty: [
                    //     '<div class="list-group-item">Nothing found.</div>'
                    // ],
                    header: [
                        '<div class="header-title" style="padding: 5px 10px;background: #dadada;font-weight: bold;">Products</div><div class="list-group search-results-dropdown"></div>'
                    ],
                    suggestion: function(data) {
                        let path =
                            '/' + data.b_alias + '/' + data.id + '-' + convertToSlug(data.name) +
                            '.html';
                        return '<a href="' + path + '" class="list-group-item">' + data.name_seo +
                            '</a>'
                    }
                }
            }, {
                source: prices.ttAdapter(),

                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                name: 'prices-name',

                // the key from the array we want to display (name,id,email,etc...)
                display: 'name',

                templates: {
                    // empty: [
                    //     '<div class="list-group-item">Nothing found.</div>'
                    // ],
                    header: [
                        '<div class="header-title" style="padding: 5px 10px;background: #dadada;font-weight: bold;">Prices</div><div class="list-group search-results-dropdown"></div>'
                    ],
                    suggestion: function(data) {
                        let path =
                            '/' + data.b_alias + '/' + data.id + '-' + convertToSlug(data.name) +
                            '.html';
                        return '<a href="' + path + '" class="list-group-item">' + data.name_seo +
                            '</a>'
                    }
                }
            }, {
                source: cates.ttAdapter(),

                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                name: 'cates-name',

                // the key from the array we want to display (name,id,email,etc...)
                display: 'name',

                templates: {
                    // empty: [
                    //     '<div class="list-group-item">Nothing found.</div>'
                    // ],
                    header: [
                        '<div class="header-title" style="padding: 5px 10px;background: #dadada;font-weight: bold;">Categories</div><div class="list-group search-results-dropdown"></div>'
                    ],
                    suggestion: function(data) {
                        let path = '/cate/' + data.alias;
                        return '<a href="' + path + '" class="list-group-item">' + data.name_seo +
                            '</a>'
                    }
                }
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
                        return '<a href="' + path + '" class="list-group-item">' + data.name_seo +
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
