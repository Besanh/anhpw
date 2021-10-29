<!-- Js Implement Plugin -->
@stack('script-cate')
@stack('script-home')
@stack('script-comming-soon')
@stack('script-cate-pjax')
@stack('script-product-detail')

<script src="{{ asset('js/jquery.pjax.js') }}"></script>
<script src="{{ asset('js/filter-cate.js') }}"></script>
{{-- Typeahead search --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script> --}}
<script src="{{ asset('js/typeahead.bundle.min.js') }}"></script>
{{-- <script src="{{ asset('js/bootstrap3-typeahead.min.js') }}"></script> --}}
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-3-typeahead/4.0.2/bootstrap3-typeahead.min.js" ></script> --}}
@stack('typeahead-search')