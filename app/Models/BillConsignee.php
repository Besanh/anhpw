<?php

namespace App\Models;

use App\Traits\UpdateModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BillConsignee extends Model
{
    use HasFactory, UpdateModel;

    public $timestamps = true;

    public $table = 'bill_consignees';

    protected $fillable = ['id', 'bill_id', 'fullname', 'email', 'phone', 'address', 'note'];

    public function getBillByConsignee()
    {
        return $this->belongsTo(Bill::class, 'bill_id', 'id');
    }
}
