<?php
$title = __('Profile - Edit');
$status = getStatus();
$main_link = 'profile';
?>
@extends('admin.layouts.main')
@section('title', $title)

@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ __('Profile #') . $profile->name }}</h1>
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
                            <div class="alert alert-success">
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
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route($main_link . '.update', $profile->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <div class="col-md-12">
                                    <div>
                                        <label for="gender" class="col-form-label">
                                            {{ __('Gender') }}
                                        </label>
                                        <div>
                                            <select name="gender" class="form-control">
                                                <option value="">{{ __('Choose Gender') }}</option>
                                                @foreach (arrayGender() as $k => $g)
                                                    <option value="{{ $k }}"
                                                        {{ $k == $profile->gender ? 'selected' : '' }}>
                                                        {{ $g }}</option>
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
                                                name="fullname"
                                                value="{{ old('fullname', $profile->fullname) }}"
                                                required>
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
                                                name="phone" value="{{ old('phone', $profile->phone) }}"
                                                required>
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
                                                name="birthday"
                                                value="{{ old('birthday', $profile->birthday) }}"
                                                required>
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
                                                required>{{ old('address', $profile->address) }}</textarea>
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
                                <div class="col-md-12">
                                    <div class="border border-danger mb-5 pt-5 pb-5">
                                        <img src="{{ $profile->avatar }}"
                                            class="rounded mx-auto d-block" width="200" height="200">
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
@include('helper.datetimepicker')
