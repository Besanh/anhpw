<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Price;
use Gloudemans\Shoppingcart\Facades\Cart;
use App\Models\Carts;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class CartController extends Controller
{
    public function index()
    {
        $title = __('Shopping Cart');
        $notify = Setting::where([
            ['name', '=', 'cart_empty'],
            ['status', '=', 1]
        ])
            ->select('value_setting')
            ->first();
        return Cart::instance('shopping')->count() ? view('frontend.cart.index', compact('title')) : view('frontend.cart.empty-cart', compact(['title', 'notify']));
    }

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
                    'name_seo' => $item->name_seo,
                    'sap_id' => $item->sap_id,
                    'barcode' => $item->barcode,
                    'pid' => $item->pid,
                    'capa' => $item->capa,
                    'capa_id' => $item->capa_id,
                    'stock' => $item->stock,
                    'note' => $item->note,
                    'bookmark' => '',
                    'image' => $item->image
                ]
            ]);
            Cart::associate($cartItem->rowId, Carts::class);
        }
        return redirect()->route('cart.index');
    }

    public function deleteItem($rowId)
    {
        $item = Cart::instance('shopping')->get($rowId);
        if ($item) {
            Cart::instance('shopping')->remove($rowId);
        }
        return redirect()->route('cart.index');
    }

    public function updateItem($rowId, $qty)
    {
        if (Cart::instance('shopping')->get($rowId)) {
            Cart::instance('shopping')->update($rowId, $qty);
        }
        return redirect()->route('cart.index');
    }

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
            return redirect()->route('cart.index');
        }
    }

    public function destroyCart()
    {
        Cart::instance('shopping')->destroy();
        return redirect()->route('cart.index');
    }
}
