<?php
$action = request()
->route()
->getAction();
$controller = class_basename($action['controller']);
[$controller, $action] = explode('@', $controller);
?>
<div class="form-group row">
    <label for="alias" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>
    <div class="col-md-6">
        @if (getStatus())
            <select name="status" class="form-control" aria-label="Default select" required>
                <option value="" {{ $action != 'create' ? 'disabled' : '' }}>Prompt</option>
                @foreach (getStatus() as $k => $t)
                    <option value="{!! $k !!}"
                        {{ isset($old_status) && $old_status === $k ? 'selected' : '' }}
                        class="form-control @error('t') is-invalid @enderror">
                        {!! $t !!}</option>
                @endforeach
            </select>
            @error('status')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        @endif
    </div>
</div>
