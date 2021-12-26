<?php

namespace App\Models;

use App\Traits\UpdateModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillInvoice extends Model
{
    use HasFactory, UpdateModel;

    public $timestamps = true;

    public $table = 'bill_invoices';

    protected $fillable = ['bill_id', 'company', 'taxcode', 'email', 'phone', 'address', 'note'];

    public function getBillByInvoice()
    {
        return $this->belongsTo(Bill::class, 'bill_id', 'id');
    }
}
