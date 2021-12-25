<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Backend\AdminUser;
use App\Models\BillDetail;
use App\Models\Product;
use App\Models\ShippingFee;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function index()
    {
        getArray(AdminUser::where('id', 1)->first());
    }
}
