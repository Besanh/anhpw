<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingStoreRequest;
use App\Http\Requests\ShippingUpdateRequest;
use App\Models\ShippingFee;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shipping = ShippingFee::get();
        return view('admin.shipping-fee.index', compact('shipping'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $delivery_type = ShippingFee::$delivery_type;
        return view('admin.shipping-fee.create', compact('delivery_type'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ShippingStoreRequest $request, ShippingFee $shippingFee)
    {
        if ($request->validated()) {
            $shippingFee->create($request->validated());
            return redirect()->back()->with('message', 'Create shipping fee successfully');
        }
        return redirect()->back()->with('message', 'Something went wrong');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(ShippingFee $shippingFee)
    {
        return view('admin.shipping-fee.show', compact('shippingFee'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(ShippingFee $shippingFee)
    {
        $delivery_type = ShippingFee::$delivery_type;
        return view('admin.shipping-fee.edit', compact(['shippingFee', 'delivery_type']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ShippingUpdateRequest $request, ShippingFee $shippingFee)
    {
        if ($request->validated()) {
            $shippingFee->update($request->validated());
            return redirect()->back()->with('message', 'Update shipping fee successfully');
        }
        return redirect()->back()->with('message', 'Something went wrong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = ShippingFee::find($id);
        if ($model) {
            $model->delete();
            return redirect()->back()->with('message', 'Delete #' . $id . ' successfully');
        }
        return redirect()->back()->with('message', 'Data not found');
    }

    public function updateStatus($id)
    {
        $model = ShippingFee::find($id);
        if ($model) {
            $model->status = ($model->status) ? 0 : 1;
            $model->save();
            $msg = ['status' => $model->status, 'message' => "Record #{$id} updated successfully"];
            return response()->json($msg);
        }
        return redirect()->back()->with('message', 'Nothing change');
    }
}
