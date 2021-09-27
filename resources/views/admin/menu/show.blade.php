<?php
$title = 'Menu - Show';
$head_table = [
'Id' => $menu->id,
'Parent Id' => $menu->parent_id,
'Type Id' => $menu->type_id,
'Name' => $menu->name,
'Name SEO' => $menu->name_seo,
'Alias' => $menu->alias,
'Route' => $menu->route,
'Url' => $menu->url,
'Icon' => $menu->icon,
'Note' => $menu->note,
'Priority' => $menu->priority,
'Status' => $menu->status,
'Created At' => $menu->created_at,
'Updated At' => $menu->updated_at,
'Created By' => $menu->created_by,
'Updated By' => $menu->updated_by,
'Action' => '',
];
?>
@section('title', $title)
    @extends('admin.layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ 'Menu' }}</h1>
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
                    <a href="{!! route('menu.index', $alias) !!}" class="float-right">Menu</a>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tbody>
                            @if ($menu)
                                @foreach ($head_table as $head => $item)
                                    <tr>
                                        <th>{{ $head }}</th>
                                        <td>
                                            @if ($head == 'Status')
                                                @include('helper.stick', ['status' => $item,
                                                'id' => $menu->id,
                                                'uri' => route('menu.status', $menu->id)])
                                            @elseif($head == 'Action')
                                                <a class="btn btn-success"
                                                    href="{{ route('menu.edit', ['alias' => $alias, 'id' => $menu->id]) }}">
                                                    <i class="fa fa-paint-brush" aria-hidden="true"></i>
                                                </a>
                                                <a class="btn btn-warning"
                                                    href="{{ route('menu.show', ['alias' => $alias, 'id' => $menu->id]) }}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <a class="delete-item btn btn-danger" data-id={{ $menu->id }}
                                                    onclick="return confirm('Are you sure?')"
                                                    href="{{ route('menu.destroy', $menu->id) }}">
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
