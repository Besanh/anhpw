<div class="setting-content">
    <div class="form-group row clone_key_setting field-setting">
        <label for="key_setting" class="col-md-4 col-form-label text-md-right">
            {{ __('Key Setting') }}
            <span class="click-to-clone" style="color:red">
                <i class="fa fa-plus-circle" aria-hidden="true"></i>
            </span>
        </label>
        <div class="col-md-6">
            <textarea class="form-control key-setting" name="key_setting[]" placeholder="key"></textarea>
            @error('key_setting')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row clone_value_setting field-setting">
        <label for="value_setting" class="col-md-4 col-form-label text-md-right">
            {{ __('Value Setting') }}
        </label>
        <div class="col-md-6">
            <textarea class="form-control value-setting" name="value_setting[]" placeholder="value"></textarea>
            @error('value_setting')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
</div>
