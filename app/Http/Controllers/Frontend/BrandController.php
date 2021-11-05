<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Support\Facades\Cache;

class BrandController extends Controller
{
    public function listBrand()
    {
        $brands = Brand::where('status', 1)
            ->orderBy('priority', 'DESC')
            ->paginate(8);

        return view('frontend.brand.list', compact('brands'));
    }

    public function brandIndex($alias)
    {
        $brand = Brand::where([
            ['alias', '=', $alias],
            ['status', '=', 1]
        ])
            ->select([
                'description',
                'name',
                'name_seo'
            ])
            ->first();
        if ($brand) {
            $products = Product::select([
                'brands.id',
                'brands.alias as b_alias',
                'brands.name as b_name',
                'brands.name_seo as b_name_seo',
                'brands.image as b_image',
                'products.id as pid',
                'products.name',
                'products.name_seo',
                'products.image',
                'products.created_at',
                'categories.name_seo as cate_name_seo',
                'categories.alias as cate_alias',
                'prices.stock',
                'prices.price'
            ])
                ->join('brands', 'brands.id', '=', 'products.bid')
                ->join('categories', 'categories.id', '=', 'products.cate_id')
                ->join('prices', 'prices.pid', '=', 'products.id')
                ->groupBy('prices.id')
                ->where([
                    ['categories.status', '=', 1],
                    ['brands.alias', '=', $alias],
                    ['brands.status', '=', 1],
                    ['products.status', '=', 1],
                    ['prices.status', '=', 1]
                ])
                ->orderBy('products.promote', 'DESC')
                ->orderBy('prices.stock', 'DESC')
                ->paginate(8);


            return view('frontend.brand.index', compact(['brand', 'products']));
        }
        return redirect()->route('comming-soon');
    }
}
