<?php
$title = 'Blog - Create';
$status = getStatus();
$main_link = 'blog';
?>
@section('title', $title)
    @extends('admin.layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ 'Blog' }}</h1>
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
                        <a href="{{ route($main_link . '.index') }}" class="float-right">Blogs</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route($main_link . '.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="title" class="col-form-label text-md-right">
                                        {{ __('Title') }}
                                    </label>
                                    <div>
                                        <input id="name" type="text"
                                            class="form-control @error('title') is-invalid @enderror" name="title"
                                            value="{{ old('title') }}" required autocomplete="name" autofocus>

                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label for="image" class="col-form-label text-md-right" data-toggle="tooltip"
                                        data-placement="top" title="900x450">
                                        {{ __('Image') }}
                                    </label>
                                    <div class="custom-file" data-toggle="tooltip" data-placement="top" title="400x300">
                                        <input type="file" name="image" class="custom-file-input" id="image"
                                            accept="image/png, image/gif, image/jpeg">
                                        <label class="custom-file-label" for="image">Choose file</label>
                                    </div>

                                    <label for="published_at" class="col-form-label text-md-right">
                                        {{ __('Published At') }}
                                    </label>
                                    <div>
                                        <div class="input-group date" data-provide="datetimepicker">
                                            <input type="text" class="datetimepicker form-control" value name="published_at">
                                            <div class="input-group-addon"></div>
                                        </div>
                                        @error('published_at')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label for="status" class="col-form-label text-md-right">
                                        {{ __('Status') }}
                                    </label>
                                    <div>
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

                                <div class="col-md-6">
                                    <label for="content"
                                        class="col-form-label text-md-right">{{ __('Content') }}</label>

                                    <div>
                                        <div class="form-group">
                                            <textarea class="ckeditor form-control" name="content"></textarea>
                                        </div>
                                        @error('content')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
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
@include('helper.ckeditor')
@include('helper.datetimepicker')
