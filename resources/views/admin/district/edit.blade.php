<?php
$title = 'District - Edit';
$status = getStatus();
$main_link = 'district';
?>
@section('title', $title)
    @extends('admin.layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ 'District' }}</h1>
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
                        <a href="{{ route($main_link . '.index') }}" class="float-right">Districts</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route($main_link . '.update', $district->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="province_id"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Province') }}</label>

                                <div class="col-md-6">
                                    <select name="province_id" class="form-control" aria-label="Default select" required>
                                        <option value="" selected>Select Province</option>
                                        @foreach ($provinces as $k => $p)
                                            <option value="{!! $p->id !!}"
                                                {{ $p->id == $district->province_id ? 'selected' : '' }}
                                                class="@error('p') is-invalid @enderror">
                                                {!! $p->name !!}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('province_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Name') }}
                                </label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                        name="name" value="{{ old('name', $district->name) }}" required
                                        autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="status"
                                    class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                                <div class="col-md-6">
                                    <select name="status" class="form-control" aria-label="Default select" required>
                                        @foreach (getStatus() as $k => $t)
                                            <option value="{!! $k !!}"
                                                {{ $district->status == $k ? 'selected' : '' }}
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

                            <div class="form-group row">
                                <label for="note" class="col-md-4 col-form-label text-md-right">{{ __('Note') }}</label>

                                <div class="col-md-6">
                                    <div class="form-floating">
                                        <textarea class="form-control" name="note" placeholder="Note here"
                                            id="floatingTextarea">{{ $district->note }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12 offset-md-12 text-center">
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
