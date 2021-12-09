<?php

$title = __('Contact - Index');
$head_table = ['#', 'Type', 'Rep ID', 'Name', 'Subject', 'Status', 'Created At', 'Updated At', 'Action'];
$main_link = 'contact';
?>
@extends('admin.layouts.main')
@section('title', $title)

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><a href="{{ route($main_link . '.index') }}">{{ __('Contact') }}</a></h1>
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
                            @if ($contacts)
                                @foreach ($contacts as $k => $node)
                                    <?php $k++; ?>
                                    <tr>
                                        <th scope="row">{!! $k !!}</th>
                                        <th>{{ $node->type }}</th>
                                        <td>{{ getUserName($node->rep_id) }}</td>
                                        <td>{{ $node->name }}</td>
                                        <td>{{ $node->subject }}</td>
                                        <td>
                                            @if ($node->status == 1)
                                                <i class="fa fa-check text-success"></i>
                                            @else
                                                <i class="fa fa-times text-danger"></i>
                                            @endif
                                        </td>
                                        <td>{{ $node->created_at }}</td>
                                        <td class="updated_at-{{ $node->id }}" data-id="{{ $node->id }}">
                                            {{ $node->updated_at }}
                                        </td>
                                        <td>
                                            <a class="btn btn-success"
                                                href="{{ route($main_link . '.chat', $node->id) }}">
                                                <i class="fa fa-comments" aria-hidden="true"></i>
                                            </a>
                                            <a class="btn btn-warning"
                                                href="{{ route($main_link . '.show', $node->id) }}">
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
