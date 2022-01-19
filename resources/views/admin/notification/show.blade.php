@php
use Illuminate\Support\Arr;
$title = __('Alert Center - Show');
$head_table = [
    'Id' => Arr::get(json_decode($notification->data, true), 'id'),
    'Type' => $notification->type,
    'Notifiable Type' => $notification->notifiable_type,
    'Notifiable Id' => $notification->notifiable_id,
    'Data' => $notification->data,
    'Read At' => $notification->read_at,
    'Created At' => $notification->created_at,
    'Updated At' => $notification->updated_at,
];
$main_link = 'notification';
@endphp
@extends('admin.layouts.main')
@section('title', $title)

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __($notification->name) }}</h1>
    </div>
    <div class="card mx-auto">
        <div class="card-header border-bottom-primary">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a href="{!! route($main_link . '.index') !!}" class="float-right">{{ __('Alert center') }}</a>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tbody>
                            @if ($notification)
                                @foreach ($head_table as $head => $item)
                                    <tr>
                                        <th>{{ $head }}</th>
                                        <td>
                                            {{ $item }}
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
