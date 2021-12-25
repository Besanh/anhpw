<?php

namespace App\Models;

use App\Traits\UpdateModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialProvider extends Model
{
    use HasFactory, UpdateModel;

    public $timestamps = true;

    protected $fillable = ['provider_id', 'email', 'provider', 'type'];

    public function getUser()
    {
        return $this->hasOne(User::class);
    }
}
