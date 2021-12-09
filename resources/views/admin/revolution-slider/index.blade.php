<?php

$title = __('Revolution Slider');
$head_table = ['#', 'Image', 'Status', 'Start Date', 'End Date', 'Action'];
$main_link = 'revolution-slider';
?>
@extends('admin.layouts.main')
@section('title', $title)

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><a href="{{ route($main_link . '.index') }}">{{ $title }}</a></h1>
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
                    <button class="save-sort btn btn-success" data-href="{{ route($main_link . '.sort-slide') }}">
                        {{ __('Save Sort') }}
                    </button>
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
                        <tbody class="sort-table">
                            @if ($sliders)
                                @foreach ($sliders as $k => $node)
                                    <?php $k++; ?>
                                    <tr data-id="{{ $k }}" data-node="{{ $node->id }}">
                                        <th scope="row">{!! $k !!}</th>
                                        <th>
                                            <img class="rounded mx-auto d-block img img-fluid" src="{{ $node->image }}"
                                                alt="Banner {{ $node->id }}" />
                                        </th>
                                        <td>
                                            @include('helper.stick', ['status' => $node->status,
                                            'id' => $node->id,
                                            'uri' => route($main_link.'.status', $node->id)])
                                        </td>
                                        <td>
                                            {{ $node->start_date }}
                                        </td>
                                        <td>
                                            {{ $node->end_date }}
                                        <td>
                                            @include('helper.action', ['uri' => $main_link, 'id' => $node->id])
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
@push('jquery-ui')
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet" />
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
    <script>
        $(function() {
            var token = $('meta[name="csrf-token"]').attr('content');
            $('.sort-table').sortable();
            $('.save-sort').on('click', function() {
                var img_list = [];
                $('.sort-table tr').each(function() {
                    var id = $(this).attr('data-node');
                    if (id) {
                        var priority = $(this).data('id')
                        img_list.push({
                            'id': id,
                            'priority': priority
                        })
                    }
                })
                $.ajax({
                    url: $('.save-sort').attr('data-href'),
                    type: 'post',
                    data: {
                        _token: token,
                        data: img_list
                    },
                    'dataType': 'json',
                    success: function(response) {
                        alert(response.msg);
                        location.reload();
                    }
                }).always(function(XHR, textStatus, errorThrown) {
                    if (textStatus != 'success') {
                        console.log(XHR);
                    }
                });
            })
        });

    </script>
@endpush
