<?php
$title = __('Brand - Create');
$status = getStatus();
$main_link = 'brand';
?>
@section('title', $title)
    @extends('admin.layouts.main')
@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ __('Brand') }}</h1>
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
                        <a href="{{ route($main_link . '.index') }}" class="float-right">{{ __('Brands') }}</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route($main_link . '.store') }}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="name" class="col-form-label text-md-right">
                                        {{ __('Name') }}
                                    </label>
                                    <div>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autocomplete="name" autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label for="name_seo" class="col-form-label text-md-right">
                                        {{ __('Name SEO') }}
                                    </label>
                                    <div>
                                        <input id="name" type="text"
                                            class="form-control @error('name_seo') is-invalid @enderror" name="name_seo"
                                            value="{{ old('name_seo') }}" required autocomplete="name_seo" autofocus>

                                        @error('name_seo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label for="alias" class="col-form-label text-md-right">
                                        {{ __('Alias') }}
                                    </label>
                                    <div>
                                        <input id="name" type="text"
                                            class="form-control @error('alias') is-invalid @enderror" name="alias"
                                            value="{{ old('alias') }}" required autocomplete="alias" autofocus>

                                        @error('alias')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label for="priority" class="col-form-label text-md-right">
                                        {{ __('Priority') }}
                                    </label>
                                    <div>
                                        <input id="name" type="text"
                                            class="form-control @error('priority') is-invalid @enderror" name="priority"
                                            value="{{ old('priority') }}" required autocomplete="priority" autofocus>

                                        @error('priority')
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

                                    @include('helper.ckfinder', ['name' => 'image', 'value' => ''])
                                </div>

                                <div class="col-md-6">
                                    <label for="description"
                                        class="col-form-label text-md-right">{{ __('Description') }}</label>

                                    <div>
                                        <div class="form-group">
                                            <textarea class="ckeditor form-control" name="description"></textarea>
                                        </div>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
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
