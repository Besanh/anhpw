<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class GiftCardController extends Controller
{
    public function index()
    {
        $gift_cards = Product::select([
            'products.id',
            'products.name',
            'products.name_seo',
            'products.image',
            'products.thumb',
            'products.benefit',
            'products.ingredient',
            'products.description',
            'products.created_at',
            'prices.id as price_id',
            'prices.price',
            'prices.barcode',
            'prices.stock',
            'categories.name as cate_name',
            'categories.name_seo as cate_name_seo',
            'categories.alias as cate_alias',
            'brands.alias as b_alias',
        ])
            ->join('prices', 'prices.pid', '=', 'products.id')
            ->join('categories', 'categories.id', '=', 'products.cate_id')
            ->join('brands', 'brands.id', 'products.bid')
            ->where([
                ['categories.alias', '=', 'gift-card'],
                ['prices.status', '=', 1],
                ['products.status', '=', 1],
                ['categories.status', '=', 1],
                ['prices.stock', '>', 0]
            ])
            ->groupBy('products.id')
            ->groupBy('prices.id')
            ->orderBy('prices.stock', 'DESC')
            ->orderBy('products.promote', 'DESC')
            ->orderBy('prices.promote', 'DESC')
            ->get();

        return view('frontend.gift-card.index', compact('gift_cards'));
    }
}
