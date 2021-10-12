<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Price extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['sap_id', 'pid', 'barcode', 'name', 'name_seo', 'sex', 'capa', 'capa_id', 'price', 'note', 'promote', 'status', 'stock'];

    public function getProduct()
    {
        return $this->belongsTo(Product::class, 'pid', 'id');
    }

    /**
     * Lay tat ca capa va group lai
     * Dung cho trang category
     */
    public function getCapa($cate_id)
    {
        return self::select(DB::raw('count("prices.id") as sum_capa, prices.capa'))
            ->join('products', 'products.id', '=', 'prices.pid')
            ->join('categories', 'categories.id', '=', 'products.cate_id')
            ->where([
                ['prices.status', '=', 1],
                ['products.status', '=', 1],
                ['categories.status', '=', 1],
                ['categories.id', '=', $cate_id]
            ])
            ->groupBy('prices.capa')
            ->get();
    }
}
