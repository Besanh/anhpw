<?php

$title = __('Bill - Index');
$head_table = [
'#',
'Bill No',
'Total Price',
'Total Discount',
'Total Cost',
'Total Tax',
'Payment',
'Status',
'Created
At',
'Updated At',
'Action',
];
$main_link = 'brand';
?>
@section('title', $title)
    @extends('admin.layouts.main')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><a href="{{ route($main_link . '.index') }}">{{ __('Bills') }}</a></h1>
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
                            @if ($bills)
                                @foreach ($bills as $k => $node)
                                    <?php $k++; ?>
                                    <tr>
                                        <td>{{ $node->id }}</td>
                                        <td>{!! $node->bill_no !!}</td>
                                        <td>{{ $node->total_price }}</td>
                                        <td>{{ $node->total_discount }}</td>
                                        <td>{{ $node->total_cost }}</td>
                                        <td>{{ $node->total_tax }}</td>
                                        <td>{{ $node->payment }}</td>
                                        <td>
                                            {{ $node->getBillDetail->status }}
                                        </td>
                                        <td>{{ $node->created_at }}</td>
                                        <td class="updated_at-{{ $node->id }}" data-id="{{ $node->id }}">
                                            {{ $node->updated_at }}</td>
                                        <td>
                                            <a class="btn btn-warning" href="{{ route('bill-detail.show', $node->id) }}">
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
