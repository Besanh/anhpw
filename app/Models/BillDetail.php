<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    use HasFactory;

    public static $channel = ['website' => 'Website', 'facebook' => 'Facebook'];

    public $timestamps = true;

    public $table = 'bill_details';

    protected $fillable = ['bill_id', 'channel_sale', 'devices', 'status'];

    public function getBill()
    {
        return $this->belongsTo(Bill::class, 'bill_id', 'id');
    }

    public function getShoppingCart()
    {
        return $this->belongsTo(ShoppingCart::class, 'bill_id', 'identifier');
    }

    public function getCustomer($bill_id)
    {
        return BillCustomer::where('bill_id', $bill_id)->first();
    }

    public function getConsignee($bill_id)
    {
        return BillConsignee::where('bill_id', $bill_id)->first();
    }

    public function getInvoice($bill_id)
    {
        return BillInvoice::where('bill_id', $bill_id)->first();
    }

    public function getProvinceName($id)
    {
        return Provinces::where('id', $id)->select('name')->first();
    }

    public function getDistrictName($id)
    {
        return Districts::where('id', $id)->select('name')->first();
    }
}
