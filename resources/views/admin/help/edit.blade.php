<?php
$title = __('Help - Edit');
$status = getStatus();
$main_link = 'help';
?>
@section('title', $title)
    @extends('admin.layouts.main')
@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ __($help->title) }}</h1>
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
                        <a href="{{ route($main_link . '.index') }}" class="float-right">{{ __('Helps') }}</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route($main_link . '.update', $help->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="title" class="col-form-label text-md-right">
                                        {{ __('Title') }}
                                    </label>
                                    <div>
                                        <input id="title" type="text"
                                            class="form-control @error('title') is-invalid @enderror" name="title"
                                            value="{{ old('title', $help->title) }}" required autocomplete="title"
                                            autofocus>
                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label for="sub_title" class="col-form-label text-md-right">
                                        {{ __('Sub Title') }}
                                    </label>
                                    <div>
                                        <input id="sub_title" type="text"
                                            class="form-control @error('subtitle') is-invalid @enderror" name="sub_title"
                                            value="{{ old('sub_title', $help->sub_title) }}" required
                                            autocomplete="sub_title" autofocus>

                                        @error('sub_title')
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
                                            value="{{ old('priority', $help->priority) }}" required
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
                                                    {{ $help->status == $k ? 'selected' : '' }}
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
                            </div>

                            <div class="form-group row mb-0 mt-5">
                                <div class="col-md-6 offset-md-4 text-center">
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
