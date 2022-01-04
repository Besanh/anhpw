<?php
$title = __('Profile - Show');
$head_table = [
'Id' => $profile->id,
'Fullname' => $profile->fullname,
'Phone' => $profile->phone,
'Address' => $profile->address,
'Birthday' => $profile->birthday,
'Gender' => $profile->gender,
'Avatar' => $profile->avatar,
'Created By' => $profile->created_by,
'Updated By' => $profile->updated_by,
'Created At' => $profile->created_at,
'Updated At' => $profile->updated_at,
'Action' => '',
];
$main_link = 'profile';
?>
@extends('admin.layouts.main')
@section('title', $title)

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('Profile #') . $profile->fullname }}</h1>
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
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tbody>
                            @if ($profile)
                                @foreach ($head_table as $head => $item)
                                    <tr>
                                        <th>{{ $head }}</th>
                                        <td>
                                            @if ($head == 'Action')
                                                <a class="btn btn-success" href="{{ route($main_link . '.edit', $profile->id) }}">
                                                    <i class="fa fa-paint-brush" aria-hidden="true"></i>
                                                </a>
                                                <a class="btn btn-warning" href="{{ route($main_link . '.show', $profile->id) }}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
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
