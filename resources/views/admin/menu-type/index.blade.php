<?php
$title = 'Menu Type - Index';
$head_table = ['#', 'Name', 'Alias', 'Status', 'Created At', 'Updated At', 'Action'];
?>
@section('title', $title)
    @extends('admin.layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><a href="{{ route('menu-type.index') }}">{{ 'Menu Types' }}</a></h1>
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
                    <a href="{!! route('menu-type.create') !!}" class="float-right">Create</a>
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
                                @foreach ($menu_types as $k => $t)
                                    <?php $k++; ?>
                                    <tr>
                                        <th scope="row">{!! $k !!}</th>
                                        <td>{!! $t->name !!}</td>
                                        <td>{!! $t->alias !!}</td>
                                        <td>
                                            @include('helper.stick', ['status' => $t->status,
                                            'id' => $t->id,
                                            'uri' => route('update.status', $t->id)])
                                        </td>
                                        <td>{!! $t->created_at !!}</td>
                                        <td>{!! $t->updated_at !!}</td>
                                        <td>
                                            @include('helper.action', ['t' => $t, 'uri' => 'menu-type'])
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
