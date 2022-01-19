<?php

namespace App\Models;

use App\Traits\UpdateModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subscriber extends Model
{
    use HasFactory, UpdateModel;

    public $timestamps = true;

    protected $fillable = ['email', 'ip', 'device'];
}
