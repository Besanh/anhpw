<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoPage extends Model
{
    use HasFactory;

    public $timestamps = true;

    public $fillable = [
        'title',
        'pid',
        'page_name',
        'seo_desc',
        'seo_keyword'
    ];

    public function getProduct()
    {
        return $this->belongsTo(Product::class, 'pid', 'id');
    }
}
