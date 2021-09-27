<?php
$title = 'Setting - Create';
$status = getStatus();
$main_link = 'setting';
?>
@section('title', $title)
    @extends('admin.layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ 'Setting' }}</h1>
    </div>
    <div class="container">
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
                        <a href="{{ route($main_link . '.index') }}" class="float-right">Settings</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route($main_link . '.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Name') }}
                                </label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row setting-type">
                                <label for="type" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Type') }}
                                </label>
                                <div class="col-md-6">
                                    <select name="type" class="form-control" aria-label="Default select" required
                                        onchange="changeField(this)">
                                        <option>Choose type</option>
                                        @foreach ($types as $k => $t)
                                            <option value="{!! $k !!}"
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

                            <div class="form-group row">
                                <label for="status" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Status') }}
                                </label>
                                <div class="col-md-6">
                                    <select name="status" class="form-control" aria-label="Default select" required>
                                        @foreach (getStatus() as $k => $t)
                                            <option value="{!! $k !!}"
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

                            <div class="form-group row mb-0 text-center">
                                <div class="col-md-12 offset-md-12">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Create') }}
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
        function clickToClone() {
            $('.click-to-clone').on('click', function() {
                var clone_ks = $('.clone_key_setting:last').clone();
                clone_ks.insertAfter('.clone_value_setting:last');

                var clone_vs = $('.clone_value_setting:last').clone();
                clone_vs.insertAfter('.clone_key_setting:last');

                $('.key-setting:last').val('');
                $('.value-setting:last').val('');

                clickToClone();
            });
        }
        clickToClone();

        function changeField(sel) {
            var url = sel.value == 'text' ? "{{ route('setting.field-text') }}" : (sel.value == 'image' ?
                "{{ route('setting.field-image') }}" : "{{ route('setting.field-json') }}");
            $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'html',
                    success: function(data) {
                        if ($('.field-setting').length > 0) {
                            $('.field-setting').remove();
                        }
                        $(data).insertAfter($('.setting-type'));
                    }
                })
                .done(function() {
                    clickToClone();
                });
        }

    </script>
@endpush
