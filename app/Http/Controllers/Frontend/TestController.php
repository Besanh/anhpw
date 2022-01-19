<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Bill;

class TestController extends Controller
{
    public function index()
    {
        $bill = Bill::where('id', 3)->first();
        getArray(getTimeNotification($bill->created_at));
    }
}
