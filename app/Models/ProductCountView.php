<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCountView extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['pid', 'view', 'device'];


    public function products()
    {
        return $this->belongsTo(Product::class, 'id', 'pid');
    }
}
