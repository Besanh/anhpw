@push('select2')
    {{-- Select 2 --}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script type="text/javascript">
        $('.select2-dropdown, .itemName').select2({
            placeholder: 'Select an option',
            tags: true,
            theme: 'bootstrap4',
            // minimumInputLength: 2,
            // ajax: {
            //     url: $(this).attr('data-href'),
            //     dataType: 'json',
            //     data: function(params) {
            //         return {
            //             q: $.trim(params.term)
            //         };
            //     },
            //     processResults: function(data) {
            //         return {
            //             results: data
            //         };
            //     },
            //     cache: true
            // }
        })

    </script>
@endpush
