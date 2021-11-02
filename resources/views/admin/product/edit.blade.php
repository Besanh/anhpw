<?php
$title = __($product->name_seo);
$status = getStatus();
$main_link = 'product';
?>
@section('title', $title)
    @extends('admin.layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
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
                        {{ __('Product - Edit') }}
                        <a href="{{ route($main_link . '.index') }}" class="float-right">{{ __('Products') }}</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route($main_link . '.update', $product->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <ul class="nav nav-tabs" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home"
                                        role="tab" aria-controls="pills-home" aria-selected="true">{{ __('Index') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-content-tab" data-toggle="pill" href="#pills-content"
                                        role="tab" aria-controls="pills-content"
                                        aria-selected="false">{{ __('Content') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-style-tab" data-toggle="pill" href="#pills-style"
                                        role="tab" aria-controls="pills-style" aria-selected="false">{{ __('Style') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-seo-tab" data-toggle="pill" href="#pills-seo" role="tab"
                                        aria-controls="pills-seo" aria-selected="false">{{ __('SEO') }}</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="pills-image-tab" data-toggle="pill" href="#pills-image"
                                        role="tab" aria-controls="pills-image" aria-selected="false">{{ __('Image') }}</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                    aria-labelledby="pills-home-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div>
                                                <label for="cate_id"
                                                    class="col-form-label text-md-right">{{ __('Cate') }}</label>
                                                <div>
                                                    <select name="cate_id" class="form-control" aria-label="Default select"
                                                        required>
                                                        <option value="" selected>Select Category</option>
                                                        @foreach ($cates as $k => $c)
                                                            <option value="{!! $c->id !!}"
                                                                {{ $product->cate_id == $c->id ? 'selected' : '' }}
                                                                class="@error('p') is-invalid @enderror">
                                                                {!! $c->name !!}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('cate_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>

                                            <div>
                                                <label for="bid"
                                                    class="col-form-label text-md-right">{{ __('Brand') }}</label>

                                                <div>
                                                    <select name="bid" class="form-control" aria-label="Default select"
                                                        required>
                                                        <option value="" selected>Select Brand</option>
                                                        @foreach ($brands as $k => $b)
                                                            <option value="{!! $b->id !!}"
                                                                {{ $product->bid == $b->id ? 'selected' : '' }}
                                                                class="@error('p') is-invalid @enderror">
                                                                {!! $b->name !!}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('bid')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>

                                                <label for="name" class="col-form-label text-md-right">
                                                    {{ __('Name') }}
                                                </label>
                                                <div>
                                                    <input id="name" type="text"
                                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                                        value="{{ old('name', $product->name) }}" required
                                                        autocomplete="name" autofocus>

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
                                                    <input id="name_seo" type="text"
                                                        class="form-control @error('name_seo') is-invalid @enderror"
                                                        name="name_seo" value="{{ old('name_seo', $product->name_seo) }}"
                                                        required autocomplete="name_seo" autofocus>

                                                    @error('name_seo')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="designer" class="col-form-label text-md-right">
                                                {{ __('Designer') }}
                                            </label>
                                            <div>
                                                <input id="desinger" type="text"
                                                    class="form-control @error('designer') is-invalid @enderror"
                                                    name="designer" value="{{ old('designer', $product->designer) }}"
                                                    autocomplete="designer" autofocus>

                                                @error('designer')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <label for="public_year" class="col-form-label text-md-right">
                                                {{ __('Public Year') }}
                                            </label>
                                            <div>
                                                <input id="public_year" type="text"
                                                    class="form-control @error('designer') is-invalid @enderror"
                                                    name="public_year"
                                                    value="{{ old('public_year', $product->public_year) }}"
                                                    autocomplete="public_year" autofocus>
                                                @error('public_year')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <label for="promote" class="col-form-label text-md-right">
                                                {{ __('Promote') }}
                                            </label>
                                            <div>
                                                <input id="promote" type="text"
                                                    class="form-control @error('promote') is-invalid @enderror"
                                                    name="promote" value="{{ old('promote', $product->promote) }}"
                                                    required autocomplete="promote" autofocus>

                                                @error('promote')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>

                                            <label for="status" class="col-form-label text-md-right">
                                                {{ __('Status') }}
                                            </label>
                                            <div class="form-group">
                                                <select name="status" class="form-control" aria-label="Default select"
                                                    required>
                                                    @foreach (getStatus() as $k => $t)
                                                        <option value="{!! $k !!}"
                                                            {{ $product->status == $k ? 'selected' : '' }}
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
                                </div>
                                <div class="tab-pane fade" id="pills-content" role="tabpanel"
                                    aria-labelledby="pills-content-tab">
                                    <div class="col-md-12">
                                        <label for="benefit"
                                            class="col-form-label text-md-right">{{ __('Benefit') }}</label>

                                        <div>
                                            <div class="form-group">
                                                <textarea id="benefit" class="form-control"
                                                    name="benefit">{!! $product->benefit !!}</textarea>
                                            </div>
                                            @error('benefit')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <label for="ingredient"
                                            class="col-form-label text-md-right">{{ __('Ingredient') }}</label>

                                        <div>
                                            <div class="form-group">
                                                <textarea id="ingredient" class="form-control"
                                                    name="ingredient">{!! $product->ingredient !!}</textarea>
                                            </div>
                                            @error('ingredient')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <label for="description"
                                            class="col-form-label text-md-right">{{ __('Description') }}</label>

                                        <div>
                                            <div class="form-group">
                                                <textarea id="description" class="form-control"
                                                    name="description">{{ $product->description }}</textarea>
                                            </div>
                                            @error('description')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-seo" role="tabpanel" aria-labelledby="pills-seo-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="seo_desc"
                                                class="col-form-label text-md-right">{{ __('Description') }}</label>
                                            <div>
                                                <div class="form-group">
                                                    <textarea id="seo_desc" class="form-control"
                                                        name="seo_desc">{{ old('seo_desc', $product->getSeo->seo_desc) }}</textarea>
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
                                                        name="seo_keyword">{{ old('seo_keyword', $product->getSeo->seo_keyword) }}</textarea>
                                                </div>
                                                @error('seo_keyword')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-style" role="tabpanel"
                                    aria-labelledby="pills-style-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="incense_group"
                                                class="col-form-label text-md-right">{{ __('Incense Group (Nhóm hương)') }}</label>
                                            <div>
                                                <div class="form-group">
                                                    <textarea id="incense_group" class="form-control"
                                                        name="incense_group">{!! $product->incense_group !!}</textarea>
                                                </div>
                                                @error('incense_group')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <label for="styles"
                                                class="col-form-label text-md-right">{{ __('Styles (Phong cách)') }}</label>

                                            <div>
                                                <div class="form-group">
                                                    <textarea id="styles" class="form-control"
                                                        name="styles">{!! $product->styles !!}</textarea>
                                                </div>
                                                @error('styles')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="pills-image" role="tabpanel"
                                    aria-labelledby="pills-image-tab">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="image" class="col-form-label text-md-right"
                                                    data-toggle="tooltip" data-placement="top" title="900x450">
                                                    {{ __('Image') }}
                                                </label>
                                                <div class="custom-file" data-toggle="tooltip" data-placement="top"
                                                    title="650x750">
                                                    <input type="file" name="image" class="custom-file-input" id="image"
                                                        accept="image/png, image/gif, image/jpeg">
                                                    <label class="custom-file-label" for="image">
                                                        {{ $product->image ? $product->image : 'Choose file' }}
                                                    </label>
                                                </div>
                                            </div>

                                            @if ($product->image)
                                                <div class="border border-danger mb-5 pt-5 pb-5">
                                                    <img src="{{ getImage($product->image) }}"
                                                        class="rounded mx-auto d-block" alt="{{ $product->name }}"
                                                        width="200" height="200">
                                                </div>
                                            @endif
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="galleries" class="col-form-label text-md-right"
                                                    data-toggle="tooltip" data-placement="top" title="900x450">
                                                    {{ __('Galleries') }}
                                                </label>
                                                <div class="custom-file" data-toggle="tooltip" data-placement="top"
                                                    title="650x750">
                                                    <input type="file" name="galleries[]" class="custom-file-input"
                                                        id="galleries" accept="image/png, image/gif, image/jpeg"
                                                        multiple="multiple">
                                                    <label class="custom-file-label" for="galleries">Choose file</label>
                                                </div>
                                            </div>

                                            @if ($product->galleries && json_decode($product->galleries))
                                                <div class="border border-success mb-5 pt-5 pb-5">
                                                    @foreach (json_decode($product->galleries) as $item)
                                                        <img src="{{ getImage($item) }}" class="rounded mx-auto d-block"
                                                            width="200" height="200">
                                                    @endforeach
                                                </div>
                                            @endif
                                        </div>
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
{{-- @include('helper.ckeditor') --}}
@include('helper.datetimepicker')
@push('ckeditor')
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    {{-- <script src="{{ asset('ckeditor/ckeditor.js') }}"></script> --}}
    <script>
        CKEDITOR.replace('benefit', {
            filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });

        CKEDITOR.replace('ingredient', {
            filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });

        CKEDITOR.replace('description', {
            filebrowserUploadUrl: "{{ route('upload', ['_token' => csrf_token()]) }}",
            filebrowserUploadMethod: 'form'
        });

    </script>
@endpush
