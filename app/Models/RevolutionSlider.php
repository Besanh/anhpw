<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RevolutionSlider extends Model
{
    use HasFactory;

    const SLIDE_TYPES = [
        "SLIDE_NO_TYPE" => "SLIDE NO TYPE",
        "SLIDE_WRITTER" => "SLIDE WRITTER",
        "SLIDE_BTN_WRITTER" => "SLIDE BTN WRITTER"
    ];

    public $timestamps = true;

    public $fillable = ['type', 'image', 'title', 'type_writter', 'btn_name', 'link', 'priority', 'status'];
}
