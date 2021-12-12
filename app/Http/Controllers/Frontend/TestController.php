<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BillDetail;
use App\Models\Product;
use App\Models\ShippingFee;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TestController extends Controller
{
    public function index()
    {
        $data = Product::select([
            'products.id',
            'products.name',
            'products.name_seo',
            'brands.alias as b_alias',
            'prices.name as price_name',
            'prices.name_seo as price_name_seo'
        ])
            ->join('brands', 'brands.id', '=', 'products.bid')
            ->join('prices', 'prices.pid', '=', 'products.id')
            ->where([
                ['brands.status', '=', 1],
                ['products.status', '=', 1],
                ['prices.status', '=', 1]
            ])
            ->orderBy('products.promote', 'DESC')
            ->orderBy('products.id', 'ASC')
            ->limit(8)
            ->get();
        foreach($data as $node)
        {
            getArray($node->price_name_seo);
        }
    }
}
