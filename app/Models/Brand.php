<?php

namespace App\Models;

use App\Traits\UpdateModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory, UpdateModel;

    public $timestamps = true;

    protected $fillable = ['name', 'name_seo', 'alias', 'description', 'priority', 'status', 'image'];

    public function getProducts()
    {
        return $this->hasMany(Product::class, 'bid', 'id');
    }
}
