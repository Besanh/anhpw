<?php
$title = __('Dashboard'); ?>
@extends('admin.layouts.main')
@section('title', $title)
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $title }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        {!! __('Welcome <b>' . Auth::guard('admin')->user()->name . '</b>!') !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
