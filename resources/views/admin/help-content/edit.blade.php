<?php
$title = __($helpContent->title);
$status = getStatus();
$main_link = 'help-content';
?>
@extends('admin.layouts.main')
@section('title', $title)

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ __('Title - ' . $title) }}</h1>
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
                        <a href="{{ isset($help_id) ? route($main_link . '.view-topic', ['help_id' => $help_id]) : route($main_link . '.index') }}"
                            class="float-right">{{ __('Help Contents') }}</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route($main_link . '.update', $helpContent->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="help_id" class="col-form-label text-md-right">
                                        {{ __('Help') }}
                                    </label>
                                    <div>
                                        <select name="help_id" class="form-control" aria-label="Default select" required>
                                            <option>{{ __('---Choose---') }}</option>
                                            @foreach ($help_list as $h)
                                                <option value="{!! $h->id !!}"
                                                    {{ $helpContent->help_id == $h->id ? 'selected' : '' }}
                                                    class="@error('help_id') is-invalid @enderror">
                                                    {!! $h->title !!}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('help_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label for="title" class="col-form-label text-md-right">
                                        {{ __('Title') }}
                                    </label>
                                    <div>
                                        <input id="title" type="text"
                                            class="form-control @error('title') is-invalid @enderror" name="title"
                                            value="{{ old('title', $helpContent->title) }}" required autocomplete="title"
                                            autofocus>
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label for="priority" class="col-form-label text-md-right">
                                        {{ __('Priority') }}
                                    </label>
                                    <div>
                                        <input id="priority" type="text"
                                            class="form-control @error('priority') is-invalid @enderror" name="priority"
                                            value="{{ old('priority', $helpContent->priority) }}" required
                                            autocomplete="priority" autofocus>
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
                                                    {{ $helpContent->status == $k ? 'selected' : '' }}
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

                                    <label for="content" class="col-form-label text-md-right">
                                        {{ __('Content') }}
                                    </label>
                                    <div>
                                        <div class="form-group">
                                            <textarea class="ckeditor form-control"
                                                name="content">{!! $helpContent->content !!}</textarea>
                                        </div>
                                        @error('content')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0 mt-5">
                                <div class="col-md-6 offset-md-4">
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
@include('helper.ckeditor')
