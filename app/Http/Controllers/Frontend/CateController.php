<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Price;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class CateController extends Controller
{
    public function getCate(Request $request, string $alias, $limit = 9)
    {
        $query = $request->all();
        $sort = Arr::get($query, 'filter.sort');
        $products = null;
        $brands = null;
        $other_cate = null;
        $mode_price = new Price();
        $cate = Category::where([
            ['alias', '=', $alias],
            ['status', '=', 1]
        ])
            ->select([
                'id',
                'name',
                'name_seo',
                'alias',
                'description',
                'image',
                'big_thumb'
            ])
            ->first();
        if ($cate) {
            $cate_id = $cate->id;
            if (Arr::get($query, 'filter')) {
                $filter_bid = explode(',', Arr::get($query, 'filter.bid'));
                $filter_capa = explode(',', Arr::get($query, 'filter.capa'));
                $query_data = Product::queryDataProduct()
                    ->where(function ($query) use ($cate_id) {
                        $query->where('products.cate_id', '=', $cate_id);
                    });
                if (Arr::get($query, 'filter.bid')) {
                    $query_data->where(function ($query) use ($filter_bid) {
                        $query->whereIn('bid', $filter_bid);
                    });
                }
                if (Arr::get($query, 'filter.capa')) {
                    $query_data->where(function ($query) use ($filter_capa) {
                        $query->whereIn('prices.capa', $filter_capa);
                    });
                }
            } else {
                $query_data = Product::queryDataProduct()
                    ->where(function ($query) use ($cate_id) {
                        $query->where('products.cate_id', '=', $cate_id);
                    });
                if ($sort == 'bestseller') {
                    $first_date_month = Carbon::now()->firstOfMonth();
                    $last_date_month = Carbon::now()->lastOfMonth();
                    // join bang best seller
                    $$query_data->join('product_bestseller', 'best.pid', '=', 'p.id')
                        ->where(function ($query) use ($first_date_month, $last_date_month) {
                            $query->where('product_bestseller.status', 1)
                                ->whereBetween('date_saved', [$first_date_month, $last_date_month]);
                        });
                } elseif ($sort == 'trending') {
                    // join bang trending
                } elseif ($sort == 'price_low_to_high') {
                } elseif ($sort == 'price_high_to_low') {
                }
            }

            $products = $query_data->paginate(Arr::get($query, 'filter.limit') ? Arr::get($query, 'filter.limit') : $limit);
            if (Arr::get($query, 'filter.bid')) {
                $products->appends(['filter[bid]' => Arr::get($query, 'filter.bid')]);
            }
            if (Arr::get($query, 'filter.capa')) {
                $products->appends(['filter[capa]' => Arr::get($query, 'filter.capa')]);
            }
            if (Arr::get($query, 'filter.limit')) {
                $products->appends(['filter[limit]' => Arr::get($query, 'filter.limit')]);
            }
            if (Arr::get($query, 'filter.show')) {
                $products->appends(['filter[show]' => Arr::get($query, 'filter.show')]);
            }

            $brands = Brand::withCount(['getProducts'])
                ->join('products', 'products.bid', '=', 'brands.id')
                ->where([
                    ['brands.status', '=', '1'],
                    ['products.status', '=', 1],
                    ['products.cate_id', '=', $cate_id]
                ])
                ->orderBy('brands.priority', 'DESC')
                ->orderBy('products.promote', 'DESC')
                ->get();

            $other_cate = Category::select([
                'categories.name',
                'categories.name_seo',
                'categories.alias'
            ])
                ->join('prices', 'prices.cate_id', '=', 'categories.id')
                ->where([
                    ['categories.status', '=', 1],
                    ['categories.id', '!=', $cate_id]
                ])
                ->withCount('getPrices')
                ->groupBy('categories.id')
                ->get();

            $capas = $mode_price->getCapa($cate_id);
            $show = Arr::get($query, 'filter.show');
            return view('frontend.category.index', compact([
                'alias',
                'limit',
                'brands',
                'other_cate',
                'capas',
                'products',
                'cate',
                'sort',
                'show'
            ]));
        } else {
            return redirect()->route('comming-soon');
        }
    }

    /**
     * Filter left sidebar page cate
     * method POST
     */
    public function postFilter(Request $request)
    {
        $products = null;
        $bids = [];
        $capas = [];
        $data = $request->all();
        if (Arr::get($data, 'bid')) {
            foreach (Arr::get($data, 'bid') as $itam) {
                array_push($bids, Arr::get($itam, 'value'));
            }
        }

        if (Arr::get($data, 'capa')) {
            foreach (Arr::get($data, 'capa') as $c) {
                array_push($capas, Arr::get($c, 'value'));
            }
        }
        if (Arr::get($data, 'cate')) {
            $cate = Category::where([
                ['alias', '=', Arr::get($data, 'cate')],
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
                $query_data = Product::queryDataProduct()
                    ->where(function ($query) use ($cate_id, $bids, $capas) {
                        $query->where([
                            ['products.cate_id', '=', $cate_id]
                        ]);
                        if (count($bids) > 0) {
                            $query->whereIn('brands.id', $bids);
                        }
                        if (count($capas) > 0) {
                            $query->whereIn('prices.capa', $capas);
                        }
                    });
                $products = $query_data->paginate(1);
            }
        }

        return response()->view('frontend.category.ajax.item', compact(['products']));
    }

    /**
     * Filter cate
     * method GET
     */
    public function getFilter(Request $request, $alias, $limit = 9)
    {
        $products = null;
        $brands = null;
        $other_cate = null;
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
            $brands = Brand::where('status', 1)->get();
            $query_data = QueryBuilder::for(Product::class)
                ->allowedFilters([
                    AllowedFilter::exact('bid', 'bid'),
                ])
                ->join('categories', 'products.cate_id', 'categories.id')
                ->where(function ($query) use ($cate_id) {
                    $query->where('products.cate_id', '=', $cate_id);
                });
            $products = $query_data->paginate($limit);
            return view('frontend.category.index', compact(['products']));
        }
    }
}
