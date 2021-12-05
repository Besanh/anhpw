<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BillInvoice;
use Illuminate\Http\Request;

class BillInvoiceController extends Controller
{
    public function index()
    {
        $invoices = BillInvoice::orderBy('id', 'DESC')->get();

        return view('admin.bill-invoice.index', compact('invoices'));
    }
}
