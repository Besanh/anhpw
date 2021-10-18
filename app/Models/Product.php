<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class Product extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = [
        'cate_id', 'bid', 'name', 'name_seo',
        'designer', 'public_year', 'image', 'thumb',
        'description', 'benefit', 'ingredient',
        'galleries', 'promote', 'status'
    ];

    public function getCates()
    {
        return $this->belongsTo(Category::class, 'cate_id', 'id');
    }

    public function getBrands()
    {
        return $this->belongsTo(Brand::class, 'bid', 'id');
    }

    public function getPrices()
    {
        return $this->hasMany(Price::class, 'pid', 'id');
    }

    public function getCateMap()
    {
        $combined = [];
        $collection = collect(['name']);
        $query = Category::select(['id', 'name'])
            ->orderByRaw('updated_at desc, id')
            ->get();
        if ($query) {
            foreach ($query as $node) {
                $combined[$node->id] = Arr::get($collection->combine(['name' => $node->name]), 'name');
            }
        }

        return $combined;
    }

    public function getBrandMap()
    {
        $combined = [];
        $collection = collect(['name']);
        $query = Brand::select(['id', 'name'])
            ->orderByRaw('updated_at desc, id')
            ->get();
        if ($query) {
            foreach ($query as $node) {
                $combined[$node->id] = Arr::get($collection->combine(['name' => $node->name]), 'name');
            }
        }

        return $combined;
    }

    /**
     * Lay featured product homepage
     */
    public function getFeaturedProduct()
    {
        return $this->queryDataProduct()->get();
    }

    /**
     * Lay product trang chu
     */
    public function getArrivalProduct()
    {
        $now_date = date('Y-m-d H:i:s');
        $minus_date = dateBeforeAfter($now_date, '-');
        $data = $this->queryDataProduct()
            ->where(function ($query) use ($now_date, $minus_date) {
                $query->where([
                    ['products.updated_at', '>=', $minus_date],
                    ['products.updated_at', '<=', $now_date]
                ]);
            })
            ->get();
        return $data;
    }

    public function queryDataProduct()
    {
        return self::select([
            'products.id',
            'products.name',
            'products.name_seo',
            'products.image',
            'prices.price',
            'prices.barcode',
            'prices.stock',
            'categories.name as cate_name',
            'products.image',
            'products.thumb',
            'products.benefit',
            'products.ingredient',
            'products.created_at'
        ])
            ->join('prices', 'prices.pid', '=', 'products.id')
            ->join('categories', 'categories.id', '=', 'products.cate_id')
            ->join('brands', 'brands.id', 'products.bid')
            ->where([
                ['prices.status', '=', 1],
                ['products.status', '=', 1],
                ['categories.status', '=', 1],
                ['prices.stock', '>', 0]
            ])
            ->orderBy('products.promote', 'DESC')
            ->orderBy('prices.promote', 'DESC');
    }
}
