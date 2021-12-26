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
                    {{-- <th>{{ __('Action') }}</th> --}}
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
                                    data-value="{{ $item->price }}" data-name="price" data-type="number" min="0"
                                    data-pk="{{ $billDetail->bill_id }}" data-url=""
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
                                    data-value="{{ $item->price - $item->options->discount }}" data-name="cost"
                                    data-type="number" min="0" data-pk="53" data-url=""
                                    data-title="{{ __('cost') }}">
                                    {{ $item->price - $item->options->discount }}
                                </a>
                            </td>
                            <td>{{ $item->options->note }}</td>
                            {{-- <td>
                                <span onclick="" class="btn btn-danger btn-xs" data-title="{{ __('Delete') }}">
                                    <i class="fa fa-trash" aria-hidden="true"></i>
                                </span>
                            </td> --}}
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
