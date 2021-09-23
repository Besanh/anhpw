<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;

class AdminUser extends User
{
    use HasFactory;
    use Notifiable;

    protected $guard = 'admins';
    
    protected $table = "admin_user";

    protected $fillable = ['name', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];
}
