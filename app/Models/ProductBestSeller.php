<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductBestSeller extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['pid', 'date_saved', 'counts', 'status'];
}
