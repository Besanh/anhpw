<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;

class ProductController extends Controller
{
    public function index($brand_alias, $id, $product_alias)
    {
        $product = Product::select([
            'products.id as p_id',
            'products.name as p_name',
            'products.name_seo as p_name_seo',
            'products.benefit',
            'products.ingredient',
            'products.description',
            'products.image',
            'products.image_thumb_small',
            'products.galleries',
            'products.thumb_small',
            'brands.name as brand_name',
            'brands.name_seo as brand_name_seo',
            'prices.sap_id',
            'prices.barcode',
            'prices.name as price_name',
            'prices.name_seo as price_name_seo',
            'prices.price',
            'prices.capa',
            'prices.capa_id',
            'prices.stock'
        ])
            ->join('brands', 'brands.id', '=', 'products.bid')
            ->join('prices', 'prices.pid', '=', 'products.id')
            ->where([
                ['brands.alias', '=', $brand_alias],
                ['products.id', '=', $id],
                ['brands.status', '=', 1],
                ['products.status', '=', 1],
                ['prices.status', '=', 1]
            ])
            ->first();
        if ($product) {
            $related_products = Product::queryDataProduct()
                ->where([
                    ['brands.alias', '=', $brand_alias],
                    ['products.id', '!=', $product->p_id],
                    ['products.cate_id', '=', $product->cate_id],
                    ['products.id', '=', $id],
                    ['brands.status', '=', 1],
                    ['products.status', '=', 1],
                    ['products.promote', '>', 0],
                    ['prices.status', '=', 1],
                    ['prices.stock', '>', 0],
                ])
                ->limit(4)
                ->get();
            return view('frontend.product.index', compact(['product', 'related_products']));
        }
        return redirect()->route('comming-soon');
    }
}
