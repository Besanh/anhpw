<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BillConsignee;
use Illuminate\Http\Request;

class BillConsigneeController extends Controller
{
    public function index()
    {
        $consignees = BillConsignee::orderBy('id', 'DESC')->get();
        return view('admin.bill-consignee.index', compact('consignees'));
    }
}
