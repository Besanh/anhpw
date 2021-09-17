<?php
$title = 'Product - Edit';
$status = getStatus();
$main_link = 'product';
?>
@section('title', $title)
    @extends('admin.layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ 'Product' }}</h1>
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
                        <a href="{{ route($main_link . '.index') }}" class="float-right">Products</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route($main_link . '.update', $product->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

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
                                        <label for="bid" class="col-form-label text-md-right">{{ __('Brand') }}</label>

                                        <div>
                                            <select name="bid" class="form-control" aria-label="Default select" required>
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
                                                value="{{ old('name', $product->name) }}" required autocomplete="name"
                                                autofocus>

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
                                                class="form-control @error('name_seo') is-invalid @enderror" name="name_seo"
                                                value="{{ old('name_seo', $product->name_seo) }}" required
                                                autocomplete="name_seo" autofocus>

                                            @error('name_seo')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>

                                        <label for="designer" class="col-form-label text-md-right">
                                            {{ __('Designer') }}
                                        </label>
                                        <div>
                                            <input id="desinger" type="text"
                                                class="form-control @error('designer') is-invalid @enderror" name="designer"
                                                value="{{ old('designer', $product->designer) }}" autocomplete="designer"
                                                autofocus>

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
                                            <div class="input-group date" data-provide="datepicker">
                                                <input type="text" class="form-control"
                                                    value="{{ old('public_year', $product->public_year) }}">
                                                <div class="input-group-addon"></div>
                                            </div>
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
                                                class="form-control @error('promote') is-invalid @enderror" name="promote"
                                                value="{{ old('promote', $product->promote) }}" required
                                                autocomplete="promote" autofocus>

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
                                            <select name="status" class="form-control" aria-label="Default select" required>
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


                                <div class="col-md-6">
                                    <label for="description"
                                        class="col-form-label text-md-right">{{ __('Description') }}</label>

                                    <div>
                                        <div class="form-group">
                                            <textarea class="ckeditor form-control" name="description">
                                                                    {{ $product->description }}
                                                                </textarea>
                                        </div>
                                        @error('description')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="image" class="col-form-label text-md-right" data-toggle="tooltip"
                                            data-placement="top" title="900x450">
                                            {{ __('Image') }}
                                        </label>
                                        <div class="custom-file" data-toggle="tooltip" data-placement="top" title="650x750">
                                            <input type="file" name="image" class="custom-file-input" id="image"
                                                accept="image/png, image/gif, image/jpeg">
                                            <label class="custom-file-label" for="image">
                                                {{ $product->image ? $product->image : 'Choose file' }}
                                            </label>
                                        </div>
                                    </div>
                                    @if ($product->image)
                                        <div>
                                            <img src="{{ getImage($product->image) }}" class="rounded mx-auto d-block"
                                                alt="{{ $product->name }}" width="200" height="200">
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="galleries" class="col-form-label text-md-right" data-toggle="tooltip"
                                            data-placement="top" title="900x450">
                                            {{ __('Galleries') }}
                                        </label>
                                        <div class="custom-file" data-toggle="tooltip" data-placement="top" title="650x750">
                                            <input type="file" name="galleries[]" class="custom-file-input" id="galleries"
                                                accept="image/png, image/gif, image/jpeg" multiple="multiple">
                                            <label class="custom-file-label" for="galleries">Choose file</label>
                                        </div>
                                    </div>
                                    @if ($product->galleries && json_decode($product->galleries))
                                        @foreach (json_decode($product->galleries) as $item)
                                            <div>
                                                <img src="{{ getImage($item) }}" class="rounded mx-auto d-block"
                                                    width="200" height="200">
                                            </div>
                                        @endforeach
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row mb-0">
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
@include('helper.ckeditor')
@include('helper.datepicker')
