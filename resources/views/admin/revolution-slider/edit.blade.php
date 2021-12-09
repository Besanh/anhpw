<?php
$title = __('Revolution Slider - Edit');
$status = getStatus();
$main_link = 'revolution-slider';
?>
@extends('admin.layouts.main')
@section('title', $title)

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ __('Slider') }}</h1>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @if (Session::has('message'))
                        <div>
                            <div class="alert alert-success">
                                {!! Session::get('message') !!}
                            </div>
                        </div>
                    @endif
                    @if ($errors->any())
                        <div>
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {!! $error !!}
                                @endforeach
                            </div>
                        </div>
                    @endif
                    <div class="card-header">
                        {{ $title }}
                        <a href="{{ route($main_link . '.index') }}" class="float-right">{{ __('Sliders') }}</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route($main_link . '.update', $revolutionSlider->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="image" class="col-md-4 col-form-label text-md-right">
                                    {{ ucfirst('Image') }}
                                </label>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <button id="ckfinder-modal" class="btn btn-outline-success ckfinder-btn"
                                                type="button">{{ __('Upload') }}</button>
                                        </div>
                                        <input type="text" class="form-control" id="ckfinder-input"
                                            value="{{ old('image', $revolutionSlider->image) }}" name="image"
                                            placeholder="Upload file">
                                    </div>
                                </div>
                            </div>
                            @if ($revolutionSlider->image)
                                <div class="mb-5">
                                    <img src="{{ $revolutionSlider->image }}"
                                        class="rounded mx-auto d-block img img-fluid" alt="">
                                </div>
                            @endif

                            <div class="form-group row">
                                <label for="link" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Link') }}
                                </label>
                                <div class="col-md-6">
                                    <input id="link" type="text" class="form-control @error('link') is-invalid @enderror"
                                        name="link" value="{{ old('link', $revolutionSlider->link) }}"
                                        autocomplete="link" autofocus>

                                    @error('link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="start_date" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Start date') }}
                                </label>
                                <div class="col-md-6">
                                    <input id="start_date" type="text"
                                        class="datetimepicker form-control @error('start_date') is-invalid @enderror"
                                        name="start_date" value="{{ old('start_date', $revolutionSlider->start_date) }}">

                                    @error('start_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="end_date" class="col-md-4 col-form-label text-md-right">
                                    {{ __('End date') }}
                                </label>
                                <div class="col-md-6">
                                    <input id="end_date" type="text"
                                        class="datetimepicker form-control @error('end_date') is-invalid @enderror"
                                        name="end_date" value="{{ old('end_date', $revolutionSlider->end_date) }}">

                                    @error('end_date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="priority" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Priority') }}
                                </label>
                                <div class="col-md-6">
                                    <input id="priority" type="text"
                                        class="form-control @error('priority') is-invalid @enderror" name="priority"
                                        value="{{ old('priority', $revolutionSlider->priority) }}"
                                        autocomplete="priority" autofocus>

                                    @error('priority')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row status">
                                <label for="status" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Status') }}
                                </label>
                                <div class="col-md-6">
                                    <select name="status" class="form-control" aria-label="Default select" required>
                                        @foreach (getStatus() as $k => $t)
                                            <option value="{!! $k !!}"
                                                {{ $k == $revolutionSlider->status ? 'selected' : '' }}
                                                class="@error('t') is-invalid @enderror">
                                                {!! $t !!}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row rs-type">
                                <label for="type" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Type') }}
                                </label>
                                <div class="col-md-6">
                                    <select name="type" class="form-control" aria-label="Default select" required
                                        onchange="changeField(this)">
                                        <option>Choose type</option>
                                        @foreach ($types as $k => $t)
                                            <option value="{!! $k !!}"
                                                {{ $k == $revolutionSlider->type ? 'selected' : '' }}
                                                class="@error('t') is-invalid @enderror">
                                                {!! $t !!}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            @include('admin.revolution-slider.sub_files.field-change', ['type' => $revolutionSlider->type,
                            'revolutionSlider' => $revolutionSlider])

                            <div class="form-group row mb-0 text-center">
                                <div class="col-md-12 offset-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('append-input')
    <script>
        function changeField(sel) {
            var url = sel.value == "SLIDE_WRITTER" ?
                "{{ route('revolution-slider.field-change', ['txtField' => 'writter']) }}" : (sel.value ==
                    "SLIDE_BTN_WRITTER" ?
                    "{{ route('revolution-slider.field-change', ['txtField' => 'btnwritter']) }}" :
                    "");
            if (url) {
                $.ajax({
                        url: url,
                        type: 'GET',
                        dataType: 'html',
                        success: function(data) {
                            if ($('.rs-title', ).length > 0) {
                                $('.rs-title').remove();
                            }
                            if ($('.rs-btn_name').length > 0) {
                                $('.rs-btn_name').remove();
                            }
                            if ($('.rs-type_writter').length > 0) {
                                $('.rs-type_writter').remove();
                            }
                            $(data).insertAfter($('.rs-type'));
                        }
                    })
                    .done(function() {});
            } else {
                if ($('.rs-title', ).length > 0) {
                    $('.rs-title').remove();
                }
                if ($('.rs-btn_name').length > 0) {
                    $('.rs-btn_name').remove();
                }
                if ($('.rs-type_writter').length > 0) {
                    $('.rs-type_writter').remove();
                }
            }
        }

    </script>
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
    {{-- <script src="//cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js" type="text/javascript"></script> --}}
@endpush
@include('helper.datetimepicker')
