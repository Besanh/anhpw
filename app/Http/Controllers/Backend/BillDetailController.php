<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BillConsignee;
use App\Models\BillCustomer;
use App\Models\BillDetail;
use App\Models\BillInvoice;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BillDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
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
