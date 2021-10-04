<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $cates = Category::where('status', 1)
            ->select(['id', 'name_seo', 'image'])
            ->limit(3)
            ->get();
        $products = Product::select([
            'products.id',
            'products.name',
            'products.name_seo',
            'products.image',
            'prices.price',
            'prices.barcode',
            'categories.name as cate_name'
        ])
            ->join('prices', 'prices.pid', '=', 'products.id')
            ->join('categories', 'categories.id', '=', 'products.cate_id')
            ->where([
                ['prices.status', '=', 1],
                ['products.status', '=', 1],
                ['categories.status', '=', 1],
                ['prices.stock', '>', 0]
            ])
            // ->where()
            ->orderBy('products.promote', 'DESC')
            ->orderBy('prices.promote', 'DESC')
            ->get();

        $slogan_f_p = Setting::where([
            ['name', '=', 'featured_product'],
            ['status', '=', 1]
        ])
            ->select('value_setting')
            ->first();

        return view('frontend.home.home', compact(['cates', 'products', 'slogan_f_p']));
    }
}
