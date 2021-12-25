<?php

$title = __('Permissions - Index');
$head_table = ['#', 'Name', 'Guard Name', 'Created At', 'Updated At', 'Action'];
$main_link = 'permission';
?>
@extends('admin.layouts.main')
@section('title', $title)

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><a href="{{ route($main_link . '.index') }}">{{ __('Permissions') }}</a></h1>
    </div>
    <div class="card mx-auto">
        @if (Session::has('message'))
            <div>
                <div class="alert alert-success">
                    {!! Session::get('message') !!}
                </div>
            </div>
        @elseif(Session::has('message_error'))
            <div>
                <div class="alert alert-danger">
                    {!! Session::get('message_error') !!}
                </div>
            </div>
        @endif
        <div class="card-header border-bottom-primary">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a href="{!! route($main_link . '.create') !!}" class="float-right">{{ __('Create') }}</a>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                @include('helper.head-table', compact('head_table'))
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                @include('helper.head-table', compact('head_table'))
                            </tr>
                        </tfoot>
                        <tbody>
                            @if ($permissions)
                                @foreach ($permissions as $k => $node)
                                    <?php $k++; ?>
                                    <tr>
                                        <th scope="row">{!! $k !!}</th>
                                        <th>{!! $node->name !!}</th>
                                        <th>{{ $node->guard_name }}</th>
                                        <td>{{ $node->created_at }}</td>
                                        <td>{{ $node->updated_at }}</td>
                                        <td>
                                            @include('helper.action', ['uri' => $main_link, 'id' => $node->id])
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('helper.be-crud')
