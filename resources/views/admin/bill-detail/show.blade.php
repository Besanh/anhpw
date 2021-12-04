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
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">
            <a href="{{ route($main_link . '.index') }}">{{ __('Bill Detail') }}</a>
        </h1>
    </div>
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
                    <h3 class="font-weight-bold">{{ __('Bill Detail') }}</h3>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                    <h3 class="font-weight-bold">{{ __('Shopping Cart') }}</h3>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <table id="collapse1" class="table table-hover box-body text-wrap table-bordered shadow">
                        <tbody>
                            <tr>
                                <td class="td-title">{{ __('Bill Id') }}:</td>
                                <td>{{ $billDetail->bill_id }}</td>
                            </tr>
                            <tr>
                                <td class="td-title">{{ __('Channel Sale') }}:</td>
                                <td>
                                    <a href="#" class="bill-editable editable editable-click" data-name="channel_sale"
                                        data-type="select" data-pk="{{ $billDetail->id }}"
                                        data-title="{{ __('Channel Sale') }}"
                                        data-value="{{ $billDetail->channel_sale }}"
                                        data-url="{{ route('bill-detail.editable-detail') }}"
                                        data-source="{{ json_encode(BillDetail::$channel) }}">
                                        {{ $billDetail->channel_sale }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-title">{{ __('Devices') }}:</td>
                                <td>{{ $billDetail->devices }}</td>
                            </tr>
                            <tr>
                                <td class="td-title">{{ __('Status') }}:</td>
                                <td class="text-center">
                                    <a href="#" class="bill-select-status-editable editable editable-click"
                                        data-name="status" data-type="select" data-pk="{{ $billDetail->id }}"
                                        data-title="{{ __('Status') }}" data-value="{{ $billDetail->status }}"
                                        data-url="{{ route('bill-detail.editable-detail') }}"
                                        data-source="{{ BillDetail::getStatusJson() }}">
                                        {!! BillDetail::getStatus($billDetail->status) !!}
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-6">
                    <table class="table table-hover box-body text-wrap table-bordered shadow">
                        <tbody>
                            <tr>
                                <td class="td-title">{{ __('Identifier') }}:</td>
                                <td>{{ $billDetail->getShoppingCart->identifier }}</td>
                            </tr>
                            <tr>
                                <td class="td-title">{{ __('Instance') }}:</td>
                                <td>{{ $billDetail->getShoppingCart->instance }}</td>
                            </tr>
                            <tr>
                                <td class="td-title">{{ __('Created At') }}:</td>
                                <td>{{ $billDetail->getShoppingCart->created_at }}</td>
                            </tr>
                            <tr>
                                <td class="td-title">{{ __('Updated At') }}:</td>
                                <td>{{ $billDetail->getShoppingCart->updated_at }}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table class="table table-hover box-body text-wrap table-bordered shadow">
                        <tbody>
                            <tr>
                                <td class="td-title">{{ __('$ Currency') }}:
                                </td>
                                <td class="text-center">
                                    <div class="bg-info text-white p-3 rotate-15 d-inline-block my-4">
                                        {{ __('VND') }}
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-title"><i class="fas fa-chart-line"></i> {{ __('Exchange Rate') }}:</td>
                                <td>1</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            {{-- Shopping cart --}}
            <div class="row mt-5 m-0 text-danger">
                <div class="col-md-12 col-sm-12 col-xs-12 text-center">
                    <h3 class="font-weight-bold">{{ __('Products') }}</h3>
                </div>
            </div>
            <form id="form-add-item" action="" method="POST">
                @csrf
                <div class="table-responsive">
                    <table class="table table-hover box-body text-wrap table-bordered shadow">
                        <thead>
                            <tr>
                                <th>{{ __('Id') }}</th>
                                <th>{{ __('SKU Code') }}</th>
                                <th>{{ __('Quantity') }}</th>
                                <th class="product_name">{{ __('Name') }}</th>
                                <th class="product_price">{{ __('Price') }}</th>
                                <th class="product_discount">{{ __('Discount') }}</th>
                                <th class="product-tax">{{ __('Tax') }}</th>
                                <th class="product_tax">{{ __('Cost') }}</th>
                                <th class="product_note">{{ __('Note') }}</th>
                                <th>{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $data = unserialize($billDetail->getShoppingCart->content); ?>
                            @if ($data)
                                @foreach ($data as $item)
                                    <tr>
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->options->barcode }}</td>
                                        <td>
                                            <a href="#" class="edit-item-detail editable editable-click"
                                                data-value="{{ $item->qty }}" data-name="qty" data-type="number" min="0"
                                                data-pk="{{ $billDetail->bill_id }}" data-url=""
                                                data-title="{{ __('Qty') }}">
                                                {{ $item->qty }}
                                            </a>
                                        </td>
                                        <td>
                                            {{ $item->name . ' - ' . $item->options->capa . ' ' . getCapaName($item->options->capa_id) }}
                                        </td>
                                        <td><a href="#" class="edit-item-detail editable editable-click"
                                                data-value="{{ $item->price }}" data-name="price" data-type="number"
                                                min="0" data-pk="{{ $billDetail->bill_id }}" data-url=""
                                                data-title="{{ __('Price') }}">
                                                {{ $item->price }}
                                            </a>
                                        </td>
                                        <td><a href="#" class="edit-item-detail editable editable-click"
                                                data-value="{{ $item->options->discount }}" data-name="discount"
                                                data-type="number" min="0" data-pk="53" data-url=""
                                                data-title="{{ __('Discount') }}">
                                                {{ $item->options->discount }}
                                            </a>
                                        </td>
                                        <td><a href="#" class="edit-item-detail editable editable-click"
                                                data-value="{{ $item->options->taxtRate }}" data-name="taxRate"
                                                data-type="number" min="0" data-pk="53" data-url=""
                                                data-title="{{ __('taxRate') }}">
                                                {{ $item->options->taxtRate }}
                                            </a>
                                        </td>
                                        <td>
                                            <a href="#" class="edit-item-detail editable editable-click"
                                                data-value="{{ $item->price - $item->options->discount }}"
                                                data-name="cost" data-type="number" min="0" data-pk="53" data-url=""
                                                data-title="{{ __('cost') }}">
                                                {{ $item->price - $item->options->discount }}
                                            </a>
                                        </td>
                                        <td>{{ $item->options->note }}</td>
                                        <td>
                                            <span onclick="" class="btn btn-danger btn-xs"
                                                data-title="{{ __('Delete') }}">
                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                            </span>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            <tr id="add-item" class="not-print">
                                <td colspan="10">
                                    <button type="button" class="btn btn-flat btn-success" id="add-item-button"
                                        title="{{ __('Add new') }}"><i class="fa fa-plus"></i>
                                        {{ __('Add new') }}</button>
                                    &nbsp;&nbsp;&nbsp;<button style="display: none; margin-right: 50px" type="button"
                                        class="btn btn-flat btn-warning" id="add-item-button-save" title="Save"><i
                                            class="fa fa-save"></i> {{ __('Save') }}</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </form>

            <div class="row mt-5 m-0 text-danger">
                <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                    <h3 class="font-weight-bold">{{ __('Bill') }}</h3>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                    <h3 class="font-weight-bold">{{ __('Bill Customer') }}</h3>
                </div>
            </div>
            <div class="row">
                {{-- Bill --}}
                <div class="col-sm-6">
                    <table class="table table-hover box-body text-wrap table-bordered shadow">
                        <tbody>
                            <tr>
                                <td class="td-title-normal">{{ __('Bill No') }}:</td>
                                <td style="text-align:right" class="data-subtotal">
                                    {{ $billDetail->getBill->bill_no }}
                                </td>
                            </tr>
                            <tr>
                                <td class="td-title-normal">{{ __('Total Price') }}:</td>
                                <td style="text-align:right" class="data-tax">{{ $billDetail->getBill->total_price }}
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __('Total Discount') }}:</td>
                                <td style="text-align:right">{{ $billDetail->getBill->total_discount }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Total Tax') }}:</td>
                                <td style="text-align:right">
                                    {{ $billDetail->getBill->total_tax }}
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __('Shipping Cost') }}:</td>
                                <td style="text-align:right">
                                    {{ $billDetail->getBill->shipping_cost }}
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __('Payment') }}:</td>
                                <td style="text-align:right">{{ $billDetail->getBill->payment }}</td>
                            </tr>
                            <tr>
                                <td>{{ __('Note') }}:</td>
                                <td style="text-align:right">{{ $billDetail->getBill->note }}</td>
                            </tr>
                            <tr style="color:#0e9e33;font-weight: bold;">
                                <td>
                                    {{ __('Total Cost') }}
                                </td>
                                <td style="text-align:right">{{ $billDetail->getBill->total_cost }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- Bill Customer --}}
                <div class="col-sm-6">
                    <table class="table table-hover box-body text-wrap table-bordered shadow">
                        <tbody>
                            <tr>
                                <td class="td-title-normal">{{ __('Full Name') }}:</td>
                                <td style="text-align:right" class="data-subtotal">
                                    <a href="#" class="bill-editable edit-item-detail editable editable-click"
                                        data-value="{{ $bill_customer->fullname }}" data-name="fullname" data-type="text"
                                        data-pk="{{ $bill_customer->id }}"
                                        data-url="{{ route('bill-detail.editable-customer') }}"
                                        data-title="{{ __('Full Name') }}">{{ $bill_customer->fullname }}</a>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-title-normal">{{ __('Gender') }}:</td>
                                <td style="text-align:right" class="data-tax">
                                    <a href="#" class="bill-select-editable edit-item-detail editable editable-click"
                                        data-value="{{ $bill_customer->gender }}" data-name="gender" data-type="select"
                                        data-pk="{{ $billDetail->id }}"
                                        data-url="{{ route('bill-detail.editable-customer') }}"
                                        data-source="{{ BillDetail::getGenderJson() }}"
                                        data-title="{{ __('Gender') }}">{{ getGender($bill_customer->gender) }}</a>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __('Phone') }}:</td>
                                <td style="text-align:right">
                                    <a href="#" class="bill-editable edit-item-detail editable editable-click"
                                        data-value="{{ $bill_customer->phone }}" data-name="phone" data-type="text"
                                        data-pk="{{ $bill_customer->id }}"
                                        data-url="{{ route('bill-detail.editable-customer') }}"
                                        data-title="{{ __('Phone') }}">{{ $bill_customer->phone }}</a>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __('Email') }}:</td>
                                <td style="text-align:right">
                                    <a href="#" class="bill-editable edit-item-detail editable editable-click"
                                        data-value="{{ $bill_customer->email }}" data-name="email" data-type="text"
                                        data-pk="{{ $bill_customer->id }}"
                                        data-url="{{ route('bill-detail.editable-customer') }}"
                                        data-title="{{ __('Email') }}">{{ $bill_customer->email }}</a>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __('Province') }}:</td>
                                <td style="text-align:right">
                                    <a href="#" class="bill-select-editable edit-item-detail editable editable-click"
                                        data-value="{{ $bill_customer->province }}" data-name="province"
                                        data-type="select" data-pk="{{ $billDetail->id }}"
                                        data-url="{{ route('bill-detail.editable-customer') }}"
                                        data-source="{{ BillDetail::getProvinceJson() }}"
                                        data-title="{{ __('Province') }}">{{ $billDetail->getProvinceName($billDetail->getCustomer($billDetail->getBill->id)->province)->name }}</a>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __('District') }}:</td>
                                <td style="text-align:right">
                                    <a href="#" class="bill-select-editable edit-item-detail editable editable-click"
                                        data-value="{{ $billDetail->getDistrictName($billDetail->getCustomer($billDetail->getBill->id)->district)->name }}"
                                        data-name="district" data-type="text" data-pk="{{ $bill_customer->id }}"
                                        data-url="{{ route('bill-detail.editable-customer') }}"
                                        data-title="{{ __('District') }}">{{ $billDetail->getDistrictName($billDetail->getCustomer($billDetail->getBill->id)->district)->name }}</a>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __('Address') }}:</td>
                                <td style="text-align:right">
                                    <a href="#" class="bill-editable edit-item-detail editable editable-click"
                                        data-value="{{ $bill_customer->address }}" data-name="address"
                                        data-type="textarea" data-pk="{{ $bill_customer->id }}"
                                        data-url="{{ route('bill-detail.editable-customer') }}"
                                        data-title="{{ __('Address') }}">{{ $bill_customer->address }}</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{ __('Zipcode') }}
                                </td>
                                <td style="text-align: right">
                                    <a href="#" class="bill-editable edit-item-detail editable editable-click"
                                        data-value="{{ $bill_customer->zipcode }}" data-name="zipcode" data-type="text"
                                        data-pk="{{ $bill_customer->id }}"
                                        data-url="{{ route('bill-detail.editable-customer') }}"
                                        data-title="{{ __('Zipcode') }}">{{ $bill_customer->zipcode }}</a>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    {{ __('Note') }}:
                                </td>
                                <td style="text-align: right">
                                    <a href="#" class="bill-editable edit-item-detail editable editable-click"
                                        data-value="{{ $bill_customer->note }}" data-name="note" data-type="textarea"
                                        data-pk="{{ $bill_customer->id }}"
                                        data-url="{{ route('bill-detail.editable-customer') }}"
                                        data-title="{{ __('Note') }}">{{ $bill_customer->note }}</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="row mt-5 m-0 text-danger">
                <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                    <h3 class="font-weight-bold">{{ __('Bill Consignee') }}</h3>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6 text-center">
                    <h3 class="font-weight-bold">{{ __('Bill Invoice') }}</h3>
                </div>
            </div>
            <?php $consignee = $billDetail->getConsignee($billDetail->getBill->id); ?>
            <div class="row">
                {{-- Bill Consignee --}}
                <div class="col-sm-6">
                    <table class="table table-hover box-body text-wrap table-bordered shadow">
                        <tbody>
                            <tr>
                                <td class="td-title-normal">{{ __('Full Name') }}:</td>
                                <td style="text-align:right" class="data-subtotal">
                                    <a href="#" class="bill-editable editable editable-click"
                                        data-value="{{ $consignee ? $consignee->fullname : '' }}" data-name="fullname"
                                        data-type="text" data-pk="{{ $billDetail->bill_id }}"
                                        data-url="{{ route('bill-detail.editable-consignee') }}"
                                        data-title="{{ __('Full Name') }}">
                                        {{ $consignee ? $consignee->fullname : '' }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-title-normal">{{ __('Email') }}:</td>
                                <td style="text-align:right" class="data-tax">
                                    <a href="#" class="bill-editable editable editable-click"
                                        data-value="{{ $consignee ? $consignee->email : '' }}" data-name="email"
                                        data-type="text" data-pk="{{ $billDetail->bill_id }}"
                                        data-url="{{ route('bill-detail.editable-consignee') }}"
                                        data-title="{{ __('Email') }}">
                                        {{ $consignee ? $consignee->email : '' }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __('Phone') }}:</td>
                                <td style="text-align:right">
                                    <a href="#" class="bill-editable editable editable-click"
                                        data-value="{{ $consignee ? $consignee->phone : '' }}" data-name="phone"
                                        data-type="text" data-pk="{{ $billDetail->bill_id }}"
                                        data-url="{{ route('bill-detail.editable-consignee') }}"
                                        data-title="{{ __('Phone') }}">
                                        {{ $consignee ? $consignee->phone : '' }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __('Address') }}:</td>
                                <td style="text-align:right">
                                    <a href="#" class="bill-editable editable editable-click"
                                        data-value="{{ $consignee ? $consignee->address : '' }}" data-name="address"
                                        data-type="text" data-pk="{{ $billDetail->bill_id }}"
                                        data-url="{{ route('bill-detail.editable-consignee') }}"
                                        data-title="{{ __('Address') }}">
                                        {{ $consignee ? $consignee->address : '' }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __('Note') }}:</td>
                                <td style="text-align:right">
                                    <a href="#" class="bill-editable editable editable-click"
                                        data-value="{{ $consignee ? $consignee->note : '' }}" data-name="note"
                                        data-type="text" data-pk="{{ $billDetail->bill_id }}"
                                        data-url="{{ route('bill-detail.editable-consignee') }}"
                                        data-title="{{ __('Note') }}">
                                        {{ $consignee ? $consignee->note : '' }}
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                {{-- Bill Invoice --}}
                <?php $invoice = $billDetail->getInvoice($billDetail->getBill->id); ?>
                <div class="col-sm-6">
                    <table class="table table-hover box-body text-wrap table-bordered shadow">
                        <tbody>
                            <tr>
                                <td class="td-title-normal">{{ __('Company') }}:</td>
                                <td style="text-align:right" class="data-subtotal">
                                    <a href="#" class="bill-editable editable editable-click"
                                        data-value="{{ $invoice ? $invoice->company : '' }}" data-name="company"
                                        data-type="text" data-pk="{{ $billDetail->bill_id }}"
                                        data-url="{{ route('bill-detail.editable-invoice') }}"
                                        data-title="{{ __('Company') }}">
                                        {{ $invoice ? $invoice->company : '' }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td class="td-title-normal">{{ __('Taxcode') }}:</td>
                                <td style="text-align:right" class="data-tax">
                                    <a href="#" class="edit-item-detail editable editable-click"
                                        data-value="{{ $invoice ? $invoice->taxcode : '' }}" data-name="taxcode"
                                        data-type="text" data-pk="{{ $billDetail->bill_id }}"
                                        data-url="{{ route('bill-detail.editable-invoice') }}"
                                        data-title="{{ __('Gender') }}">
                                        {{ $invoice ? $invoice->taxcode : '' }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __('Email') }}:</td>
                                <td style="text-align:right">
                                    <a href="#" class="bill-editable editable editable-click"
                                        data-value="{{ $invoice ? $invoice->email : '' }}" data-name="email"
                                        data-type="text" data-pk="{{ $billDetail->bill_id }}"
                                        data-url="{{ route('bill-detail.editable-invoice') }}"
                                        data-title="{{ __('Email') }}">
                                        {{ $invoice ? $invoice->email : '' }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __('Phone') }}:</td>
                                <td style="text-align:right">
                                    <a href="#" class="bill-editable editable editable-click"
                                        data-value="{{ $invoice ? $invoice->phone : '' }}" data-name="phone"
                                        data-type="text" data-pk="{{ $billDetail->bill_id }}"
                                        data-url="{{ route('bill-detail.editable-invoice') }}"
                                        data-title="{{ __('Phone') }}">
                                        {{ $invoice ? $invoice->phone : '' }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __('Address') }}:</td>
                                <td style="text-align:right">
                                    <a href="#" class="bill-editable editable editable-click"
                                        data-value="{{ $invoice ? $invoice->address : '' }}" data-name="address"
                                        data-type="text" data-pk="{{ $billDetail->bill_id }}"
                                        data-url="{{ route('bill-detail.editable-invoice') }}"
                                        data-title="{{ __('Address') }}">
                                        {{ $invoice ? $invoice->address : '' }}
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>{{ __('Note') }}:</td>
                                <td style="text-align:right">
                                    <a href="#" class="bill-editable editable editable-click"
                                        data-value="{{ $invoice ? $invoice->note : '' }}" data-name="note"
                                        data-type="text" data-pk="{{ $billDetail->bill_id }}"
                                        data-url="{{ route('bill-detail.editable-invoice') }}"
                                        data-title="{{ __('Note') }}">
                                        {{ $invoice ? $invoice->note : '' }}
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
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
