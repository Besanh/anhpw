<?php
$title = 'Setting - Edit';
$status = getStatus();
$main_link = 'setting';

$val = '';
$val = $setting->type == 'json' ? (isJson($setting->value_setting) ? json_decode($setting->value_setting) : '') :
$setting->value_setting;
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
                        <form method="POST" action="{{ route($main_link . '.update', $setting->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Name') }}
                                </label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name', $setting->name) }}" required autocomplete="name"
                                        autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            @if ($setting->type == 'json')
                                @foreach ($val as $node)
                                    @foreach ($node as $key => $value)
                                        <div class="form-group row clone_key_setting">
                                            <label for="value_setting" class="col-md-4 col-form-label text-md-right">
                                                {{ __('Key Setting') }}
                                                <span class="click-to-clone" style="color:red">
                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                </span>
                                            </label>
                                            <div class="col-md-6">
                                                <textarea class="form-control value-setting" name="key_setting[]"
                                                    placeholder="key">{{ $key }}</textarea>
                                                @error('key_setting')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row clone_value_setting">
                                            <label for="value_setting" class="col-md-4 col-form-label text-md-right">
                                                {{ __('Value Setting') }}
                                            </label>
                                            <div class="col-md-6">
                                                <textarea class="form-control value-setting" name="value_setting[]"
                                                    placeholder="value">{{ $value }}</textarea>
                                                @error('value_setting')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    @endforeach
                                @endforeach
                            @else
                                <div class="form-group row clone_key_setting">
                                    <label for="value_setting" class="col-md-4 col-form-label text-md-right">
                                        {{ __('Value Setting') }}
                                    </label>
                                    <div class="col-md-6">
                                        <textarea class="form-control value-setting" name="value_setting"
                                            placeholder="key">{{ $setting->value_setting }}</textarea>
                                        @error('key_setting')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            @endif

                            <div class="form-group row setting-type">
                                <label for="type" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Type') }}
                                </label>
                                <div class="col-md-6">
                                    <select name="type" class="form-control" aria-label="Default select" required
                                        onchange="changeField(this)">
                                        @foreach ($types as $k => $t)
                                            @if ($k == $setting->type)
                                                <option value="{!! $k !!}" selected
                                                    class="@error('t') is-invalid @enderror">
                                                    {!! $t !!}
                                                </option>
                                            @endif
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
                                                {{ $setting->status == $k ? 'selected' : '' }}
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

    </script>
@endpush
