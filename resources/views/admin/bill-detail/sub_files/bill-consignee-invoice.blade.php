<div class="row">
    {{-- Bill Consignee --}}
    <?php $consignee = $billDetail->getConsignee($billDetail->getBill->id); ?>
    <div class="col-sm-6">
        <table class="table table-hover box-body text-wrap table-bordered shadow">
            <tbody>
                <tr>
                    <td class="td-title-normal">{{ __('Full Name') }}:</td>
                    <td style="text-align:right" class="data-subtotal">
                        @if ($consignee)
                            <a href="#" class="bill-editable editable editable-click"
                                data-value="{{ $consignee->fullname }}" data-name="fullname" data-type="text"
                                data-pk="{{ $billDetail->bill_id }}"
                                data-url="{{ route('bill-detail.editable-consignee') }}"
                                data-title="{{ __('Full Name') }}">{{ $consignee->fullname }}</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="td-title-normal">{{ __('Email') }}:</td>
                    <td style="text-align:right" class="data-tax">
                        @if ($consignee)
                            <a href="#" class="bill-editable editable editable-click"
                                data-value="{{ $consignee->email }}" data-name="email" data-type="text"
                                data-pk="{{ $billDetail->bill_id }}"
                                data-url="{{ route('bill-detail.editable-consignee') }}"
                                data-title="{{ __('Email') }}">{{ $consignee->email }}</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>{{ __('Phone') }}:</td>
                    <td style="text-align:right">
                        @if ($consignee)
                            <a href="#" class="bill-editable editable editable-click"
                                data-value="{{ $consignee->phone }}" data-name="phone" data-type="text"
                                data-pk="{{ $billDetail->bill_id }}"
                                data-url="{{ route('bill-detail.editable-consignee') }}"
                                data-title="{{ __('Phone') }}">{{ $consignee->phone }}</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>{{ __('Address') }}:</td>
                    <td style="text-align:right">
                        @if ($consignee)
                            <a href="#" class="bill-editable editable editable-click"
                                data-value="{{ $consignee->address }}" data-name="address" data-type="text"
                                data-pk="{{ $billDetail->bill_id }}"
                                data-url="{{ route('bill-detail.editable-consignee') }}"
                                data-title="{{ __('Address') }}">{{ $consignee->address }}</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>{{ __('Note') }}:</td>
                    <td style="text-align:right">
                        @if ($consignee)
                            <a href="#" class="bill-editable editable editable-click"
                                data-value="{{ $consignee->note }}" data-name="note" data-type="text"
                                data-pk="{{ $billDetail->bill_id }}"
                                data-url="{{ route('bill-detail.editable-consignee') }}"
                                data-title="{{ __('Note') }}">{{ $consignee->note }}</a>
                        @endif
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
                        @if ($invoice)
                            <a href="#" class="bill-editable editable editable-click"
                                data-value="{{ $invoice->company }}" data-name="company" data-type="text"
                                data-pk="{{ $billDetail->bill_id }}"
                                data-url="{{ route('bill-detail.editable-invoice') }}"
                                data-title="{{ __('Company') }}">{{ $invoice->company }}</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td class="td-title-normal">{{ __('Taxcode') }}:</td>
                    <td style="text-align:right" class="data-tax">
                        @if ($invoice)
                            <a href="#" class="bill-editable editable editable-click"
                                data-value="{{ $invoice->taxcode }}" data-name="taxcode" data-type="text"
                                data-pk="{{ $billDetail->bill_id }}"
                                data-url="{{ route('bill-detail.editable-invoice') }}"
                                data-title="{{ __('Taxcode') }}">{{ $invoice->taxcode }}</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>{{ __('Email') }}:</td>
                    <td style="text-align:right">
                        @if ($invoice)
                            <a href="#" class="bill-editable editable editable-click"
                                data-value="{{ $invoice->email }}" data-name="email" data-type="text"
                                data-pk="{{ $billDetail->bill_id }}"
                                data-url="{{ route('bill-detail.editable-invoice') }}"
                                data-title="{{ __('Email') }}">{{ $invoice->email }}</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>{{ __('Phone') }}:</td>
                    <td style="text-align:right">
                        @if ($invoice)
                            <a href="#" class="bill-editable editable editable-click"
                                data-value="{{ $invoice->phone }}" data-name="phone" data-type="text"
                                data-pk="{{ $billDetail->bill_id }}"
                                data-url="{{ route('bill-detail.editable-invoice') }}"
                                data-title="{{ __('Phone') }}">{{ $invoice->phone }}</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>{{ __('Address') }}:</td>
                    <td style="text-align:right">
                        @if ($invoice)
                            <a href="#" class="bill-editable editable editable-click"
                                data-value="{{ $invoice->address }}" data-name="address" data-type="text"
                                data-pk="{{ $billDetail->bill_id }}"
                                data-url="{{ route('bill-detail.editable-invoice') }}"
                                data-title="{{ __('Address') }}">{{ $invoice->address }}</a>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td>{{ __('Note') }}:</td>
                    <td style="text-align:right">
                        @if ($invoice)
                            <a href="#" class="bill-editable editable editable-click"
                                data-value="{{ $invoice->note }}" data-name="note" data-type="text"
                                data-pk="{{ $billDetail->bill_id }}"
                                data-url="{{ route('bill-detail.editable-invoice') }}"
                                data-title="{{ __('Note') }}">{{ $invoice->note }}</a>
                        @endif
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
