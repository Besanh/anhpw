<?php
$nodeitle = __('Menu Types');
$head_table = ['#', 'Name', 'Alias', 'Status', 'Created At', 'Updated At', 'Action'];
$main_link = 'menu-type';
?>
@extends('admin.layouts.main')
@section('title', $nodeitle)

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><a href="{{ route($main_link . '.index') }}">{{ __('Menu Types') }}</a></h1>
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
                            @if ($menu_types)
                                @foreach ($menu_types as $k => $node)
                                    <?php $k++; ?>
                                    <tr>
                                        <th scope="row">{!! $k !!}</th>
                                        <td>{!! $node->name !!}</td>
                                        <td>{!! $node->alias !!}</td>
                                        <td>
                                            @include('helper.stick', ['status' => $node->status,
                                            'id' => $node->id,
                                            'uri' => route($main_link.'.status', $node->id)])
                                        </td>
                                        <td>{!! $node->created_at !!}</td>
                                        <td class="updated_at-{{ $node->id }}" data-id="{{ $node->id }}">
                                            {!! $node->updated_at !!}
                                        </td>
                                        <td>
                                            @include('helper.action', ['id' => $node->id, 'uri' => $main_link])
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
