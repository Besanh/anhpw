<!-- Bootstrap core JavaScript-->
<script src="{{ asset('js/admin/jquery.min.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('js/admin/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/admin/sb-admin-2.min.js') }}"></script>

@stack('select2')

{{-- Loader Page --}}
<script src="{{ asset('js/loader.js') }}"></script>

@stack('moment')

{{-- Custom JS --}}
<script src="{{ asset('/js/custom.js') }}"></script>

{{-- @livewireScripts --}}
@stack('datatable')
@stack('scripts')
@stack('update-status')
@stack('update-status-css')
@stack('ckeditor')
@stack('datepicker')
@stack('datetimepicker')
@stack('select-product')
@stack('append-input')
@stack('ckfinder-input')
@stack('jquery-ui')
@stack('script-edit-table')
