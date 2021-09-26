<div class="form-group row form_value_input field-setting">
    <label for="value_setting" class="col-md-4 col-form-label text-md-right">
        {{ __('Value Setting') }}
    </label>
    <div class="col-md-6">
        <textarea class="form-control value-setting" name="value_setting" placeholder="value"></textarea>
        @error('value_setting')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
