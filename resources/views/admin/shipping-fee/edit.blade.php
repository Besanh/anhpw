<?php
$title = __('Shipping Fee Edit');
$status = getStatus();
$main_link = 'shipping-fee';
?>
@section('title', $title)
    @extends('admin.layouts.main')
@section('content')
    <div class="container">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">{{ $title }}</h1>
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
                        <a href="{{ route($main_link . '.index') }}" class="float-right">{{ __('Shipping Fee') }}</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route($main_link . '.update', $shippingFee->id) }}">
                            @csrf
                            @method('PUT')

                            <div class="form-group row">
                                <label for="destination" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Destination') }}
                                </label>
                                <div class="col-md-6">
                                    <input id="destination" type="text"
                                        class="form-control @error('destination') is-invalid @enderror" name="destination"
                                        value="{{ old('destination', $shippingFee->destination) }}" required
                                        autocomplete="destination" autofocus>

                                    @error('destination')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="delivery_type" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Delivery Type') }}
                                </label>
                                <div class="col-md-6">
                                    <select name="delivery_type" class="form-control" aria-label="Default select" required>
                                        @foreach ($delivery_type as $k => $d)
                                            <option value="{!! $k !!}"
                                                {{ $shippingFee->delivery_type == $k ? 'selected' : '' }}
                                                class="@error('d') is-invalid @enderror">
                                                {!! $d !!}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('delivery_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="delivery_time" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Delivery Time') }}
                                </label>
                                <div class="col-md-6">
                                    <input id="delivery_time" type="text"
                                        class="form-control @error('delivery_time') is-invalid @enderror"
                                        name="delivery_time"
                                        value="{{ old('delivery_time', $shippingFee->delivery_time) }}" required
                                        autocomplete="delivery_time" autofocus>

                                    @error('delivery_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cost" class="col-md-4 col-form-label text-md-right">
                                    {{ __('Cost') }}
                                </label>
                                <div class="col-md-6">
                                    <input id="cost" type="text" class="form-control @error('cost') is-invalid @enderror"
                                        name="cost" value="{{ old('cost', $shippingFee->cost) }}" required
                                        autocomplete="cost" autofocus>

                                    @error('cost')
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
                                                {{ $shippingFee->status == $k ? 'selected' : '' }}
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
