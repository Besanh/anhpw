@push('datetimepicker')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" type="text/css" href="https://npmcdn.com/flatpickr/dist/themes/material_blue.css">

    {{-- Su dung cho viec chon month --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/style.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr@latest/dist/plugins/monthSelect/index.js"></script>

    <script type="text/javascript">
        $(".datetimepicker").flatpickr({
            enableTime: true,
            dateFormat: "Y-m-d H:i:ss",
        });

        $(".datepicker").flatpickr({
            dateFormat: "Y-m-d"
        });

        $(".monthyearpicker").flatpickr({
            static: true,
            altInput: true,
            plugins: [new monthSelectPlugin({
                shorthand: false,
                dateFormat: "Y-m",
                altFormat: "Y-m"
            })]
        })

    </script>
@endpush
