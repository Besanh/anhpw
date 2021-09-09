<?php
$title = 'District - Show';
$head_table = [
'Id' => $district->id,
'Province' => $district->province_id,
'Name' => $district->name,
'Status' => $district->stats,
'Note' => $district->note,
'Created At' => $district->created_at,
'Updated At' => $district->updated_at,
'Action' => '',
];
$main_link = 'district';
?>
@section('title', $title)
    @extends('admin.layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ 'District' }}</h1>
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
                    <a href="{!! route($main_link . '.index') !!}" class="float-right">Districts</a>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <tbody>
                            @if ($district)
                                @foreach ($head_table as $head => $item)
                                    <tr>
                                        <th>{{ $head }}</th>
                                        <td>
                                            @if ($head == 'Action')
                                                <a class="btn btn-success"
                                                    href="{{ route($main_link . '.edit', $district->id) }}">
                                                    <i class="fa fa-paint-brush" aria-hidden="true"></i>
                                                </a>
                                                <a class="btn btn-warning"
                                                    href="{{ route($main_link . '.show', $district->id) }}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <a class="delete-item btn btn-danger" data-id={{ $district->id }}
                                                    onclick="return confirm('Are you sure?')"
                                                    href="{{ route($main_link . '.destroy', $district->id) }}">
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
