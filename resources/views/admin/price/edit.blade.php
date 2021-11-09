<?php
$title = 'Price - Edit';
$status = getStatus();
$main_link = 'price';
?>
@section('title', $title)
    @extends('admin.layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ 'Price' }}</h1>
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
                        <a href="{{ route($main_link . '.index') }}" class="float-right">Prices</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route($main_link . '.update', $price->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="sap_id" class="col-form-label text-md-right">
                                        {{ __('SAP ID') }}
                                    </label>
                                    <div>
                                        <input id="sap_id" type="text"
                                            class="form-control @error('sap_id') is-invalid @enderror" name="sap_id"
                                            value="{{ old('sap_id', $price->sap_id) }}" required autocomplete="sap_id"
                                            autofocus>

                                        @error('sap_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label for="pid" class="col-form-label text-md-right">
                                        {{ __('Product') }}
                                    </label>
                                    <div>
                                        @if ($products)
                                            <select name="pid" class="form-control" aria-label="Default select" required>
                                                <option value="">Choose product</option>
                                                @foreach ($products as $k => $p)
                                                    <option value="{!! $p->id !!}"
                                                        {{ $price->pid == $p->id ? 'selected' : '' }}
                                                        class="@error('pid') is-invalid @enderror">
                                                        {!! $p->name !!}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('pid')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        @endif
                                    </div>

                                    <label for="barcode" class="col-form-label text-md-right">
                                        {{ __('Barcode') }}
                                    </label>
                                    <div>
                                        <input id="barcode" type="text"
                                            class="form-control @error('barcode') is-invalid @enderror" name="barcode"
                                            value="{{ old('barcode', $price->barcode) }}" required autocomplete="barcode"
                                            autofocus>

                                        @error('barcode')
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
                                            value="{{ old('name', $price->name) }}" required autocomplete="name"
                                            autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="name_seo" class="col-form-label text-md-right">
                                        {{ __('Name SEO') }}
                                    </label>
                                    <div>
                                        <input id="name_seo" type="text"
                                            class="form-control @error('name_seo') is-invalid @enderror" name="name_seo"
                                            value="{{ old('name_seo', $price->name_seo) }}" required
                                            autocomplete="name_seo" autofocus>

                                        @error('name_seo')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label for="capa" class="col-form-label text-md-right">
                                        {{ __('Capacity') }}
                                    </label>
                                    <div>
                                        <input id="capa" type="text"
                                            class="form-control @error('capa') is-invalid @enderror" name="capa"
                                            value="{{ old('capa', $price->capa) }}" required autocomplete="capa"
                                            autofocus>

                                        @error('capa')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label for="capa_id" class="col-form-label text-md-right">
                                        {{ __('Capa ID') }}
                                    </label>
                                    <div>
                                        @if ($capacities)
                                            <select name="capa_id" class="form-control" aria-label="Default select"
                                                required>
                                                <option>{{ __('Choose capacity') }}</option>
                                                @foreach ($capacities as $k => $c)
                                                    <option value="{!! $c->id !!}"
                                                        {{ $price->capa_id == $c->id ? 'selected' : '' }}
                                                        class="@error('capa_id') is-invalid @enderror">
                                                        {!! $c->name !!}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('capa_id')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        @endif
                                    </div>

                                    <label for="price" class="col-form-label text-md-right">
                                        {{ __('Price') }}
                                    </label>
                                    <div>
                                        <input id="price" type="text"
                                            class="form-control @error('price') is-invalid @enderror" name="price"
                                            value="{{ old('price', $price->price) }}" required autocomplete="price"
                                            autofocus>

                                        @error('price')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for="promote" class="col-form-label text-md-right">
                                        {{ __('Promote') }}
                                    </label>
                                    <div>
                                        <input id="promote" type="text"
                                            class="form-control @error('promote') is-invalid @enderror" name="promote"
                                            value="{{ old('promote', $price->promote) }}" required autocomplete="promote"
                                            autofocus>

                                        @error('promote')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label for="status" class="col-form-label text-md-right">
                                        {{ __('Status') }}
                                    </label>
                                    <select name="status" class="form-control" aria-label="Default select" required>
                                        @foreach (getStatus() as $k => $t)
                                            <option value="{!! $k !!}"
                                                {{ $price->status == $k ? 'selected' : '' }}
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

                                    <label for="stock" class="col-form-label text-md-right">
                                        {{ __('Stock') }}
                                    </label>
                                    <div>
                                        <input id="stock" type="text"
                                            class="form-control @error('stock') is-invalid @enderror" name="stock"
                                            value="{{ old('stock', $price->stock) }}" required autocomplete="price"
                                            autofocus>

                                        @error('stock')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label for="note" class="col-form-label text-md-right">
                                        {{ __('Note') }}
                                    </label>
                                    <div>
                                        <div class="form-group">
                                            <textarea class="form-control" name="note">{{ $price->note }}</textarea>
                                        </div>
                                        @error('note')
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
@include('helper.ckeditor')
@include('helper.select2')
