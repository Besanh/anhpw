<?php

namespace App\Models;

use App\Models\Backend\AdminUser;
use App\Traits\UpdateModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory, UpdateModel;

    public $timestamp = true;

    protected $fillable = ['user_id', 'gender', 'avatar', 'birthday', 'fullname', 'phone', 'address'];

    public function getUserAdmin()
    {
        return $this->hasOne(AdminUser::class, 'user_id', 'id');
    }

    public function getUser()
    {
        return $this->hasOne(User::class, 'user_id', 'id');
    }
}
