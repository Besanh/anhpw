@php
use Illuminate\Support\Arr;
$title = __('Alert Center');
$head_table = ['#', 'Type', 'Id', 'Read At', 'Created At', 'Action'];
$main_link = 'notification';
@endphp
@extends('admin.layouts.main')
@section('title', $title)

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><a href="{{ route($main_link . '.index') }}">{{ __('Alert center') }}</a></h1>
    </div>
    <div class="card mx-auto">
        @if (Session::has('message'))
            <div>
                <div class="alert alert-success">
                    {!! Session::get('message') !!}
                </div>
            </div>
        @elseif(Session::has('error'))
            <div>
                <div class="alert alert-danger">
                    {!! Session::get('error') !!}
                </div>
            </div>
        @endif
        @if ($errors->any())
            <div>
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        {!! $error !!}
                    @endforeach
                </div>
            </div>
        @endif
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="jumbotron form-group row">
                    <h1 class="display-5 col-md-12">
                        {{ __('Summary' . ':') }}
                        <hr class="my-4">
                    </h1>

                    @forelse ($type_notifications as $k => $item)
                        @switch($item->type)
                            @case('App\Notifications\SubscribeNotification')
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                    <div class="btn-icon-split">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-user-plus text-white"></i>
                                        </div>
                                        <span class="text">{{ __('Subscriber: ' . $item->count_type) }}</span>
                                    </div>
                                    <div class="my-2"></div>
                                </div>
                            @break
                            @case('App\Notifications\BillNotification')
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                    <div class="btn-icon-split">
                                        <div class="icon-circle bg-danger">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                        <span class="text">{{ __('Bill: ' . $item->count_type) }}</span>
                                    </div>
                                    <div class="my-2"></div>
                                </div>
                            @break
                            @case('App\Notifications\ContactNotification')
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                    <div class="btn-icon-split">
                                        <div class="icon-circle bg-success text-white">
                                            <i class="fa fa-info-circle"></i>
                                        </div>
                                        <span class="text">{{ __('Contact: ' . $item->count_type) }}</span>
                                    </div>
                                    <div class="my-2"></div>
                                </div>
                            @break
                            @case('App\Notifications\TaskNotification')
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                    <div class="btn-icon-split">
                                        <div class="icon-circle bg-info text-white">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                        <span class="text">{{ __('Task: ' . $item->count_type) }}</span>
                                    </div>
                                    <div class="my-2"></div>
                                </div>
                            @break
                            @default
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                    <div class="btn-icon-split">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                        <span class="text">{{ __('Spending Alert: ' . $item->count_type) }}</span>
                                    </div>
                                    <div class="my-2"></div>
                                </div>
                        @endswitch
                        @empty

                        @endforelse
                    </div>
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
                                @if ($notifications)
                                    @foreach ($notifications as $k => $node)
                                        @php
                                            $k++;
                                        @endphp
                                        <tr class="{{ $node->read_at ? '' : 'font-weight-bold' }}">
                                            <th scope="row">{!! $k !!}</th>
                                            <td>
                                                @switch($node->type)
                                                    @case('App\Notifications\SubscribeNotification')
                                                        <div class="icon-circle bg-primary">
                                                            <i class="fas fa-user-plus text-white"></i>
                                                        </div>
                                                    @break
                                                    @case('App\Notifications\BillNotification')
                                                        <div class="icon-circle bg-danger">
                                                            <i class="fas fa-donate text-white"></i>
                                                        </div>
                                                    @break
                                                    @case('App\Notifications\ContactNotification')
                                                        <div class="icon-circle bg-success text-white">
                                                            <i class="fa fa-info-circle"></i>
                                                        </div>
                                                    @break
                                                    @case('App\Notifications\TaskNotification')
                                                        <div class="icon-circle bg-info text-white">
                                                            <i class="fas fa-file-alt text-white"></i>
                                                        </div>
                                                    @break
                                                    @default
                                                        <div class="icon-circle bg-warning">
                                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                                        </div>
                                                @endswitch
                                            </td>
                                            <td>{!! Arr::get(json_decode($node->data, true), 'id') !!}</td>
                                            <td>{{ $node->read_at }}</td>
                                            <td>{{ $node->created_at }}</td>
                                            <td>
                                                <a class="btn btn-warning"
                                                    href="{{ route($main_link . '.show', Arr::get(json_decode($node->data, true), 'id')) }}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
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
