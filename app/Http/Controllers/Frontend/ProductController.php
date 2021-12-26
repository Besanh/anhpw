<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ShippingFee;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Cache;

class ProductController extends Controller
{
    public function index($brand_alias, $id, $product_alias)
    {
        $product_detail = Product::select([
            'products.*',
        ])
            ->join('prices', 'prices.pid', '=', 'products.id')
            ->join('categories', 'categories.id', '=', 'products.cate_id')
            ->where([
                ['products.id', '=', $id],
                ['categories.status', '=', 1],
                ['products.status', '=', 1],
                ['prices.status', '=', 1],
            ])
            ->first();
        $product_items = Product::select([
            'categories.name as cate_name',
            'categories.name_seo as cate_name_seo',
            'products.id',
            'products.cate_id',
            'products.name as p_name',
            'products.name_seo as p_name_seo',
            'products.benefit',
            'products.ingredient',
            'products.description',
            'products.image',
            'products.image_thumb_small',
            'products.galleries',
            'products.thumb_small',
            'products.designer',
            'products.public_year',
            'products.incense_group',
            'products.styles',
            'brands.name as brand_name',
            'brands.name_seo as brand_name_seo',
            'prices.id as price_id',
            'prices.sap_id',
            'prices.barcode',
            'prices.name as price_name',
            'prices.name_seo as price_name_seo',
            'prices.price',
            'prices.capa',
            'prices.capa_id',
            'prices.stock'
        ])
            ->join('categories', 'categories.id', '=', 'products.cate_id')
            ->join('brands', 'brands.id', '=', 'products.bid')
            ->join('prices', 'prices.pid', '=', 'products.id')
            ->where([
                ['categories.status', '=', 1],
                ['brands.alias', '=', $brand_alias],
                ['brands.status', '=', 1],
                ['products.id', '=', $id],
                ['products.status', '=', 1],
                ['prices.status', '=', 1]
            ])
            ->get();

        if ($product_detail) {
            $related_products = Product::queryDataProduct()
                ->where([
                    ['brands.alias', '=', $brand_alias],
                    ['products.id', '!=', $product_detail->id],
                    ['products.cate_id', '=', $product_detail->cate_id],
                    ['products.id', '=', $id],
                    ['brands.status', '=', 1],
                    ['products.status', '=', 1],
                    ['products.promote', '>', 0],
                    ['prices.status', '=', 1],
                    ['prices.stock', '>', 0],
                ])
                ->limit(4)
                ->get();

            $shippingFees = Cache::rememberForever('shippingFees', function () {
                return ShippingFee::where('status', '=', 1)
                    ->get();
            });

            return view('frontend.product.index', compact('product_detail', 'product_items', 'related_products', 'shippingFees'));
        }
        return redirect()->route('comming-soon');
    }

    /**
     * Get
     * Click capa change info product
     */
    public function clickCapaBindInfo($id)
    {
        $product_detail = Product::select([
            'products.id',
            'prices.id as price_id',
            'prices.name',
            'prices.name_seo',
            'prices.barcode',
            'prices.sap_id',
            'prices.price'
        ])
            ->join('prices', 'prices.pid', '=', 'products.id')
            ->join('categories', 'categories.id', '=', 'products.cate_id')
            ->where([
                ['prices.id', '=', $id],
                ['categories.status', '=', 1],
                ['products.status', '=', 1],
                ['prices.status', '=', 1],
            ])
            ->first();
        if ($product_detail) {
            return response()->json($product_detail, 200);
        }
        return response()->json(['message' => 'Data not found'], 200);
    }
}
