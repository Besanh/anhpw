<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController as Controller;
use App\Models\BillConsignee;
use App\Models\BillCustomer;
use App\Models\BillDetail;
use App\Models\BillInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BillDetailController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:bill-detail-list', ['only' => ['show']]);
        $this->middleware('permission:bill-editable-customer', ['only' => ['editableCustomer']]);
        $this->middleware('permission:bill-editable-detail', ['only' => ['editableDetail']]);
        $this->middleware('permission:bill-editable-consignee', ['only' => ['editableConsignee']]);
        $this->middleware('permission:bill-editable-invoice', ['only' => ['editableInvoice']]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BillDetail $billDetail)
    {
        return view('admin.bill-detail.show', compact('billDetail'));
    }

    public function editableCustomer(Request $request)
    {
        $pk = $request->pk;
        $name = $request->name;
        $value = $request->value;
        try {
            $model = BillCustomer::where('bill_id', $pk)->first();
            if ($model) {
                if ($model->update([$name => $value])) {
                    $message = 'Update ' . $name . ' to <b>' . $value . '</b> successfully';
                    $view_file = View::make('admin.bill-detail.popup-editable', compact('message'))->render();
                    return response()->json(['message' => $message, 'view_file' => $view_file]);
                } else {
                    $message = 'Error';
                    $view_file = View::make('admin.bill-detail.popup-editable', compact('message'))->render();
                    return response()->json(['message' => 'Error', 'view_file' => $view_file]);
                }
            }
        } catch (\Throwable $e) {
            $message = $e->getMessage();
            $view_file = View::make('admin.bill-detail.popup-editable', compact('message'))->render();
            return response()->json(['message' => $message, 'view_file' => $view_file]);
        }
    }

    public function editableDetail(Request $request)
    {
        $pk = $request->pk;
        $name = $request->name;
        $value = $request->value;
        try {
            $model = BillDetail::where('bill_id', $pk)->first();
            if ($model) {
                if ($model->update([$name => $value])) {
                    $message = 'Update ' . $name . ' to <b>' . $value . '</b> successfully';
                    $view_file = View::make('admin.bill-detail.popup-editable', compact('message'))->render();
                    return response()->json(['message' => $message, 'view_file' => $view_file]);
                } else {
                    $message = 'Error';
                    $view_file = View::make('admin.bill-detail.popup-editable', compact('message'))->render();
                    return response()->json(['message' => 'Error', 'view_file' => $view_file]);
                }
            }
        } catch (\Throwable $e) {
            $message = $e->getMessage();
            $view_file = View::make('admin.bill-detail.popup-editable', compact('message'))->render();
            return response()->json(['message' => $message, 'view_file' => $view_file]);
        }
    }

    public function editableConsignee(Request $request)
    {
        $pk = $request->pk;
        $name = $request->name;
        $value = $request->value;
        try {
            $model = BillConsignee::where('bill_id', $pk)->first();
            if ($model) {
                if ($model->update([$name => $value])) {
                    $message = 'Update ' . $name . ' to <b>' . $value . '</b> successfully';
                    $view_file = View::make('admin.bill-detail.popup-editable', compact('message'))->render();
                    return response()->json(['message' => $message, 'view_file' => $view_file]);
                } else {
                    $message = 'Error';
                    $view_file = View::make('admin.bill-detail.popup-editable', compact('message'))->render();
                    return response()->json(['message' => 'Error', 'view_file' => $view_file]);
                }
            }
        } catch (\Throwable $e) {
            $message = $e->getMessage();
            $view_file = View::make('admin.bill-detail.popup-editable', compact('message'))->render();
            return response()->json(['message' => $message, 'view_file' => $view_file]);
        }
    }

    public function editableInvoice(Request $request)
    {
        $pk = $request->pk;
        $name = $request->name;
        $value = $request->value;
        try {
            $model = BillInvoice::where('bill_id', $pk)->first();
            if ($model) {
                if ($model->update([$name => $value])) {
                    $message = 'Update ' . $name . ' to <b>' . $value . '</b> successfully';
                    $view_file = View::make('admin.bill-detail.popup-editable', compact('message'))->render();
                    return response()->json(['message' => $message, 'view_file' => $view_file]);
                } else {
                    $message = 'Error';
                    $view_file = View::make('admin.bill-detail.popup-editable', compact('message'))->render();
                    return response()->json(['message' => 'Error', 'view_file' => $view_file]);
                }
            }
        } catch (\Throwable $e) {
            $message = $e->getMessage();
            $view_file = View::make('admin.bill-detail.popup-editable', compact('message'))->render();
            return response()->json(['message' => $message, 'view_file' => $view_file]);
        }
    }

    /**
     * Product
     */
    public function postCartBill(Request $request)
    {
    }
}
