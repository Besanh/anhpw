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
        <div class="row">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Alias</th>
                            <th scope="col">Status</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Updated At</th>
                            <th scope="col">Manage</th>
                        </tr>
                    </thead>
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
                                        <a class="btn btn-success" href="{!! route('menu-type.edit', $t->id) !!}">
                                            <<i class="fa fa-paint-brush" aria-hidden="true"></i>
                                        </a>
                                        <a class="btn btn-warning" href="{!! route('menu-type', $t->id) !!}">
                                            <i class="fa fa-eye" aria-hidden="true"></i>
                                        </a>
                                        <a class="btn btn-danger" onclick="return confirm('Are you sure?')"
                                            href="{{ route('menu-type.destroy', $t->id) }}">
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
        <div class="row">{!! $menu_types->links() !!}</div>
    </div>
@endsection
