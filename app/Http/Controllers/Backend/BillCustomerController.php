<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController as Controller;
use App\Models\BillCustomer;
use Illuminate\Http\Request;

class BillCustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:bill-customer-list', ['only' => ['index']]);
    }
    public function index()
    {
        $customers = BillCustomer::orderBy('id', 'DESC')->get();

        return view('admin.bill-customer.index', compact('customers'));
    }
}
