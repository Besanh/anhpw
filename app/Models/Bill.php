<?php

namespace App\Models;

use App\Traits\UpdateModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    use HasFactory, UpdateModel;

    public $timestamps = true;

    public $table = 'bills';

    protected $fillable = ['bill_no', 'total_price', 'total_discount', 'total_cost', 'total_tax', 'shipping_cost', 'payment', 'note'];

    public function getCustomer()
    {
        return $this->hasOne(BillCustomer::class, 'id', 'bill_id');
    }

    public function getConsigneeByBill()
    {
        return $this->belongsTo(BillConsignee::class, 'id', 'bill_id');
    }

    public function getInvoiceByBill()
    {
        return $this->belongsTo(BillInvoice::class, 'id', 'bill_id');
    }

    public function getBillDetail()
    {
        return $this->belongsTo(BillDetail::class, 'id', 'bill_id');
    }
}
