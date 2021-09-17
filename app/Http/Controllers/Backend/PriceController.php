<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\PriceStoreRequest;
use App\Http\Requests\PriceUpdateRequest;
use App\Models\Capacity;
use App\Models\Price;
use App\Models\Product;
use Illuminate\Http\Request;

class PriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $prices = Price::orderBy('id', 'DESC')->paginate(10);
        return view('admin.price.index', compact('prices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::where('status', 1)->select(['id', 'name'])->get();
        $capacities = Capacity::where('status', 1)->select(['id', 'name'])->get();
        return view('admin.price.create', compact('products', 'capacities'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PriceStoreRequest $request, Price $price)
    {
        if ($request->validated()) {
            $price->create($request->validated());
            return redirect()->back()->with('message', 'Created item successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $price = Price::where('id', $id)->first();
        if ($price) {
            return view('admin.price.show', compact('price'));
        }
        return redirect()->back()->with('message', 'Something went wrong');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $price = Price::where('id', $id)->first();
        if ($price) {
            $products = Product::where('status', 1)->select(['id', 'name'])->get();
            $capacities = Capacity::where('status', 1)->select(['id', 'name'])->get();
            return view('admin.price.edit', compact(['price', 'products', 'capacities']));
        }
        return redirect()->back()->with('message', 'Something went wrong');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PriceUpdateRequest $request, $id)
    {
        $price = Price::where('id', $id)->first();
        if ($price) {
            if ($request->validated()) {
                $price->update($request->validated());
                return redirect()->back()->with('message', 'Updated item successfully');
            }
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
        $model = Price::find($id);
        if ($model) {
            $model->delete();
            return redirect()->back()->with('message', 'Delete #' . $id . ' successfully');
        }
        return redirect()->back()->with('message', 'Data not found');
    }

    public function updateStatus($id)
    {
        $model = Price::find($id);
        if ($model) {
            $model->status = ($model->status) ? 0 : 1;
            $model->save();
            $msg = ['status' => $model->status, 'message' => "Record #{$id} updated successfully"];
            return response()->json($msg);
        }
        return redirect()->back()->with('message', 'Nothing change');
    }
}
