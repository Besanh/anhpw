<?php
use App\Models\RevolutionSlider; ?>
@if ($type == 'writter' || $type == 'SLIDE_WRITTER')
    <div class="form-group row rs-type_writter">
        <label for="type_writter" class="col-md-4 col-form-label text-md-right">
            {{ __('Type Writter') }}
        </label>
        <div class="col-md-6">
            <input type="text" class="form-control @error('type_writter') is-invalid @enderror" name="type_writter"
                value="{{ old('type_writter', isset($revolutionSlider) ? $revolutionSlider->type_writter : '') }}"
                autocomplete="title" autofocus required>

            @error('type_writter')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
@elseif($type == "btnwritter" || $type == "SLIDE_BTN_WRITTER")
    <div class="form-group row rs-title">
        <label for="title" class="col-md-4 col-form-label text-md-right">
            {{ __('Title') }}
        </label>
        <div class="col-md-6">
            <input type="text" class="form-control @error('title') is-invalid @enderror" name="title"
                value="{{ old('title', isset($revolutionSlider) ? $revolutionSlider->title : '') }}"
                autocomplete="title" autofocus required>

            @error('title')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row rs-type_writter">
        <label for="type_writter" class="col-md-4 col-form-label text-md-right">
            {{ __('Type Writter') }}
        </label>
        <div class="col-md-6">
            <input type="text" class="form-control @error('type_writter') is-invalid @enderror" name="type_writter"
                value="{{ old('type_writter', isset($revolutionSlider) ? $revolutionSlider->type_writter : '') }}"
                autocomplete="title" autofocus required>

            @error('type_writter')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row rs-btn_name">
        <label for="btn_name" class="col-md-4 col-form-label text-md-right">
            {{ __('Button Name') }}
        </label>
        <div class="col-md-6">
            <input type="text" class="form-control @error('btn_name') is-invalid @enderror" name="btn_name"
                value="{{ old('btn_name', isset($revolutionSlider) ? $revolutionSlider->btn_name : '') }}"
                autocomplete="btn_name" autofocus required>

            @error('btn_name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
@endif
