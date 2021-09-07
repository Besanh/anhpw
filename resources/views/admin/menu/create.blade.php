<?php
use App\Models\Menu;
use Illuminate\Support\Arr;
$title = 'Menu - Create';
?>
@section('title', $title)
    @extends('admin.layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ 'Menu' }}</h1>
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
                        <a href="{{ route('menu.index', $alias) }}" class="float-right">Menu</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('menu.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="parent_id" class="col-form-label text-md-right">{{ __('Parent') }}</label>
                                    <div>
                                        <select name="parent_id" class="form-control" aria-label="Default select" required
                                            size="5">
                                            <option value="0">ROOT</option>
                                            @if ($menu_list)
                                                @foreach ($menu_list as $k => $m)
                                                    <option value="{!! $k !!}"
                                                        class="@error('m') is-invalid @enderror">
                                                        {!! $m !!}
                                                    </option>
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('parent_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label for="type_id" class="col-form-label text-md-right">
                                        {{ __('Type') }}
                                    </label>
                                    <div>
                                        <select name="type_id" class="form-control" aria-label="Default select" required>
                                            {{-- <option value disabled>ROOT</option> --}}
                                            @if (Menu::getMenuType())
                                                @foreach (Menu::getMenuType() as $k => $m)
                                                    @if ($type->id == $k)
                                                        <option value="{!! $k !!}"
                                                            {{ $type->id == $k ? 'selected' : '' }}
                                                            class="@error('m') is-invalid @enderror">
                                                            {!! Arr::get($m, 'name') !!}
                                                        </option>
                                                    @endif
                                                @endforeach
                                            @endif
                                        </select>
                                        @error('parent_id')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
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
                                        <input id="name_seo" type="text"
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
                                        <input id="alias" type="text"
                                            class="form-control @error('alias') is-invalid @enderror" name="alias"
                                            value="{{ old('alias') }}" required autocomplete="alias" autofocus>

                                        @error('alias')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label for="url" class="col-form-label text-md-right">
                                        {{ __('Url') }}
                                    </label>
                                    <div>
                                        <input id="url" type="text" class="form-control @error('url') is-invalid @enderror"
                                            name="url" value="{{ old('url') }}" required autocomplete="url" autofocus>

                                        @error('url')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <label for="icon" class="col-form-label text-md-right">
                                        {{ __('Icon') }}
                                    </label>
                                    <div>
                                        <input id="icon" type="text"
                                            class="form-control @error('icon') is-invalid @enderror" name="icon"
                                            value="{{ old('icon') }}" autocomplete="icon" autofocus>

                                        @error('icon')
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
                                            value="{{ old('priority') }}" required autocomplete="priority" autofocus>

                                        @error('priority')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div>
                                        <label for="status" class="col-form-label text-md-right">
                                            {{ __('Status') }}
                                        </label>
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

                                    <label for="floatingTextarea" class="col-form-label text-md-right">
                                        {{ 'Note' }}
                                    </label>
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Note here"
                                            id="floatingTextarea"></textarea>
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
