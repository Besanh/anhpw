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
        $model_product = new Product();
        $cates = Category::where('status', 1)
            ->select(['id', 'name_seo', 'image'])
            ->limit(3)
            ->get();
        $products = $model_product->getFeaturedProduct();
        $arrival_products = $model_product->getArrivalProduct();

        $slogan_f_p = Setting::where([
            ['name', '=', 'featured_product'],
            ['status', '=', 1]
        ])
            ->select('value_setting')
            ->first();

        $countdown = Setting::where([
            ['name', '=', 'countdown'],
            ['status', '=', 1]
        ])
            ->select('value_setting')
            ->first();

        return view('frontend.home.home', compact([
            'cates',
            'products',
            'slogan_f_p',
            'countdown',
            'arrival_products'
        ]));
    }
}
