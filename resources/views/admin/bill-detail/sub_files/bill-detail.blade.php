<?php
use App\Models\BillDetail;
?>
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
                    <td class="bg-warning text-white">
                        <a href="#" class="bill-editable editable editable-click" data-name="channel_sale"
                            data-type="select" data-pk="{{ $billDetail->id }}" data-title="{{ __('Channel Sale') }}"
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
                        <a href="#" class="bill-select-status-editable editable editable-click" data-name="status"
                            data-type="select" data-pk="{{ $billDetail->id }}" data-title="{{ __('Status') }}"
                            data-value="{{ $billDetail->status }}"
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
