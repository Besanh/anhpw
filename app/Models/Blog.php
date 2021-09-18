<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    public $timestamp = true;

    protected $fillable = ['title', 'content', 'image', 'published_at', 'status'];
}
