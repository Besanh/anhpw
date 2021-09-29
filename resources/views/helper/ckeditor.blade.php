@push('ckeditor')
    {{-- <script src="//cdn.ckeditor.com/4.14.1/standard/ckeditor.js"></script> --}}
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace('ckeditor', {
            filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });

        // CKEDITOR.config.removeFormatAttributes = '';
        // CKEDITOR.config.allowedContent = true;
        // CKEDITOR.config.autoParagraph = false;

    </script>
@endpush
