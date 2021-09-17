<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['name', 'name_seo', 'description', 'image', 'status'];

    public function getProducts()
    {
        return $this->hasMany(Product::class, 'cate_id', 'id');
    }
}
