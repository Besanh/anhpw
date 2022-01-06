<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Product;
use App\Http\Controllers\Controller;

class PromotionController extends Controller
{
    public function newArrival()
    {
        $model = new Product();
        $title = 'New Arrival Product';
        $products = $model->getArrivalProduct();
        return view('frontend.new-arrival.index', compact('products', 'title'));
    }
}
