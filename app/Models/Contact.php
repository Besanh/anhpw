<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Contact extends Model
{
    use HasFactory;

    public $timestamps = true;

    public static $types = ['help' => 'help', 'contact' => 'contact'];

    protected $fillable = ['type', 'rep_id', 'name', 'email', 'phone', 'address', 'subject', 'content', 'reply', 'status', 'is_send_email', 'created_by', 'updated_by'];

    /**
     * Record do client tao thi created_by = 0
     * Khi update thi chi update updated_by = current user
     */
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = 0;
            $model->updated_by = 0;
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::guard('admin')->id();
        });
    }
}
