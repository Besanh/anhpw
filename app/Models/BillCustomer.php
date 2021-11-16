<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillCustomer extends Model
{
    use HasFactory;

    public $timestamps = true;

    public $table = 'bill_customers';

    protected $fillable = ['bill_id', 'fullname', 'gender', 'phone', 'email', 'province', 'district', 'address', 'note', 'zipcode'];

    public function getBill()
    {
        return $this->hasMany(Bill::class, 'id', 'bill_id');
    }
}
