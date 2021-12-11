<?php

namespace App\Models;

use App\Traits\UpdateModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Help extends Model
{
    use HasFactory;
    use UpdateModel;

    public $timestamps = true;

    protected $fillable = ['help_type_id', 'title', 'sub_title', 'priority', 'status'];

    public function getHelpContent()
    {
        return $this->hasMany(HelpContent::class, 'help_id', 'id');
    }

    public function getHelpType()
    {
        return $this->belongsTo(HelpType::class, 'help_type_id', 'id');
    }
}
