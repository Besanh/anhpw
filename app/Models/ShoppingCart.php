<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    public $timestamps = true;

    public $table = 'shoppingcart';

    protected $fillable = ['identifier', 'instance', 'content'];

    public function getBillDetailByRowId()
    {
        return $this->belongsTo(BillDetail::class, 'identifier', 'rowId');
    }
}
