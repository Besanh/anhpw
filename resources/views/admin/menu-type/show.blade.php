<?php
$title = 'Menu Type - Show';
$head_table = [
'Id' => $menuType->id,
'Name' => $menuType->name,
'Alias' => $menuType->alias,
'Note' => $menuType->note,
'Status' => $menuType->status,
'Created At' => $menuType->created_at,
'Updated At' => $menuType->updated_at,
'Created By' => $menuType->created_by,
'Updated By' => $menuType->updated_by,
'Action' => '',
];
?>
@section('title', $title)
    @extends('admin.layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ 'Menu Type' }}</h1>
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
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tbody>
                            @if ($menuType)
                                @foreach ($head_table as $head => $item)
                                    <tr>
                                        <th>{{ $head }}</th>
                                        <td>
                                            @if ($head == 'Status')
                                                @include('helper.stick', ['status' => $item,
                                                'id' => $menuType->id,
                                                'uri' => route('menu.status', $menuType->id)])
                                            @elseif($head == 'Action')
                                                <a class="btn btn-success"
                                                    href="{{ route('menu-type.edit', $menuType->id) }}">
                                                    <i class="fa fa-paint-brush" aria-hidden="true"></i>
                                                </a>
                                                <a class="btn btn-warning"
                                                    href="{{ route('menu-type.show', $menuType->id) }}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <a class="delete-item btn btn-danger" data-id={{ $menuType->id }}
                                                    onclick="return confirm('Are you sure?')"
                                                    href="{{ route('menu-type.destroy', $menuType->id) }}">
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
