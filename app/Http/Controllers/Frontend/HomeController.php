<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\RevolutionSlider;
use App\Models\Setting;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;

class HomeController extends Controller
{
    public function index()
    {
        $now = Carbon::createFromFormat('Y-m-d H:i:s', now());
        $model_product = new Product();
        Cache::remember('sliders', timeToLive(), function () use ($now) {
            return RevolutionSlider::where([
                ['status', '=', 1],
                ['start_date', '<=', $now],
                ['end_date', '>=', $now]
            ])
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

        $slogan_feature_product = Cache::remember('slogan_f_p', timeToLive(), function () {
            return Setting::where([
                ['name', '=', 'featured_product'],
                ['status', '=', 1]
            ])
                ->select('value_setting')
                ->first();
        });

        $slogan_new_arrival_product = Cache::remember('slogan_new_arrival_product', timeToLive(), function () {
            return Setting::where([
                ['name', '=', 'slogan_new_arrival_product'],
                ['status', '=', 1]
            ])
                ->select('value_setting')
                ->first();
        });

        // $countdown = Cache::remember('countdown', timeToLive(), function () {
        //     return Setting::where([
        //         ['name', '=', 'countdown'],
        //         ['status', '=', 1]
        //     ])
        //         ->select('value_setting')
        //         ->first();
        // });

        return view('frontend.home.home', compact([
            'slogan_feature_product',
            'slogan_new_arrival_product',
            // 'countdown',
        ]));
    }
}
