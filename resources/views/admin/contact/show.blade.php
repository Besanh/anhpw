<?php
$title = __('Contact - Show');
$head_table = [
'Id' => $contact->id,
'Type' => $contact->type,
'Rep Id' => $contact->rep_id,
'Name' => $contact->name,
'Email' => $contact->email,
'Phone' => $contact->phone,
'Address' => $contact->address,
'Subject' => $contact->subject,
'Content' => $contact->content,
'Reply' => $contact->reply,
'Status' => $contact->status,
'Is Send Email' => $contact->is_send_email,
'Created At' => $contact->created_at,
'Updated At' => $contact->updated_at,
'Action' => '',
];
$main_link = 'contact';
?>
@extends('admin.layouts.main')
@section('title', $title)

@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">{{ __('Contact') }}</h1>
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
                    <a href="{!! route($main_link . '.index') !!}" class="float-right">{{ __('Contacts') }}</a>
                </div>
            </div>
        </div>
        <div class="card shadow mb-4">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tbody>
                            @if ($contact)
                                @foreach ($head_table as $head => $item)
                                    <tr>
                                        <th>{{ $head }}</th>
                                        <td>
                                            @if ($head == 'Action')
                                                <a class="btn btn-success"
                                                    href="{{ route($main_link . '.chat', $contact->id) }}">
                                                    <i class="fa fa-comments" aria-hidden="true"></i>
                                                </a>
                                                <a class="btn btn-warning"
                                                    href="{{ route($main_link . '.show', $contact->id) }}">
                                                    <i class="fa fa-eye" aria-hidden="true"></i>
                                                </a>
                                                <a class="delete-item btn btn-danger" data-id={{ $contact->id }}
                                                    onclick="return confirm('Are you sure?')"
                                                    href="{{ route($main_link . '.destroy', $contact->id) }}">
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
