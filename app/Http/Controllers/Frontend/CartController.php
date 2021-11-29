<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Bill;
use App\Models\BillConsignee;
use App\Models\BillCustomer;
use App\Models\BillDetail;
use App\Models\BillInvoice;
use App\Models\Price;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Carts;
use App\Models\Districts;
use App\Models\Provinces;
use App\Models\Setting;
use App\Models\ShippingFee;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class CartController extends Controller
{
    /**
     * Gio hang chinh
     */
    public function index()
    {
        $title = __('Shopping Cart');
        if (Cart::instance('shopping')->count()) {

            $shippingFees = Cache::rememberForever('shippingFees', function () {
                return ShippingFee::where('status', '=', 1)
                    ->get();
            });
            $provinces = Cache::remember('province', timeToLive(), function () {
                return Provinces::select(['id', 'name'])
                    ->where('status', '=', 1)
                    ->get();
            });
            $districts = Cache::remember('district', timeToLive(), function () {
                return Districts::select(['id', 'name'])
                    ->where('status', '=', 1)
                    ->get();
            });

            return view('frontend.cart.index', compact(['title', 'shippingFees', 'provinces', 'districts']));
        } else {
            $notify = Cache::remember('notify_cart', timeToLive(), function () {
                return Setting::where([
                    ['name', '=', 'cart_empty'],
                    ['status', '=', 1]
                ])
                    ->select('value_setting')
                    ->first();
            });
            return view('frontend.cart.empty-cart', compact(['title', 'notify']));
        }
    }

    /**
     * Add item
     */
    public function addItem($price_id, $selling_id = 0)
    {
        $item = Price::getItemCart($price_id, $selling_id);
        if ($item) {
            $cartItem = Cart::instance('shopping')->add([
                'id' => $item->id,
                'name' => $item->name,
                'price' => $item->price,
                'qty' => 1,
                'options' => [
                    'taxRate' => 0,
                    'isSaved' => false,
                    'discount' => 0,    // set tam = 0
                    'name_seo' => $item->name_seo,
                    'sap_id' => $item->sap_id,
                    'barcode' => $item->barcode,
                    'pid' => $item->pid,
                    'capa' => $item->capa,
                    'capa_id' => $item->capa_id,
                    'stock' => $item->stock,
                    'note' => $item->note,
                    'bookmark' => '',
                    'image' => $item->image,
                    'b_alias' => $item->b_alias
                ]
            ]);
            Cart::associate($cartItem->rowId, Carts::class);
        }
        return redirect()->route('cart.index');
    }

    /**
     * Xoa item theo rowId
     */
    public function deleteItem($rowId)
    {
        $item = Cart::instance('shopping')->get($rowId);
        if ($item) {
            Cart::instance('shopping')->remove($rowId);
        }
        return redirect()->route('cart.index');
    }

    /**
     * Update qty them rowId cua item
     */
    public function updateItem($rowId, $qty)
    {
        if (Cart::instance('shopping')->get($rowId)) {
            Cart::instance('shopping')->update($rowId, $qty);
        }
        return redirect()->route('cart.index');
    }

    /**
     * Update cart
     * Save cart
     */
    public function postCart(Request $request)
    {
        $data = $request->all();
        // Update qty item
        if ($request->input('update_shopping_cart') == 'update_shopping_cart') {
            if (is_array(Arr::get($data, 'qty'))) {
                foreach (Arr::get($data, 'qty') as $rowId => $qty) {
                    if (Cart::instance('shopping')->get($rowId)) {
                        Cart::instance('shopping')->update($rowId, $qty);
                    }
                }
            }
            return redirect()->route('cart.index')->with('message', 'Update cart successfully');
        }

        if ($request->input('make_payment') == 'make_payment') {
            $bill_save = $bill_detail_save = $bill_customer_save = $bill_consignee_save = $bill_invoice_save = false;
            try {
                DB::beginTransaction();
                $cart = Cart::instance('shopping');

                $total_discount = 0;
                foreach ($cart->content() as $node) {
                    $total_discount += $node->options->discount;
                }

                $bill = new Bill();
                $bill->bill_no = Str::uuid()->toString();
                $bill->total_price = $cart->subtotal(0, '', '');
                $bill->total_discount = $total_discount;
                $bill->total_cost = $cart->total(0, '', '') - $total_discount;
                $bill->total_tax = $cart->tax(0, '', '');
                $bill->shipping_cost = 0;
                $bill->payment = Arr::get($data, 'payment');
                $bill_save = $bill->save();

                // Bill detail
                if ($bill_save) {
                    $bill_detail = new BillDetail();
                    $bill_detail->bill_id = $bill->id;
                    $bill_detail->channel_sale = Arr::get(BillDetail::$channel, 'website');   // tam set ''
                    $bill_detail->devices = getDevice();
                    $bill_detail->status = 1;
                    $bill_detail_save = $bill_detail->save();
                }

                // Bill customer
                if ($bill_save) {
                    $validator_customer = Validator::make($data, [
                        'customers_fullname' => 'required|string|max:125',
                        'customers_gender' => 'required|integer',
                        'customers_phone' => 'required|string|max:15',
                        'customers_email' => 'required|email|max:125',
                        'customers_province' => 'required|integer',
                        'customers_district' => 'required|integer',
                        'customers_address' => 'required|string',
                        'customers_note' => 'string|nullable',
                        'customers_zipcode' => 'string|nullable'
                    ]);
                    if ($validator_customer->fails()) {
                        return back()
                            ->withErrors($validator_customer)
                            ->withInput();
                    }
                    $bill_customer = new BillCustomer();
                    $bill_customer->bill_id = $bill->id;
                    $bill_customer->fullname = Arr::get($data, 'customers_fullname');
                    $bill_customer->gender = Arr::get($data, 'customers_gender');
                    $bill_customer->email = Arr::get($data, 'customers_email');
                    $bill_customer->phone = Arr::get($data, 'customers_phone');
                    $bill_customer->province = Arr::get($data, 'customers_province');
                    $bill_customer->district = Arr::get($data, 'customers_district');
                    $bill_customer->address = Arr::get($data, 'customers_address');
                    $bill_customer->note = Arr::get($data, 'customers_note');
                    $bill_customer->zipcode = Arr::get($data, 'customers_zipcode');
                    $bill_customer_save = $bill_customer->save();
                }

                // Bill consignee
                if ($bill_save) {
                    if (Arr::get($data, 'consignee_fullname') || Arr::get($data, 'consignee_email') || Arr::get($data, 'consignee_phone') || Arr::get($data, 'consignee_address')) {
                        $validator_consignee = Validator::make($request->all(), [
                            'consignee_fullname' => 'required|string',
                            'consignee_email' => 'required|email',
                            'consignee_phone' => 'required|string|max:15',
                            'consignee_address' => 'required|string',
                            'consignee_note' => 'string|nullable'
                        ]);
                        if ($validator_consignee->fails()) {
                            return back()
                                ->withErrors($validator_consignee)
                                ->withInput();
                        }
                        $bill_consignee = new BillConsignee();
                        $bill_consignee->bill_id = $bill->id;
                        $bill_consignee->fullname = Arr::get($data, 'consignee_fullname');
                        $bill_consignee->email = Arr::get($data, 'consignee_email');
                        $bill_consignee->phone = Arr::get($data, 'consignee_phone');
                        $bill_consignee->address = Arr::get($data, 'consignee_address');
                        $bill_consignee->note = Arr::get($data, 'consignee_note');
                        $bill_consignee_save = $bill_consignee->save();
                    }
                }

                // Bill invoice
                if ($bill_save) {
                    if (Arr::get($data, 'invoice_company') || Arr::get($data, 'invoice_taxcode') || Arr::get($data, 'invoice_email') || Arr::get($data, 'invoice_phone') || Arr::get($data, 'invoice_address')) {
                        $validator_invoice = Validator::make($data, [
                            'invoice_company' => 'required|string',
                            'invoice_taxcode' => 'required|string|max:15',
                            'invoice_email' => 'required|email',
                            'invoice_phone' => 'required|string|max:15',
                            'invoice_address' => 'required|string',
                            'invoice_note' => 'string|nullable'
                        ]);
                        if ($validator_invoice->fails()) {
                            return back()
                                ->withErrors($validator_invoice)
                                ->withInput();
                        }
                        $bill_invoice = new BillInvoice();
                        $bill_invoice->bill_id = $bill->id;
                        $bill_invoice->company = Arr::get($data, 'invoice_company');
                        $bill_invoice->taxcode = Arr::get($data, 'invoice_taxcode');
                        $bill_invoice->email = Arr::get($data, 'invoice_email');
                        $bill_invoice->phone = Arr::get($data, 'invoice_phone');
                        $bill_invoice->address = Arr::get($data, 'invoice_address');
                        $bill_invoice->note = Arr::get($data, 'invoice_note');
                        $bill_invoice_save = $bill_invoice->save();
                    }
                }
            } catch (\Throwable $e) {
                DB::rollBack();
                // Gui thong bao
                return back()->withErrors(['msg' => $e->getMessage()]);
            }

            if ($bill_save && $bill_detail_save && $bill_customer_save) {
                // Shopping cart
                Cart::instance('shopping')->store($bill->id);
                DB::commit();

                // Page notify
                $bill_no = $bill->bill_no;
                Cart::instance('shopping')->destroy();
                return redirect()->route('cart.complete', compact('bill_no'));
            } else {
                DB::rollBack();
                return redirect()->back()->with(['msg' => 'Something went wrong']);
            }
        }
    }

    /**
     * Xoa tat ca item trong cart
     */
    public function destroyCart()
    {
        Cart::instance('shopping')->destroy();
        return redirect()->route('cart.index');
    }

    /**
     * Lay district theo province
     */
    public function getDistrict(int $pr_id = 0)
    {
        if ($pr_id != 0 || isset($pr_id)) {
            $districts = Districts::where([
                ['province_id', '=', $pr_id],
                ['status', '=', 1]
            ])
                ->select(['id', 'name'])
                ->get();
            if ($districts) {
                foreach ($districts as $key => $value) {
                    echo '<option value="' . $value->id . '">' . $value->name . '</option>';
                }
            } else {
                echo '<option></option>';
            }
        } else {
            echo '<option></option>';
        }
    }

    /**
     * Get province name
     */
    public function getProvinceName(int $id)
    {
        return Provinces::where('id', '=', $id)
            ->select('name')
            ->first();
    }

    /**
     * Get district name
     */
    public function getDistrictName(int $id)
    {
        return Districts::where('id', '=', $id)
            ->select(['name'])
            ->first();
    }

    /**
     * Complete cart
     */
    public function completeNotify($bill_no)
    {
        $data = Bill::where('bill_no', '=', $bill_no)->count();
        if ($data > 0) {
            // Send email notify or sms

            return view('frontend.cart.complete', compact('bill_no'));
        }
        return redirect()->route('comming-soon');
    }
}
