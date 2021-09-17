<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['sap_id', 'pid', 'barcode', 'name', 'name_seo', 'sex', 'capa', 'capa_id', 'price', 'note', 'promote', 'status', 'stock'];

    public function getProduct()
    {
        return $this->belongsTo(Product::class, 'pid', 'id');
    }
}
