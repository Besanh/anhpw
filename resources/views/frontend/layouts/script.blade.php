<!-- Js Implement Plugin -->
@stack('script-cate')
@stack('script-home')
@stack('script-comming-soon')
@stack('script-cate-pjax')
@stack('script-product-detail')
@stack('script-cart-empty')
@stack('script-cart')
@stack('script-cart-notify')
@stack('script-store')
@stack('script-help')


<script src="{{ asset('js/jquery.pjax.js') }}"></script>
<script src="{{ asset('js/filter-cate.js') }}"></script>
{{-- Typeahead search --}}
{{-- Su dung cho dataset typeahead --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script> --}}
<script src="{{ asset('js/typeahead.bundle.min.js') }}"></script>

{{-- Su dung cho search bt theo bootstrap typeahead --}}
{{-- <script src="{{ asset('js/bootstrap3-typeahead.min.js') }}"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script> --}}
@stack('typeahead-search')
