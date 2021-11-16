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

    /**
     * Get item cart
     */
    public static function getItemCart($id, $selling_id = 0)
    {
        $data = self::select([
            'prices.id',
            'sap_id',
            'barcode',
            'pid',
            'prices.name',
            'prices.name_seo',
            'capa',
            'capa_id',
            'price',
            'stock',
            'note',
            'products.image',
            'brands.alias as b_alias'
        ])
            ->join('products', 'products.id', '=', 'prices.pid')
            ->join('brands', 'brands.id', '=', 'products.bid')
            ->where([
                ['pid', '!=', 0],
                ['prices.status', '=', 1],
                ['products.status', '=', 1],
                ['prices.id', '=', $id],
                ['brands.status', '=', 1]
            ])
            ->first();
        return $data;
    }

    /**
     * Get capa id name from cart
     */
    public static function getCapaNameViaCart($capa_id)
    {
        return Capacity::where([
            ['status', '=', 1],
            ['id', '=', $capa_id]
        ])
            ->select('name')
            ->first();
    }
}
