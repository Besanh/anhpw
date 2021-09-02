<?php
$title = 'Menu Type - Index'; ?>
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
        <div class="card-header">
            <div class="row">
                <div class="col-md-9 col-sm-9 col-xs-9">
                    <form action="{{ route('menu-type.index') }}" method="GET">
                        <div class="row form-grow align-items-center">
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <input type="search" name="search" class="form-control mb-2" id="inlineFormInput"
                                    placeholder="Search menu type" />
                            </div>
                            <div class="col-md-3 col-sm-3 col-xs-3">
                                <button type="submit" class="btn btn-primary mb-2">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-3 col-sm-3 col-xs-9">
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
                                <th>#</th>
                                <th>Name</th>
                                <th>Alias</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Alias</th>
                                <th>Status</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                                <th>Action</th>
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
                                        <td>{!! $t->status !!}</td>
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
