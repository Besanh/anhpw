<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;

    public static $ORG = '_org';
    public static $THUMB = '_thumb';

    public $timestamps = true;

    protected $fillable = ['name', 'name_seo', 'description', 'priority', 'status', 'image'];
}
