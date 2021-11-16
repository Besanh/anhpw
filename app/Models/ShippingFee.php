<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingFee extends Model
{
    use HasFactory;

    public $timestamps = true;

    public static $delivery_type = [
        'standard' => 'Standard Delivery',
        'next_day' => 'Next Day',
        'saturday' => 'Saturday Delivery',
        'outside_office_hours' => 'Delivery Outside Office Hours',
        'time_in_work' => 'Delivery In Time In Works'
    ];

    public $fillable = ['destination', 'delivery_type', 'delivery_time', 'cost', 'status'];
}
