<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;

    public $timestamps = true;

    public $table = 'bill_details';

    protected $fillable = ['bill_id', 'channel_sale', 'devices', 'note', 'status'];

    public function getBill()
    {
        return $this->belongsTo(Bill::class);
    }

    public function getShoppingCart()
    {
        return $this->belongsTo(ShoppingCart::class, 'rowId', 'identifier');
    }
}
