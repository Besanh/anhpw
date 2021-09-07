<?php
use App\Models\Menu;

$title = 'Menu - Index';
$head_table = ['#', 'Type', 'Name', 'Priority', 'Status', 'Action'];
$main_link = 'menu';
?>
@section('title', $title)
    @extends('admin.layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><a href="{{ route($main_link . '.index', $alias) }}">{{ 'Menus' }}</a></h1>
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
                    <a href="{!! route($main_link . '.create', $alias) !!}" class="float-right">Create</a>
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
                            @if ($model)
                                @foreach ($model as $k => $node)
                                    <?php $k++; ?>
                                    <tr>
                                        <th scope="row">{!! $k !!}</th>
                                        <th>{!! Menu::mapMenuType($node->type_id) !!}</th>
                                        <td>
                                            @if ($node->parent_id == 0)
                                                {!! $node->name !!}
                                            @else
                                                {!! str_repeat('&nbsp;', $node->level * 10) . '<i>' . $node->icon . '</i>' . $node->name !!}
                                            @endif
                                        </td>
                                        <td>{!! $node->priority !!}</td>
                                        <td>
                                            @include('helper.stick', ['status' => $node->status,
                                            'id' => $node->id,
                                            'uri' => route($main_link.'.status', $node->id)])
                                        </td>
                                        <td>
                                            <a class="btn btn-success"
                                                href="{{ route($main_link . '.edit', ['alias' => $alias, 'id' => $node->id]) }}">
                                                <i class="fa fa-paint-brush" aria-hidden="true"></i>
                                            </a>
                                            <a class="btn btn-warning"
                                                href="{{ route($main_link . '.show', ['alias' => $alias, 'id' => $node->id]) }}">
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
