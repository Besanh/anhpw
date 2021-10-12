<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Price;
use App\Models\Product;
use App\Models\ProductBestSeller;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class CateController extends Controller
{
    public function getCate(string $alias, $limit = 9, $sort = '')
    {
        $products = null;
        $brands = null;
        $other_cate = null;
        $model_product = new Product();
        $mode_price = new Price();
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
            $query_data = $model_product->queryDataProduct()
                ->where(function ($query) use ($cate_id) {
                    $query->where('products.cate_id', '=', $cate_id);
                });
            if ($sort == 'bestseller') {
                $first_date_month = Carbon::now()->firstOfMonth();
                $last_date_month = Carbon::now()->lastOfMonth();
                // join bang best seller
                $model_product->join('product_bestseller', 'best.pid', '=', 'p.id')
                    ->where(function ($query) use ($first_date_month, $last_date_month) {
                        $query->where('product_bestseller.status', '1')
                            ->whereBetween('date_saved', [$first_date_month, $last_date_month]);
                    });
            } elseif ($sort == 'trending') {
                // join bang trending
            } elseif ($sort == 'price_low_to_high') {
            } elseif ($sort == 'price_high_to_low') {
            }
            $products = $query_data->paginate($limit);

            $brands = Brand::select(DB::raw('count("products.id") as sum_brand, brands.id, brands.name'))
                ->join('products', 'products.bid', '=', 'brands.id')
                ->where([
                    ['brands.status', '=', '1'],
                    ['products.cate_id', '=', $cate_id]
                ])
                ->groupBy('brands.id')
                ->groupBy('brands.name')
                ->get();

            $other_cate = Category::select(DB::raw('count("products.id") as sum_pro_cate, 
            categories.id, 
            categories.name, 
            categories.alias'))
                ->where([
                    ['alias', '!=', $alias],
                    ['status', '=', 1]
                ])
                ->groupBy('categories.id')
                ->groupBy('categories.name')
                ->groupBy('categories.alias')
                ->get();

            $capas = $mode_price->getCapa($cate_id);
        }

        return view('frontend.category.index', compact([
            'alias',
            'limit',
            'brands',
            'products',
            'cate',
            'other_cate',
            'capas'
        ]));
    }
}
