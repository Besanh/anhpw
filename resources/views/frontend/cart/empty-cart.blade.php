@extends('frontend.layouts.main')
@section('title', $title)

@section('content')
    <div class="container text-center g-py-100">
        <div class="mb-5">
            <span class="d-block g-color-gray-light-v1 g-font-size-70 g-font-size-90--md mb-4">
                <i class="icon-hotel-restaurant-105 u-line-icon-pro"></i>
            </span>
            @if ($notify && isJson($notify->value_setting))
                @foreach (json_decode($notify->value_setting, true) as $item)
                    <h2 class="g-mb-30">{!! Arr::get($item, 'title') !!}</h2>
                    {!! Arr::get($item, 'note') !!}
                @endforeach
            @endif
        </div>
        <a class="btn u-btn-primary g-font-size-12 text-uppercase g-py-12 g-px-25"
            href="{{ route('frontend.default') }}">{{ __('Start Shopping') }}</a>
    </div>
@endsection
@include('frontend.cart.stack-empty-cart')
