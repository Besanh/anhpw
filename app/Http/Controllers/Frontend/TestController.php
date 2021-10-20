<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TestController extends Controller
{
    public function index()
    {
        echo route('product-detail',['brand_alias' => 'kenzo', 'id' => 1, 'product_alias' => 'kenzo']);
    }
}
