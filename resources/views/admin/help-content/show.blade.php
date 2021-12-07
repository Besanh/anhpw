<?php
$title = $helpContent->title;
$head_table = [
'Id' => $helpContent->id,
'Help Id' => $helpContent->help_id,
'Title' => $helpContent->title,
'Content' => $helpContent->content,
'Priority' => $helpContent->priority,
'Status' => $helpContent->status,
'Created By' => $helpContent->created_by,
'Updated By' => $helpContent->updated_by,
'Created At' => $helpContent->created_at,
'Updated At' => $helpContent->updated_at,
'Action' => '',
];
$main_link = 'help-content';
?>
@extends('admin.layouts.main')
@section('title', $title)

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __($title) }}</h1>
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
                    <a href="{{ isset($help_id) ? route($main_link . '.view-topic', ['help_id' => $help_id]) : route($main_link . '.index') }}"
                        class="float-right">{{ __('Help Contents') }}</a>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tbody>
                            @if ($helpContent)
                                @foreach ($head_table as $head => $item)
                                    <tr>
                                        <th>{{ $head }}</th>
                                        <td>
                                            @if ($head == 'Action')
                                                <a class="btn btn-success"
                                                    href="{{ isset($help_id) ? route($main_link . '.edit', ['help_content' => $helpContent->id, 'help_id' => $help_id]) : route($main_link . '.edit', $helpContent->id) }}">
                                                    <i class="fa fa-paint-brush" aria-hidden="true"></i>
                                                </a>
                                                <a class="btn btn-warning"
                                                    href="{{ route($main_link . '.show', ['help_content' => $helpContent->id, 'help_id' => $help_id]) }}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <a class="delete-item btn btn-danger" data-id={{ $helpContent->id }}
                                                    onclick="return confirm('Are you sure?')"
                                                    href="{{ route($main_link . '.destroy', $helpContent->id) }}">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            @else
                                                {{ $item }}
                                            @endif
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
