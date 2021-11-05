<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\RevolutionSlider;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $model_product = new Product();
        Cache::remember('sliders', timeToLive(), function () {
            return RevolutionSlider::where('status', 1)
                ->select(['image', 'link', 'type', 'title', 'type_writter', 'btn_name'])
                ->orderBy('priority', 'DESC')
                ->get();
        });
        Cache::remember('home_products', timeToLive(), function () use ($model_product) {
            return $model_product->getFeaturedProduct();
        });
        Cache::remember('home_arrival_products', timeToLive(), function () use ($model_product) {
            return $model_product->getArrivalProduct();
        });

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
            'slogan_f_p',
            'countdown',
        ]));
    }
}
