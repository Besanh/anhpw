@push('datetimepicker')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/6-alpha1/browser-sync-config.min.js"
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
    <script type="text/javascript">
        $(function() {
            $.fn.datepicker.defaults.format = "yyyy-mm-dd";
            $('#datetimepicker').datetimepicker();
        });

    </script>
@endpush
