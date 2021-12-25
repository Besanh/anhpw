<?php
$title = __('Store - Create');
$status = getStatus();
$main_link = 'store';
?>
@extends('admin.layouts.main')
@section('title', $title)
    
@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ __('Store') }}</h1>
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
                        <a href="{{ route($main_link . '.index') }}" class="float-right">{{ __('Stores') }}</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route($main_link . '.store') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="province_id" class="col-md-4 col-form-label ">{{ __('Province') }}</label>

                                    <select name="province_id" class="form-control" aria-label="Default select" required>
                                        @foreach ($provinces as $k => $p)
                                            <option value="{!! $p->id !!}"
                                                class="@error('province_id') is-invalid @enderror">
                                                {!! $p->name !!}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('province_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <label for="name" class="col-md-6 col-form-label ">
                                        {{ __('Name') }}
                                    </label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <label for="location" class="col-md-6 col-form-label ">
                                        {{ __('Location') }}
                                    </label>
                                    <input id="location" type="text"
                                        class="form-control @error('location') is-invalid @enderror" name="location"
                                        value="{{ old('location') }}" autocomplete="location" autofocus>

                                    @error('location')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <label for="link" class="col-md-6 col-form-label ">
                                        {{ __('Link') }}
                                    </label>
                                    <input id="link" type="text" class="form-control @error('link') is-invalid @enderror"
                                        name="link" value="{{ old('link') }}" autocomplete="link" autofocus>

                                    @error('link')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div class="col-md-4">
                                    <label for="tel" class="col-md-6 col-form-label ">
                                        {{ __('Tel') }}
                                    </label>
                                    <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror"
                                        name="tel" value="{{ old('tel') }}" autocomplete="tel" autofocus>

                                    @error('tel')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <label for="email" class="col-md-6 col-form-label ">
                                        {{ __('Email') }}
                                    </label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                        name="email" value="{{ old('email') }}" autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <label for="website" class="col-md-6 col-form-label ">
                                        {{ __('Website') }}
                                    </label>
                                    <input id="website" type="text"
                                        class="form-control @error('website') is-invalid @enderror" name="website"
                                        value="{{ old('website') }}" autocomplete="website" autofocus>

                                    @error('website')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <label for="working_time" class="col-md-6 col-form-label ">
                                        {{ __('Working Time') }}
                                    </label>
                                    <input id="working_time" type="text"
                                        class="form-control @error('working_time') is-invalid @enderror" name="working_time"
                                        value="{{ old('working_time') }}" autocomplete="working_time" autofocus>

                                    @error('working_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="image" class="col-md-6 col-form-label ">
                                        {{ __('Image') }}
                                    </label>
                                    <div class="custom-file" data-toggle="tooltip" data-placement="top" title="300x100">
                                        <input type="file" name="image" class="form-control" id="image"
                                            accept="image/png, image/gif, image/jpeg">
                                        <label class="custom-file-label" for="image">{{ __('Choose file') }}</label>
                                    </div>

                                    @error('image')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <label for="note" class="col-md-6 col-form-label ">
                                        {{ __('Note') }}
                                    </label>
                                    <textarea id="note" class="form-control" name="note"></textarea>

                                    @error('note')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror

                                    <label for="status" class="col-md-6 col-form-label ">{{ __('Status') }}</label>

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
                            <div class="form-group row mb-0 mt-5">
                                <div class="col-md-12 offset-md-12 text-center">
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
