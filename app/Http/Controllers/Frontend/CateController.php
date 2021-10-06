<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CateController extends Controller
{
    public function getCate(string $alias)
    {
        $products = null;
        $brands = null;
        $model_product = new Product();
        $cate = Category::where([
            ['alias', '=', $alias],
            ['status', '=', 1]
        ])
            ->select([
                'id',
                'name',
                'alias',
                'description',
                'image',
                'big_thumb'
            ])
            ->first();
        if ($cate) {
            $cate_id = $cate->id;
            $products = $model_product->queryDataProduct()
                ->where(function ($query) use ($cate_id) {
                    $query->where('products.cate_id', '=', $cate_id);
                })
                ->get();
        }
        $brands = Brand::where('status', '1')
            ->select(['id', 'name'])
            ->get();
        return view('frontend.category.index', compact(['brands', 'products', 'cate']));
    }
}
