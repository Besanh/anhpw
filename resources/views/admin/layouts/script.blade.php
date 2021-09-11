<!-- Bootstrap core JavaScript-->
<script src="{{ asset('js/admin/jquery.min.js') }}"></script>
<script src="{{ asset('js/admin/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ asset('js/admin/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ asset('js/admin/sb-admin-2.min.js') }}"></script>

{{-- Select 2 --}}
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

{{-- Loader Page --}}
<script src="{{ asset('js/loader.js') }}"></script>

{{-- Moment JS --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" crossorigin="anonymous"
    referrerpolicy="no-referrer"></script>

{{-- Custom JS --}}
<script src="{{ asset('/js/custom.js') }}"></script>

{{-- @livewireScripts --}}
@stack('datatable')
@stack('scripts')
@stack('update-status')
@stack('update-status-css')
@stack('ckeditor')
