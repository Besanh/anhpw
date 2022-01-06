<?php
use App\Models\BillDetail; ?>
<div class="row">
    <?php $bill = $billDetail->getBill; ?>
    {{-- Bill --}}
    <div class="col-sm-6">
        <table class="table table-hover box-body text-wrap table-bordered shadow">
            <tbody>
                <tr>
                    <td class="td-title-normal">{{ __('Bill No') }}:</td>
                    <td style="text-align:right" class="bg-info text-white">
                        {{ $bill->bill_no }}
                    </td>
                </tr>
                <tr>
                    <td class="td-title-normal">{{ __('Total Price') }}:</td>
                    <td style="text-align:right" class="data-tax">{{ $bill->total_price }}
                    </td>
                </tr>
                <tr>
                    <td>{{ __('Total Discount') }}:</td>
                    <td style="text-align:right">{{ $bill->total_discount }}</td>
                </tr>
                <tr>
                    <td>{{ __('Total Tax') }}:</td>
                    <td style="text-align:right">
                        {{ $bill->total_tax }}
                    </td>
                </tr>
                <tr>
                    <td>{{ __('Shipping Cost') }}:</td>
                    <td style="text-align:right">
                        {{ $bill->shipping_cost }}
                    </td>
                </tr>
                <tr>
                    <td>{{ __('Payment') }}:</td>
                    <td style="text-align:right">{{ $bill->payment }}</td>
                </tr>
                <tr>
                    <td>{{ __('Note') }}:</td>
                    <td style="text-align:right">{{ $bill->note }}</td>
                </tr>
                <tr style="color:#0e9e33;font-weight: bold;">
                    <td>
                        {{ __('Total Cost') }}
                    </td>
                    <td style="text-align:right">{{ $bill->total_cost }}</td>
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
                    <td>{{ __('Count Sent Mail') }}:</td>
                    <td style="text-align:right">
                        @if ($bill_customer->count_sent_mail == 1)
                            <i class="fa fa-check text-success"></i>
                        @else
                            <i class="fa fa-times text-danger"></i>
                        @endif

                    </td>
                </tr>
                <tr>
                    <td>{{ __('Province') }}:</td>
                    <td style="text-align:right">
                        <a href="#" class="bill-select-editable edit-item-detail editable editable-click"
                            data-value="{{ $bill_customer->province }}" data-name="province" data-type="select"
                            data-pk="{{ $billDetail->id }}"
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
                            data-value="{{ $bill_customer->address }}" data-name="address" data-type="textarea"
                            data-pk="{{ $bill_customer->id }}"
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
