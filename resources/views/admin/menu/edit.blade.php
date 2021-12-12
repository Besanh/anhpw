<?php
use App\Models\Menu;

$title = __('Menu - Edit');
$status = getStatus();
$main_link = 'menu';
?>
@extends('admin.layouts.main')
@section('title', $title)

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ __('Menu') }}</h1>
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
                    @elseif(Session::has('error'))
                        <div>
                            <div class="alert alert-danger">
                                {!! Session::get('error') !!}
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
                        <a href="{{ route($main_link . '.index', $alias) }}" class="float-right">{{ __('Menus') }}</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route($main_link . '.update', $menu->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-4">
                                    <label for="parent_id" class="col-form-label text-md-right">{{ __('Parent') }}</label>
                                    <div>
                                        <select name="parent_id" class="form-control" aria-label="Default select" required
                                            size="4">
                                            <option value="0" selected>
                                                {{ __('ROOT') }}
                                            </option>
                                            @if ($menu_list)
                                                @foreach ($menu_list as $k => $m)
                                                    <option value="{!! $k !!}"
                                                        {{ $k == $menu->parent_id ? 'selected' : '' }}
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
                                                            {{ $menu->type_id == $k ? 'selected' : '' }}
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

                                    <label for="route" class="col-form-label text-md-right">
                                        {{ __('Route') }}
                                    </label>
                                    <div>
                                        <input id="route" type="text"
                                            class="form-control @error('route') is-invalid @enderror" name="route"
                                            value="{{ old('route', $menu->route) }}" autocomplete="route" autofocus>

                                        @error('route')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label for="head" class="col-form-label text-md-right">
                                        {{ __('Head') }}
                                    </label>
                                    <div>
                                        <input id="head" type="text"
                                            class="form-control @error('head') is-invalid @enderror" name="head"
                                            value="{{ old('head', $menu->head) }}" autocomplete="head" autofocus>

                                        @error('head')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4 mb-5">
                                    <label for="name" class="col-form-label text-md-right">
                                        {{ __('Name') }}
                                    </label>
                                    <div>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name', $menu->name) }}" required autocomplete="name"
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
                                            value="{{ old('name_seo', $menu->name_seo) }}" required
                                            autocomplete="name_seo" autofocus>

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
                                            value="{{ old('alias', $menu->alias) }}" required autocomplete="alias"
                                            autofocus>

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
                                            name="url" value="{{ old('url', $menu->url) }}" required autocomplete="url"
                                            autofocus>

                                        @error('url')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <label for="image" class="col-form-label text-md-right" data-toggle="tooltip"
                                        data-placement="top" title="700x700">
                                        {{ __('Image') }}
                                    </label>
                                    <div class="custom-file" data-toggle="tooltip" data-placement="top" title="700x700">
                                        <input type="file" name="image" class="custom-file-input" id="image"
                                            accept="image/png, image/gif, image/jpeg">
                                        <label class="custom-file-label" for="image">
                                            {{ $menu->image ? $menu->image : 'Choose file' }}
                                        </label>
                                    </div>
                                    @if ($menu->image)
                                        <div>
                                            <img src="{{ getImage($menu->image) }}" class="rounded mx-auto d-block"
                                                alt="{{ $menu->name }}" width="200" height="200">
                                        </div>
                                    @endif
                                </div>

                                <div class="col-md-4">
                                    <label for="icon" class="col-form-label text-md-right">
                                        {{ __('Icon') }}
                                    </label>
                                    <div>
                                        <input id="icon" type="text"
                                            class="form-control @error('icon') is-invalid @enderror" name="icon"
                                            value="{{ old('icon', $menu->icon) }}" autocomplete="icon" autofocus>

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
                                            value="{{ old('priority', $menu->priority) }}" required
                                            autocomplete="priority" autofocus>

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
                                                    {{ $k == $menu->status ? 'selected' : '' }}
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
                                        <textarea class="form-control" name="note" placeholder="Note here"
                                            id="floatingTextarea">{{ old('note', $menu->note) }}</textarea>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label for="content" class="col-form-label text-md-right">{{ __('Content') }}</label>

                                <div>
                                    <div class="form-group">
                                        <textarea class="form-control" name="content">{!! $menu->content !!}</textarea>
                                    </div>
                                    @error('content')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row mb-0">
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