<?php

$title = __('Bill Invoices');
$head_table = ['#', 'Bill Id', 'Company', 'Taxcode', 'Email', 'Phone', 'Address', 'Note', 'Created At', 'Updated At'];
$main_link = 'bill-invoice';
?>
@extends('admin.layouts.main')
@section('title', $title)

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <a href="{{ route($main_link . '.index') }}">{{ $title }}</a>
        </h1>
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
                            @if ($invoices)
                                @foreach ($invoices as $k => $node)
                                    <?php $k++; ?>
                                    <tr>
                                        <td>{{ $node->id }}</td>
                                        <th>{!! $node->bill_id !!}</th>
                                        <td>{{ $node->company }}</td>
                                        <td>{{ $node->taxcode }}</td>
                                        <td>{{ $node->email }}</td>
                                        <td>{{ $node->phone }}</td>
                                        <td>{{ $node->address }}</td>
                                        <td>{{ $node->note }}</td>
                                        <td class="created_at-{{ $node->id }}" data-id="{{ $node->id }}">
                                            {{ $node->created_at }}
                                        </td>
                                        <td class="updated_at-{{ $node->id }}" data-id="{{ $node->id }}">
                                            {{ $node->updated_at }}
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
