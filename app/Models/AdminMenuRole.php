<?php

namespace App\Models;

use App\Traits\UpdateModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AdminMenuRole extends Model
{
    use HasFactory, UpdateModel;

    public $timestamp = true;

    protected $fillable = ['menu', 'role_id'];
}
