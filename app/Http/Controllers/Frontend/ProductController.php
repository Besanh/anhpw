<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index($brand_id, $id, $alias)
    {
        $brand = Brand::where('id', $brand_id)
        ->select(['name', 'name_seo'])
        ->first();
        if($brand)
        {
            $product = Product::where('id', $id)
            ->first();
            if($product)
            {
                
            }
        }
        return redirect()->route('comming-soon');
    }
}
