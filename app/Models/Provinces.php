<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Provinces extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'status', 'note'];

    public function getDistricts()
    {
        return $this->hasMany(Districts::class, 'province_id', 'id');
    }
}
