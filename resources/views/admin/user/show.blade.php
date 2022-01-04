<?php
$title = __('User - Show');
$head_table = [
'Id' => $user->id,
'Name' => $user->name,
'Email' => $user->email,
'Email Verified At' => $user->email_verified_at,
'Created At' => $user->created_at,
'Updated At' => $user->updated_at,
'Action' => '',
];
$main_link = 'user';
?>
@extends('admin.layouts.main')
@section('title', $title)

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('User' . ' - ' . $user->name) }}</h1>
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
                    <a href="{!! route($main_link . '.index') !!}" class="float-right">{{ __('Users') }}</a>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tbody>
                            @if ($user)
                                @foreach ($head_table as $head => $item)
                                    <tr>
                                        <th>{{ $head }}</th>
                                        <td>
                                            @if ($head == 'Action')
                                                @include('helper.action', ['uri' => $main_link, 'id' => $user->id])
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

        <div class="card-header border-bottom-primary">
            <div class="row">
                <div class="col-md- col-sm-12 col-xs-12">
                    <h3>{{ __('Profile') }}</h3>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tbody>
                            @if ($user)
                                <tr>
                                    <th>{{ __('Gender') }}</th>
                                    <td>
                                        {{ $user->getProfileAdmin->gender }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{ __('Fullname') }}</th>
                                    <td>
                                        {{ $user->getProfileAdmin->fullname }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{ __('Phone') }}</th>
                                    <td>
                                        {{ $user->getProfileAdmin->phone }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{ __('Avatar') }}</th>
                                    <td>
                                        {{ $user->getProfileAdmin->avatar }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{ __('Birthday') }}</th>
                                    <td>
                                        {{ $user->getProfileAdmin->birthday }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>{{ __('Address') }}</th>
                                    <td>
                                        {{ $user->getProfileAdmin->address }}
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
@include('helper.be-crud')
