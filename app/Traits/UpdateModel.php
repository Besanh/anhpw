<?php

namespace App\Traits;

use Illuminate\Support\Facades\Auth;

trait UpdateModel
{
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->created_by = Auth::guard('admin')->id();
            $model->updated_by = 0;
        });

        static::updating(function ($model) {
            $model->updated_by = Auth::guard('admin')->id();
        });
    }
}
