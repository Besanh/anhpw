<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    public $timestamp = true;

    protected $fillable = ['province_id', 'name', 'location', 'link', 'tel', 'email', 'website', 'working_time', 'image', 'note', 'status'];
}
