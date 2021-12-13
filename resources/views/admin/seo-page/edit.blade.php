<?php
$title = __('SEO Page - Update');
$status = getStatus();
$main_link = 'seo-page';
?>
@extends('admin.layouts.main')
@section('title', $title)

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">
                {{ $seoPage->pid ? __('Pid - ' . $seoPage->pid) : __('Page Name - ' . $seoPage->page_name) }}
            </h1>
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
                        <a href="{{ route($main_link . '.index') }}" class="float-right">{{ __('SEO Pages') }}</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route($main_link . '.update', $seoPage->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <label for="title" class="col-form-label text-md-right">
                                        {{ __('Title') }}
                                    </label>
                                    <div>
                                        <input id="title" type="text"
                                            class="form-control @error('title') is-invalid @enderror" name="title"
                                            value="{{ old('title', $seoPage->title) }}" autocomplete="title" autofocus>

                                        @error('title')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="page_name" class="col-form-label text-md-right">
                                        {{ __('Page Name') }}
                                    </label>
                                    <div>
                                        <input id="page_name" type="text"
                                            class="form-control @error('page_name') is-invalid @enderror" name="page_name"
                                            value="{{ old('page_name', $seoPage->page_name) }}" autocomplete="page_name"
                                            autofocus>

                                        @error('page_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="seo_desc"
                                        class="col-form-label text-md-right">{{ __('Description') }}</label>
                                    <div>
                                        <div class="form-group">
                                            <textarea id="seo_desc" class="form-control"
                                                name="seo_desc">{{ $seoPage->seo_desc }}</textarea>
                                        </div>
                                        @error('seo_desc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for="seo_keyword"
                                        class="col-form-label text-md-right">{{ __('Keyword') }}</label>

                                    <div>
                                        <div class="form-group">
                                            <textarea id="seo_keyword" class="form-control"
                                                name="seo_keyword">{{ $seoPage->seo_keyword }}</textarea>
                                        </div>
                                        @error('seo_keyword')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <label for="seo_robot" class="col-form-label text-md-right">{{ __('Robot') }}</label>
                                    <div>
                                        <div class="form-group">
                                            <textarea id="seo_robot" class="form-control"
                                                name="seo_robot">{{ $seoPage->seo_robot }}</textarea>
                                        </div>
                                        @error('seo_robot')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
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
