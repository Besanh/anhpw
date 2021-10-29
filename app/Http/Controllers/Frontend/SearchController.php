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
            $rs = Product::where('name', 'like',  '%' . $query . '%')
                ->orWhere('name_seo', 'like', '%' . $query . '%')
                ->where(function ($query) {
                    $query->where('status', 1);
                })
                ->get();
            return $rs ? response()->json($rs) : 'No data found';
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
            $rs = Price::where('price', 'like', '%' . $query . '%')
                ->orWhere('name', 'like', '%' . $query . '%')
                ->orWhere('name_seo', 'like', '%' . $query . '%')
                ->where(function ($query) {
                    $query->where('status', 1);
                })
                ->get();
            return $rs ? response()->json($rs) : 'No data found';
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
                ->get();
            return $rs ? response()->json($rs) : 'No data found';
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
                ->get();
            return $rs ? response()->json($rs) : 'No data found';
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
