<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\ShippingFee;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TestController extends Controller
{
    public function index()
    {
        getArray(Cart::instance('shopping')->content());
    }
}
