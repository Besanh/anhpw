<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SeoPage extends Model
{
    use HasFactory;

    public $timestamps = true;

    public $table = 'seo_pages';

    protected $fillable = [
        'title',
        'pid',
        'page_name',
        'seo_desc',
        'seo_keyword',
        'seo_robot'
    ];

    public function getProduct()
    {
        return $this->belongsTo(Product::class, 'pid', 'id');
    }
}
