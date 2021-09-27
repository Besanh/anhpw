@include('ckfinder::setup')
<div class="form-group row">
    <label for="{{ 'value_setting' }}" class="col-md-4 col-form-label text-md-right">
        {{ ucfirst("value setting") }}
    </label>
    <div class="col-md-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <button id="ckfinder-modal" class="btn btn-outline-success ckfinder-btn" type="button">Upload</button>
            </div>
            <input type="text" class="form-control" id="ckfinder-input" value="{{ old('value_setting') }}"
                name="{{ 'value_setting' }}" placeholder="upload file">
        </div>
    </div>
</div>
<script type="text/javascript" src="{{ asset('js/ckfinder/ckfinder.js') }}"></script>
<script>
    CKFinder.config({
        connectorPath: '/ckfinder/connector'
    });

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
