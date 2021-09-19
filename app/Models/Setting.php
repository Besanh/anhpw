<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['name', 'value_setting', 'type', 'status'];

    const SETTING_TYPES = ["json" => "Json", "text" => "Text"];
}
