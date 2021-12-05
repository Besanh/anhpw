<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['title', 'sub_title', 'priority', 'status'];

    public function getHelpContent()
    {
        return $this->hasMany(HelpContent::class, 'help_id', 'id');
    }
}
