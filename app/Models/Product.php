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
        'designer', 'public_year', 'image', 'description',
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
}
