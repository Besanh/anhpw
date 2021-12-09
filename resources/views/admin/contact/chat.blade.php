<?php
$title = __('Contact - Chat');
$main_link = 'contact';
?>
@extends('admin.layouts.main')
@section('title', $title)

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    @if (Session::has('message'))
                        <div>
                            <div class="alert alert-success">
                                {!! Session::get('message') !!}
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
                    <div class="card-header">
                        {{ $title }}
                        <a href="{{ route($main_link . '.index') }}" class="float-right">{{ __('Contacts') }}</a>
                    </div>

                    <div class="card-body">
                        <form method="POST" action="{{ route($main_link . '.post-chat', $contact->id) }}">
                            @csrf

                            <div class="form-group row mb-5">
                                <div class="jumbotron col-md-12">
                                    <h1 class="display-4">{{ __('Subject: ' . $contact->subject) }}</h1>
                                    <hr class="my-4">
                                    <div class="form-check">
                                        <input id="form-contact-send-email" class="form-check-input" type="checkbox"
                                            value="1" name="is_send_email" checked>
                                        <label class="form-check-label" for="is_send_email_checked">
                                            {{ __('Notification email to customer') }}
                                        </label>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                    <div class="btn-icon-split">
                                        <span class="icon text-white-50" style="background: #169b6b">
                                            <i class="fa fa-info-circle"></i>
                                        </span>
                                        <span class="text">{{ __('Type: ' . $contact->type) }}</span>
                                    </div>
                                    <div class="my-2"></div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                    <div class="btn-icon-split">
                                        <span class="icon text-white-50" style="background: #169b6b">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <span class="text">{{ __('Name: ' . $contact->name) }}</span>
                                    </div>
                                    <div class="my-2"></div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                    <div class="btn-icon-split">
                                        <span class="icon text-white-50" style="background: #169b6b">
                                            <i class="fa fa-envelope"></i>
                                        </span>
                                        <span class="text">{{ __('Email: ' . $contact->email) }}</span>
                                    </div>
                                    <div class="my-2"></div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                    <div class="btn-icon-split">
                                        <span class="icon text-white-50" style="background: #169b6b">
                                            <i class="fa fa-phone"></i>
                                        </span>
                                        <span class="text">{{ __('Phone: ' . $contact->phone) }}</span>
                                    </div>
                                    <div class="my-2"></div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-lg-6">
                                    <div class="btn-icon-split">
                                        <span class="icon text-white-50" style="background: #169b6b">
                                            <i class="fa fa-location-arrow"></i>
                                        </span>
                                        <span class="text">{{ __('Address: ' . $contact->address) }}</span>
                                    </div>
                                    <div class="my-2"></div>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">{{ __('Content') }}</h6>
                                        </div>
                                        <div class="card-body">
                                            {{ $contact->content }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6">
                                    <div class="card shadow mb-4">
                                        <div class="card-header py-3">
                                            <h6 class="m-0 font-weight-bold text-primary">{{ __('Reply') }}</h6>
                                        </div>
                                        <div class="card-body">
                                            @if ($contact->reply)
                                                {!! $contact->reply !!}
                                            @else
                                                <textarea class="form-control" name="reply" rows="5"
                                                    placeholder="{{ __('Reply message from customer') }}"
                                                    autofocus>{{ old('reply') }}</textarea>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0 mt-5">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Save') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
