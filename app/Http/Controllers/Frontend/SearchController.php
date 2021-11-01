<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Price;
use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    /**
     * Search product
     */
    public function searchByProduct(Request $request)
    {
        $query = $request->get('search');
        if ($query) {
            $rs = '';
            $rs = Product::select([
                'products.id',
                'products.name',
                'products.name_seo',
                'products.image',
                'brands.alias as b_alias'
            ])
                ->join('brands', 'brands.id', '=', 'products.bid')
                ->where('products.name', 'like',  '%' . $query . '%')
                ->orWhere('products.name_seo', 'like', '%' . $query . '%')
                ->where(function ($query) {
                    $query->where([
                        ['products.status', '=', 1],
                        ['brands.status', '=', 1]
                    ]);
                })
                ->limit(5)
                ->get();
            return response()->json($rs);
        }
        return redirect()->route('comming-soon');
    }

    /**
     * Search price name, price
     */
    public function searchByPrice(Request $request)
    {
        $query = $request->get('search');
        if ($query) {
            $rs = '';
            $rs = Price::select([
                'prices.name as price_name',
                'prices.name_seo as price_name_seo',
                'products.id',
                'products.name',
                'products.name_seo',
                'brands.alias as b_alias'
            ])
                ->join('products', 'products.id', '=', 'prices.pid')
                ->join('brands', 'brands.id', '=', 'products.bid')
                ->where('price', 'like', '%' . $query . '%')
                ->orWhere('prices.name', 'like', '%' . $query . '%')
                ->orWhere('prices.name_seo', 'like', '%' . $query . '%')
                ->where(function ($query) {
                    $query->where([
                        ['prices.status', '=', 1],
                        ['products.status', '=', 1],
                        ['brands.status', '=', 1]
                    ]);
                })
                ->limit(5)
                ->get();
            return response()->json($rs);
        }
        return redirect()->route('comming-soon');
    }

    /**
     * Search cate
     */
    public function searchByCate(Request $request)
    {
        $query = $request->get('search');
        if ($query) {
            $rs = '';
            $rs = Category::where('name', 'like', '%' . $query . '%')
                ->orWhere('name_seo', 'like', '%' . $query . '%')
                ->where(function ($query) {
                    $query->where('status', 1);
                })
                ->limit(5)
                ->get();
            return response()->json($rs);
        }
        return redirect()->route('comming-soon');
    }

    /**
     * Search brand
     */
    public function searchByBrand(Request $request)
    {
        $query = $request->get('search');
        if ($query) {
            $rs = '';
            $rs = Brand::where('name', 'like', '%' . $query . '%')
                ->orWhere('name_seo', 'like', '%' . $query . '%')
                ->where(function ($query) {
                    $query->where('status', 1);
                })
                ->limit(5)
                ->get();
            return response()->json($rs);
        }
        return redirect()->route('comming-soon');
    }

    /**
     * Search blog
     */
    public function searchByBlog(Request $request)
    {
    }

    /**
     * Search advance theo season hay collection, arrival
     */
}
