<?php
$title = __('User - Create');
$main_link = 'user';
?>
@extends('admin.layouts.main')
@section('title', $title)

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ __('User') }}</h1>
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
                    @elseif (Session::has('error'))
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
                        <a href="{{ route($main_link . '.index') }}" class="float-right">{{ __('Users') }}</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route($main_link . '.store') }}">
                            @csrf

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="name" class="col-form-label">
                                        {{ __('Username') }}
                                    </label>
                                    <div>
                                        <input id="username" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autofocus>

                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div>
                                        <label for="email" class="col-form-label">{{ __('Email') }}</label>
                                        <div>
                                            <input type="email" class="form-control @error('email') is-invalid @enderror"
                                                name="email" value="{{ old('email') }}" required autocomplete="email"
                                                autofocus>

                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <label for="password" class="col-form-label">{{ __('Password') }}</label>
                                        <div>
                                            <input id="password" type="password"
                                                class="form-control @error('password') is-invalid @enderror" name="password"
                                                value="{{ old('password') }}" required>

                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <label for="password_confirmation"
                                            class="col-form-label">{{ __('Password Confirmation') }}</label>
                                        <div>
                                            <input id="password_confirmation" type="password"
                                                class="form-control @error('password_confirmation') is-invalid @enderror"
                                                name="password_confirmation" value="{{ old('password_confirmation') }}"
                                                required autocomplete="password_confirmation">

                                            @error('password_confirmation')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <label for="email" class="col-form-label">{{ __('Roles') }}</label>
                                    <div>
                                        <select name="roles[]" class="form-control" multiple aria-label="Default select"
                                            required>
                                            @foreach ($roles as $k => $r)
                                                <option value="{!! $k !!}"
                                                    class="@error('roles') is-invalid @enderror">
                                                    {!! $r !!}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('roles')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div>
                                        <label for="gender" class="col-form-label">
                                            {{ __('Gender') }}
                                        </label>
                                        <div>
                                            <select name="gender" class="form-control">
                                                <option value="">{{ __('Choose Gender') }}</option>
                                                @foreach (arrayGender() as $k => $g)
                                                    <option value="{{ $k }}">{{ $g }}</option>
                                                @endforeach
                                            </select>

                                            @error('gender')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <label for="fullname" class="col-form-label">
                                            {{ __('Fullname') }}
                                        </label>
                                        <div>
                                            <input type="text"
                                                class="form-control form-control-user @error('fullname') is-invalid @enderror"
                                                name="fullname" value="{{ old('fullname') }}" required autofocus>
                                            @error('fullname')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <label for="phone" class="col-form-label">
                                            {{ __('Phone') }}
                                        </label>
                                        <div>
                                            <input type="text"
                                                class="form-control form-control-user @error('phone') is-invalid @enderror"
                                                name="phone" value="{{ old('phone') }}" required>
                                            @error('phone')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <label for="avatar" class="col-form-label">
                                            {{ __('Avatar') }}
                                        </label>
                                        <div class="col-md-12">
                                            <input type="file" class="custom-file-input form-control form-control-user"
                                                name="avatar">
                                            <label class="custom-file-label">{{ __('Avatar') }}</label>
                                            @error('avatar')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <label for="birthday" class="col-form-label">
                                            {{ __('Birthday') }}
                                        </label>
                                        <div>
                                            <input id="birthday" type="text"
                                                class="datepicker form-control form-control-user @error('birthday') is-invalid @enderror"
                                                name="birthday" value="{{ old('birthday') }}" required>
                                            @error('birthday')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div>
                                        <label for="address" class="col-form-label">
                                            {{ __('Address') }}
                                        </label>
                                        <div>
                                            <textarea class="form-control @error('address') is-invalid @enderror"
                                                name="address" value="{{ old('address') }}"
                                                required>{{ old('address') }}</textarea>
                                            @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4 text-center">
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
@include('helper.datetimepicker')
