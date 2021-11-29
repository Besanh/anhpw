<?php
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Price;
?>
<div id="step2">
    <h4 class="h6 text-uppercase mb-5">{{ __('Ordering information') }}</h4>
    <div class="row">
        <div class="col-md-8 g-mb-30">
            <div class="row">
                <div class="col-sm-6 g-mb-20">
                    <div class="form-group">
                        <label
                            class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Full Name') . '(*)' }}</label>
                        <input id="customers_fullname"
                            class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                            name="customers_fullname" value="{{ old('customers_fullname') }}" type="text"
                            placeholder="{{ __('Full Name') }}" required data-msg="This field is mandatory"
                            data-error-class="u-has-error-v1" data-success-class="u-has-success-v1">
                    </div>
                </div>

                <div class="col-sm-6 g-mb-20">
                    <div class="form-group">
                        <label class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Gender') . '(*)' }}</label>
                        <select id="customers_gender"
                            class="js-custom-select u-select-v1 g-brd-gray-light-v2 g-color-gray-light-v1 g-py-12"
                            style="width: 100%;" name="customers_gender" {{ old('customers_gender') }}
                            data-placeholder="{{ __('Choose your gender') }}" data-open-icon="fa fa-angle-down"
                            data-close-icon="fa fa-angle-up" required data-msg="This field is mandatory"
                            data-error-class="u-has-error-v1" data-success-class="u-has-success-v1">
                            <option></option>
                            <option value="0">{{ __('Male') }}</option>
                            <option value="1">{{ __('Female') }}</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 g-mb-20">
                    <div class="form-group">
                        <label
                            class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Email Address') . '(*)' }}</label>
                        <input id="customers_email"
                            class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                            name="customers_email" value="{{ old('customers_email') }}" type="email"
                            placeholder="{{ __('Email Address') }}" required data-msg="This field is mandatory"
                            data-error-class="u-has-error-v1" data-success-class="u-has-success-v1">
                    </div>
                </div>

                <div class="col-sm-6 g-mb-20">
                    <div class="form-group">
                        <label
                            class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Phone Number') . '(*)' }}</label>
                        <input id="customers_phone"
                            class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                            name="customers_phone" value="{{ old('customers_phone') }}" type="number"
                            placeholder="{{ __('Phone Number') }}" required data-msg="This field is mandatory"
                            data-error-class="u-has-error-v1" data-success-class="u-has-success-v1">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 g-mb-20">
                    <div class="form-group">
                        <label class="d-block g-color-gray-dark-v2 g-font-size-13">
                            {{ __('Province/City') . '(*)' }}
                        </label>
                        <select id="customers_province"
                            class="js-custom-select u-select-v1 g-brd-gray-light-v2 g-color-gray-light-v1 g-py-12"
                            style="width: 100%;" name="customers_province"
                            data-placeholder="{{ __('Choose your province') }}" data-open-icon="fa fa-angle-down"
                            data-close-icon="fa fa-angle-up" required data-msg="This field is mandatory"
                            data-error-class="u-has-error-v1" data-success-class="u-has-success-v1"
                            data-href="{{ route('cart.get-district') }}">
                            <option></option>
                            @foreach ($provinces as $pr)
                                <option value="{{ $pr->id }}">{{ $pr->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-sm-6 g-mb-20">
                    <div class="form-group">
                        <label class="d-block g-color-gray-dark-v2 g-font-size-13">
                            {{ __('Districts') . '(*)' }}
                        </label>
                        <select id="customers_district"
                            class="js-custom-selects u-select-v1 g-brd-gray-light-v2 g-color-gray-light-v1 g-py-12"
                            style="width: 100%;" name="customers_district"
                            data-placeholder="{{ __('Choose your district') }}" data-open-icon="fa fa-angle-down"
                            data-close-icon="fa fa-angle-up" required data-msg="This field is mandatory"
                            data-error-class="u-has-error-v1" data-success-class="u-has-success-v1">
                            <option></option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 g-mb-20">
                    <div class="form-group">
                        <label
                            class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Zip/Postal Code') }}</label>
                        <input id="customers_zipcode"
                            class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                            name="customers_zipcode" value="{{ old('customers_zipcode') }}" type="text"
                            placeholder="AB123" data-msg="This field is mandatory" data-error-class="u-has-error-v1"
                            data-success-class="u-has-success-v1" maxlength="15">
                    </div>
                </div>

                <div class="col-sm-6 g-mb-20">
                    <div class="form-group">
                        <label
                            class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Address') . '(*)' }}</label>
                        <input id="customers_address"
                            class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                            name="customers_address" value="{{ old('customers_address') }}" type="text"
                            placeholder="{{ __('Address') }}" required data-msg="This field is mandatory"
                            data-error-class="u-has-error-v1" data-success-class="u-has-success-v1">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 g-mb-20">
                    <div class="form-group">
                        <label class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Note') }}</label>
                        <input id="customers_note"
                            class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                            name="customers_note" value="{{ old('customers_note') }}" type="text"
                            placeholder="{{ __('Note') }}" data-msg="This field is mandatory"
                            data-error-class="u-has-error-v1" data-success-class="u-has-success-v1"
                            aria-required="true">
                    </div>
                </div>
            </div>

            {{-- Thong tin nguoi nhan --}}
            <hr class="g-mb-50">
            <h4 class="h6 text-uppercase g-color-gray-dark-v4 g-text-underline--none--hover collapsed">
                <a class="g-color-gray-dark-v4 g-text-underline--none--hover collapsed" href="#consignee_info"
                    data-toggle="collapse" data-parent="#consignee_info" aria-expanded="false"
                    aria-controls="consignee_info">
                    {{ __('Consignee Information') }}
                    <span class="ml-3 fa fa-angle-down"></span>
                </a>
            </h4>
            <div id="consignee_info" class="collapse" role="tabpanel" aria-labelledby="consignee_info_body">
                <div class="row">
                    <div class="col-sm-6 g-mb-20">
                        <div class="form-group">
                            <label class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Full Name') }}</label>
                            <input id="consignee_fullname"
                                class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                name="consignee_fullname" value="{{ old('consignee_fullname') }}" type="text"
                                placeholder="{{ __('First Name') }}" data-msg="This field is mandatory"
                                data-error-class="u-has-error-v1" data-success-class="u-has-success-v1"
                                aria-required="true">
                        </div>
                    </div>

                    <div class="col-sm-6 g-mb-20">
                        <div class="form-group">
                            <label
                                class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Email Address') }}</label>
                            <input id="consignee_email"
                                class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                name="consignee_email" value="{{ old('consignee_email') }}" type="email"
                                placeholder="{{ __('Email Address') }}" data-msg="This field is mandatory"
                                data-error-class="u-has-error-v1" data-success-class="u-has-success-v1"
                                aria-required="true">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 g-mb-20">
                        <div class="form-group">
                            <label
                                class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Phone Number') }}</label>
                            <input id="consignee_phone"
                                class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                name="consignee_phone" value="{{ old('consignee_phone') }}" type="text"
                                placeholder="{{ __('Phone Number') }}" data-msg="This field is mandatory"
                                data-error-class="u-has-error-v1" data-success-class="u-has-success-v1"
                                aria-required="true">
                        </div>
                    </div>
                    <div class="col-sm-6 g-mb-20">
                        <div class="form-group">
                            <label class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Address') }}</label>
                            <input id="consignee_address"
                                class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                name="consignee_address" value="{{ old('consignee_address') }}" type="text"
                                placeholder="{{ __('Address') }}" data-msg="This field is mandatory"
                                data-error-class="u-has-error-v1" data-success-class="u-has-success-v1"
                                aria-required="true">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 g-mb-20">
                        <div class="form-group">
                            <label class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Note') }}</label>
                            <input id="consignee_note"
                                class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                name="consignee_note" value="{{ old('consignee_note') }}" type="text"
                                placeholder="{{ __('Note') }}" data-msg="This field is mandatory"
                                data-error-class="u-has-error-v1" data-success-class="u-has-success-v1"
                                aria-required="true">
                        </div>
                    </div>
                </div>
            </div>

            <hr class="g-mb-50">

            {{-- Hoa don cong ty --}}
            <h4 class="h6 text-uppercase g-color-gray-dark-v4 g-text-underline--none--hover collapsed">
                <a class="g-color-gray-dark-v4 g-text-underline--none--hover collapsed" href="#invoice"
                    data-toggle="collapse" data-parent="#invoice" aria-expanded="false" aria-controls="invoice">
                    {{ __('Company Invoice') }}
                    <span class="ml-3 fa fa-angle-down"></span>
                </a>
            </h4>
            <div id="invoice" class="collapse" role="tabpanel" aria-labelledby="invoice">
                <div class="row">
                    <div class="col-sm-6 g-mb-20">
                        <div class="form-group">
                            <label class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Company') }}</label>
                            <input id="invoice_company"
                                class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                name="invoice_company" value="{{ old('invoice_company') }}" type="text"
                                placeholder="{{ __('Company') }}" data-msg="This field is mandatory"
                                data-error-class="u-has-error-v1" data-success-class="u-has-success-v1"
                                aria-required="true">
                        </div>
                    </div>

                    <div class="col-sm-6 g-mb-20">
                        <div class="form-group">
                            <label class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Tax Code') }}</label>
                            <input id="invoice_taxcode"
                                class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                name="invoice_taxcode" value="{{ old('invoice_taxcode') }}" type="text"
                                placeholder="{{ __('Tax Code') }}" data-msg="This field is mandatory"
                                data-error-class="u-has-error-v1" data-success-class="u-has-success-v1"
                                aria-required="true">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6 g-mb-20">
                        <div class="form-group">
                            <label class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Email') }}</label>
                            <input id="invoice_email"
                                class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                name="invoice_email" value="{{ old('invoice_email') }}" type="email"
                                placeholder="{{ __('Email') }}" data-msg="This field is mandatory"
                                data-error-class="u-has-error-v1" data-success-class="u-has-success-v1"
                                aria-required="true">
                        </div>
                    </div>

                    <div class="col-sm-6 g-mb-20">
                        <div class="form-group">
                            <label
                                class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Phone Number') }}</label>
                            <input id="invoice_phone"
                                class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                name="invoice_phone" value="{{ old('invoice_phone') }}" type="text"
                                placeholder="{{ __('Phone Number') }}" required="" data-msg="This field is mandatory"
                                data-error-class="u-has-error-v1" data-success-class="u-has-success-v1"
                                aria-required="true">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 g-mb-20">
                        <div class="form-group">
                            <label class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Address') }}</label>
                            <input id="invoice_address"
                                class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                name="invoice_address" value="{{ old('invoice_address') }}" type="text"
                                placeholder="{{ __('Address') }}" data-msg="This field is mandatory"
                                data-error-class="u-has-error-v1" data-success-class="u-has-success-v1"
                                aria-required="true">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 g-mb-20">
                        <div class="form-group">
                            <label class="d-block g-color-gray-dark-v2 g-font-size-13">{{ __('Note') }}</label>
                            <input id="invoice_note"
                                class="form-control u-form-control g-placeholder-gray-light-v1 rounded-0 g-py-15"
                                name="invoice_note" value="{{ old('invoice_note') }}" type="text"
                                placeholder="{{ __('Note') }}" data-msg="This field is mandatory"
                                data-error-class="u-has-error-v1" data-success-class="u-has-success-v1"
                                aria-required="true">
                        </div>
                    </div>
                </div>
            </div>

            <hr class="g-mb-50">

            <h4 class="h6 text-uppercase mb-5">{{ __('Shipping method') }}</h4>

            <!-- Shipping Mehtod -->
            <table class="mb-5">
                <thead class="h6 g-brd-bottom g-brd-gray-light-v3 g-color-gray-dark-v3 g-font-size-13">
                    <tr>
                        <th class="g-width-70 g-font-weight-500 g-pa-0 g-pb-10">{{ __('Destination') }}
                        </th>
                        <th class="g-width-110 g-font-weight-500 g-pa-0 g-pb-10">
                            {{ __('Delivery type') }}
                        </th>
                        <th class="g-width-150 g-font-weight-500 g-pa-0 g-pb-10">
                            {{ __('Delivery time') }}
                        </th>
                        <th class="g-width-70 g-font-weight-500 text-right g-pa-0 g-pb-10">
                            {{ __('Cost') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @if ($shippingFees)
                        <?php $count = 0; ?>
                        @foreach (arrayMap($shippingFees, 'delivery_type', null, 'destination') as $destination => $s)
                            @if (count($s) == 1)
                                <tr class="g-color-gray-dark-v4 g-font-size-13">
                                    <td class="align-top g-py-10">{{ $destination }}</td>
                                    @foreach ($s as $k => $v)
                                        <td class="align-top g-py-10">{{ $v->delivery_type }}</td>
                                        <td class="align-top g-py-10">{{ $v->delivery_time }}</td>
                                        <td class="align-top text-right g-py-10">{{ $v->cost }}</td>
                                    @endforeach
                                </tr>
                            @else
                                @foreach ($s as $k => $v)
                                    <tr class="g-color-gray-dark-v4 g-font-size-13">
                                        <td class="align-top g-py-10">{{ $destination }}</td>
                                        <td class="align-top g-py-10">{{ $v->delivery_type }}</td>
                                        <td class="align-top g-py-10">{{ $v->delivery_time }}</td>
                                        <td class="align-top text-right g-py-10">{{ $v->cost }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                </tbody>
            </table>
            <!-- End Shipping Mehtod -->

            <button class="btn u-btn-primary g-font-size-13 text-uppercase g-px-40 g-py-15" type="button"
                data-next-step="#step3" onclick="bindForm(this)">
                {{ __('Proceed to Payment') }}
            </button>
        </div>

        <div class="col-md-4 g-mb-30">
            <!-- Order Summary -->
            <div class="g-bg-gray-light-v5 g-pa-20 g-pb-50 mb-4">
                <h4 class="h6 text-uppercase mb-3">{{ __('Order summary') }}</h4>

                <!-- Accordion -->
                <div id="accordion-03" class="mb-4" role="tablist" aria-multiselectable="true">
                    <div id="accordion-03-heading-03" class="g-brd-y g-brd-gray-light-v2 py-3" role="tab">
                        <h5 class="g-font-weight-400 g-font-size-default mb-0">
                            <a class="g-color-gray-dark-v4 g-text-underline--none--hover" href="#accordion-03-body-03"
                                data-toggle="collapse" data-parent="#accordion-03" aria-expanded="false"
                                aria-controls="accordion-03-body-03">
                                {{ Cart::instance('shopping')->count() }}
                                {{ __('items in cart') }}
                                <span class="ml-3 fa fa-angle-down"></span>
                            </a>
                        </h5>
                    </div>
                    <div id="accordion-03-body-03" class="collapse" role="tabpanel"
                        aria-labelledby="accordion-03-heading-03">
                        <div class="g-py-15">
                            <ul class="list-unstyled mb-3">
                                @foreach (Cart::instance('shopping')->content() as $item)
                                    <!-- Product -->
                                    <li class="d-flex justify-content-start mb-3">
                                        <img class="g-width-100 g-height-100 mr-3"
                                            src="{{ getImage($item->options->image) }}"
                                            alt="{{ $item->options->name_seo }}">
                                        <div class="d-block">
                                            <h4 class="h6 g-color-black">{{ $item->options->name_seo }}
                                            </h4>
                                            <ul
                                                class="list-unstyled g-color-gray-dark-v4 g-font-size-12 g-line-height-1_4 mb-1">
                                                <li>{{ __('Size') }}: {{ $item->options->capa }}</li>
                                                <li>{{ __('Unit') }}:
                                                    {{ Price::getCapaNameViaCart($item->options->capa_id)->name }}
                                                </li>
                                                <li>
                                                    {{ __('Qty') }}: {{ $item->qty }}
                                                </li>
                                            </ul>
                                            <span class="d-block g-color-black g-font-weight-400">
                                                {{ getPrice($item->price * $item->qty) }}
                                            </span>
                                        </div>
                                    </li>
                                    <!-- End Product -->
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- End Accordion -->

                <div class="d-flex justify-content-between mb-2">
                    <span class="g-color-black">{{ __('Subtotal') }}</span>
                    <span class="g-color-black g-font-weight-300">{{ Cart::instance('shopping')->subtotal() }}</span>
                </div>
                <div class="d-flex justify-content-between mb-2">
                    <span class="g-color-black">{{ __('Tax') }}</span>
                    <span class="g-color-black g-font-weight-300">{{ Cart::instance('shopping')->tax() }}</span>
                </div>
                <div class="d-flex justify-content-between">
                    <span class="g-color-black">{{ __('Order Total') }}</span>
                    <span class="g-color-black g-font-weight-300">{{ Cart::instance('shopping')->total() }}</span>
                </div>
            </div>
            <!-- End Order Summary -->
        </div>
    </div>
</div>
