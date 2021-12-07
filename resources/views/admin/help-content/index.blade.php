<?php

$title = __('Help Contents');
$head_table = ['#', 'Id', 'Title', 'Status', 'Created At', 'Updated At', 'Action'];
$main_link = 'help-content';
?>
@extends('admin.layouts.main')
@section('title', $title)

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><a
                href="{{ isset($help_id) ? route($main_link . '.view-topic', ['help_id' => $help_id]) : route($main_link . '.index') }}">{{ $title }}</a>
        </h1>
    </div>
    <div class="card mx-auto">
        @if (Session::has('message'))
            <div class="alert alert-success">
                {!! Session::get('message') !!}
            </div>
        @elseif(Session::has('message_error'))
            <div class="alert alert-danger">
                {!! Session::get('message_error') !!}
            </div>
        @endif
        <div class="card-header border-bottom-primary">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a href="{!! isset($help_id) ? route($main_link . '.create', ['help_id' => $help_id]) : route($main_link . '.create') !!}" class="float-right">
                        {{ __('Create') }}
                    </a>
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
                            @if ($help_contents)
                                @foreach ($help_contents as $k => $node)
                                    <?php $k++; ?>
                                    <tr>
                                        <th scope="row">{!! $k !!}</th>
                                        <th>{{ $node->id }}</th>
                                        <th>{!! $node->title !!}</th>
                                        <td>
                                            @include('helper.stick', ['status' => $node->status,
                                            'id' => $node->id,
                                            'uri' => route($main_link.'.status', $node->id)])
                                        </td>
                                        <td>{{ $node->created_at }}</td>
                                        <td class="updated_at-{{ $node->id }}" data-id="{{ $node->id }}">
                                            {{ $node->updated_at }}</td>
                                        <td>
                                            <a class="btn btn-success"
                                                href="{{ isset($help_id) ? route($main_link . '.edit', ['help_content' => $node->id, 'help_id' => $help_id]) : route($main_link . '.edit', $node->id) }}">
                                                <i class="fa fa-paint-brush" aria-hidden="true"></i>
                                            </a>
                                            <a class="btn btn-warning"
                                                href="{{ route($main_link . '.show', ['help_content' => $node->id, 'help_id' => $help_id]) }}">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            <a class="delete-item btn btn-danger" data-id={{ $node->id }}
                                                onclick="return confirm('Are you sure?')"
                                                href="{{ route($main_link . '.destroy', $node->id) }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
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
