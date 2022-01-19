<?php
$title = __('Subscriber - Show');
$head_table = [
'Id' => $subscriber->id,
'Email' => $subscriber->email,
'IP' => $subscriber->ip,
'Device' => $subscriber->device,
'Status' => $subscriber->status,
'Created By' => $subscriber->created_by,
'Updated By' => $subscriber->updated_by,
'Created At' => $subscriber->created_at,
'Updated At' => $subscriber->updated_at,
'Action' => '',
];
$main_link = 'subscriber';
?>
@extends('admin.layouts.main')
@section('title', $title)

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('Subscriber') }}</h1>
    </div>
    <div class="card mx-auto">
        <div class="card-header border-bottom-primary">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a href="{!! route($main_link . '.index') !!}" class="float-right">{{ __('Subscribers') }}</a>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tbody>
                            @if ($subscriber)
                                @foreach ($head_table as $head => $item)
                                    <tr>
                                        <th>{{ $head }}</th>
                                        <td>
                                            @if ($head == 'Action')
                                                <a class="btn btn-warning"
                                                    href="{{ route($main_link . '.show', $subscriber->id) }}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <a class="delete-item btn btn-danger" data-id={{ $subscriber->id }}
                                                    onclick="return confirm('Are you sure?')"
                                                    href="{{ route($main_link . '.destroy', $subscriber->id) }}">
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
