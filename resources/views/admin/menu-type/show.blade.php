<?php
$title = 'Menu Type - Show';
$head_table = ['Name', 'Alias', 'Status', 'Created At', 'Updated At', 'Action'];
?>
@section('title', $title)
    @extends('admin.layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ ('Menu Type') }}</h1>
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
                    <a href="{!! route('menu-type.index') !!}" class="float-right">Menu Types</a>
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
                            @if ($menuType)
                                <tr>
                                    <td>{!! $menuType->name !!}</td>
                                    <td>{!! $menuType->alias !!}</td>
                                    <td>
                                        @include('helper.stick', ['status' => $menuType->status,
                                        'id' => $menuType->id,
                                        'uri' => route('update.status', $menuType->id)])
                                    </td>
                                    <td>{!! $menuType->created_at !!}</td>
                                    <td>{!! $menuType->updated_at !!}</td>
                                    <td>
                                        @include('helper.action', ['t' => $menuType, 'uri' => 'menu-type'])
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('helper.be-crud')
