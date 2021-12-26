<?php
use Illuminate\Support\Arr;
use App\Models\Price;
use App\Models\BillDetail;

$title = __('Bill ' . '#' . Arr::get($billDetail, 'bill_id'));
$head_table = ['Bill Id', 'Channel Sale', 'Devices', 'Status', 'Created At', 'Updated At', 'Action'];
$main_link = 'bill';

$bill_customer = $billDetail->getCustomer($billDetail->getBill->id);
?>
@extends('admin.layouts.main')
@section('title', $title)
@section('content')
    <div class="card mx-auto">
        @if (Session::has('message'))
            <div class="alert alert-success">
                {!! Session::get('message') !!}
            </div>
        @elseif(Session::has('message_error'))
            <div class="alert alert-danger">
                {!! Session::get('message_error') !!}
            </div>
        @endif
        <div class="card">
            <div class="card-header border-bottom-primary">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        {{ __('Bill ' . ' #' . $billDetail->bill_id) }}
                    </div>
                </div>
            </div>

            <div class="row mt-5 m-0 text-danger">
                <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                    <h3 class="font-weight-bold">{{ __('Bill') }}</h3>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                    <h3 class="font-weight-bold">{{ __('Bill Customer') }}</h3>
                </div>
            </div>
            @include('admin.bill-detail.sub_files.bill')

            {{-- Shopping cart --}}
            <div class="row mt-5 m-0 text-danger">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <h3 class="font-weight-bold">{{ __('Products') }}</h3>
                </div>
            </div>
            @include('admin.bill-detail.sub_files.bill-item')

            <div class="row mt-5 m-0 text-danger">
                <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                    <h3 class="font-weight-bold">{{ __('Bill Detail') }}</h3>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                    <h3 class="font-weight-bold">{{ __('Shopping Cart') }}</h3>
                </div>
            </div>
            @include('admin.bill-detail.sub_files.bill-detail')

            <div class="row mt-5 m-0 text-danger">
                <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                    <h3 class="font-weight-bold">{{ __('Bill Consignee') }}</h3>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                    <h3 class="font-weight-bold">{{ __('Bill Invoice') }}</h3>
                </div>
            </div>

            @include('admin.bill-detail.sub_files.bill-consignee-invoice')
        </div>
    </div>
@endsection

@push('link-edit-table')
    <link rel="stylesheet" href="{{ asset('css/admin/bootstrap-editable.css') }}" />
@endpush
@push('script-edit-table')
    <script src="{{ asset('js/admin/bootstrap-editable.js') }}"></script>
    <script src="{{ asset('js/admin/bill-editable.js') }}"></script>
@endpush
