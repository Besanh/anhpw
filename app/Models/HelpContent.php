<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpContent extends Model
{
    use HasFactory;

    public $timestamps = true;

    protected $fillable = ['help_id', 'title', 'content', 'priority', 'status'];

    public function getHelp()
    {
        return $this->belongsTo(Help::class, 'help_id', 'id');
    }
}
