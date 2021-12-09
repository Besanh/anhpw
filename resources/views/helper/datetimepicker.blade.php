@push('datetimepicker')
    <link rel="stylesheet" href="{{ asset('css/flatpickr/flatpickr.min.css') }}">
    <script src="{{ asset('js/flatpickr/flatpickr.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/flatpickr/material_blue.css') }}">

    {{-- Su dung cho viec chon month --}}
    <link rel="stylesheet" href="{{ asset('css/flatpickr/monthSelect.css') }}">
    <script src="{{ asset('js/flatpickr/monthSelect.js') }}"></script>

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
