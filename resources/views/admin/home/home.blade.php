@php
use Illuminate\Support\Arr;

$title = __('Dashboard');
$total_view = 0;
foreach ($view as $v) {
    $total_view += $v->view;
}
@endphp
@extends('admin.layouts.main')
@section('title', $title)
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-info">{{ $title }}</h1>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                    class="fas fa-download fa-sm text-white-50"></i> {{ __('Generate Report') }}</a>
        </div>

        <!-- Content Row -->
        @include('admin.home.card-header')

        <!-- Content Row -->

        @include('admin.home.chart')

    </div>
    <!-- /.container-fluid -->
@endsection
@include('admin.home.stack')
