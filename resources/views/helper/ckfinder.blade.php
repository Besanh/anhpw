@include('ckfinder::setup')
{{-- <div id="ckfinder-widget"></div> --}}
<label for="{{ $name }}" class="col-form-label text-md-right">
    {{ ucfirst("$name") }}
</label>
<div>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
            <button id="ckfinder-modal" class="btn btn-outline-success ckfinder-btn" type="button">Upload</button>
        </div>
        <input type="text" class="form-control" id="ckfinder-input" value="{{ old("$name", $value) }}"
            name="{{ $name }}" placeholder="upload file">
    </div>
</div>

<script type="text/javascript" src="{{ asset('js/ckfinder/ckfinder.js') }}"></script>
<script>
    CKFinder.config({
        connectorPath: '/ckfinder/connector'
    });
    // CKFinder.widget('ckfinder-widget', {
    //     width: '100%',
    // });

    var btn_upload = document.getElementById('ckfinder-modal');
    btn_upload.onclick = function() {
        selectFileWithCKFinder('ckfinder-input');
    };

    function selectFileWithCKFinder(elementId) {
        CKFinder.modal({
            chooseFiles: true,
            width: 800,
            height: 600,
            onInit: function(finder) {
                finder.on('files:choose', function(evt) {
                    var file = evt.data.files.first();
                    var output = document.getElementById(elementId);
                    console.log(output)
                    output.value = file.getUrl();
                });

                finder.on('file:choose:resizedImage', function(evt) {
                    var output = document.getElementById(elementId);
                    output.value = evt.data.resizedUrl;
                });
            }
        });
    };

</script>
<script src="//cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js" type="text/javascript"></script>
