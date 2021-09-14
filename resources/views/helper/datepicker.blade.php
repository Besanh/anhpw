@push('datepicker')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css"
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript">
        $(function() {
            $.fn.datepicker.defaults.format = "yyyy-mm-dd";
            $('#datepicker').datepicker({
                startDate: '-3d'
            });
        });

    </script>
@endpush
