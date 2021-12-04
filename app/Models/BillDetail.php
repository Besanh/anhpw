<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class BillDetail extends Model
{
    use HasFactory;

    public static $channel = ['website' => 'website', 'facebook' => 'facebook'];

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

    public static function getStatus($status)
    {
        switch ($status) {
                // New
            case 1:
                $str = '<div class="bg-danger text-white p-3 rotate-15 d-inline-block my-4">' . self::getStatusName($status) . '</div>';
                break;

                // Dang xu ly
            case 2:
                $str = '<div class="bg-primary text-white p-3 rotate-15 d-inline-block my-4">' . self::getStatusName($status) . '</div>';
                break;

                // Dang van chuyen
            case 3:
                $str = '<div class="bg-warning text-white p-3 rotate-15 d-inline-block my-4">' . self::getStatusName($status) . '</div>';
                break;

                // Hoan thanh
            case 4:
                $str = '<div class="bg-success text-white p-3 rotate-15 d-inline-block my-4">' . self::getStatusName($status) . '</div>';
                break;

                // Huy
            case 5:
                $str = '<div class="bg-dark text-white p-3 rotate-15 d-inline-block my-4">' . self::getStatusName($status) . '</div>';
                break;
            default:
                $str = '<div class="bg-danger text-white p-3 rotate-15 d-inline-block my-4">' . self::getStatusName($status) . '</div>';
                break;
        }
        return $str;
    }

    public static function getStatusName($status)
    {
        switch ($status) {
            case 1:
                return 'New';
                break;
            case 2:
                return 'Proccessing';
                break;
            case 3:
                return 'Transporting';
                break;
            case 4:
                return 'Complete';
                break;
            case 5:
                return 'Cancel';
                break;
            default:
                return 'New';
                break;
        }
    }

    public static function getStatusJson()
    {
        $data = [
            1 => 'New',
            2 => 'Proccessing',
            3 => 'Transporting',
            4 => 'Complete',
            5 => 'Cancel'
        ];
        return json_encode($data, JSON_FORCE_OBJECT);
    }

    public static function getGenderJson()
    {
        $gender = array(
            0 => 'Male',
            1 => 'Female'
        );
        return json_encode($gender, JSON_FORCE_OBJECT);
    }

    public static function getProvinceJson()
    {
        $data = Cache::remember('province_json', timeToLive(), function () {
            return Provinces::where('status', '=', 1)->select(['id', 'name'])->get();
        });
        if ($data) {
            $arr = [];
            foreach ($data as $node) {
                $arr[$node->id] = $node->name;
            }
            return json_encode($arr, JSON_FORCE_OBJECT);
        }
    }
}
