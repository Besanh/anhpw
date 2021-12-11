<?php

namespace App\Models;

use App\Traits\UpdateModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HelpType extends Model
{
    use HasFactory;
    use UpdateModel;

    public $timestamps = true;

    protected $fillable = ['name', 'alias', 'priority', 'status'];

    public function getHelp()
    {
        return $this->hasMany(Help::class, 'help_type_id', 'id');
    }
}
