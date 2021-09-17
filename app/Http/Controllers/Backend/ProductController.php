<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\ProductUpdateRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'DESC')->get();
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cates = Category::where('status', 1)->select(['id', 'name'])->get();
        $brands = Brand::where('status', 1)->select(['id', 'name'])->get();
        return view('admin.product.create', compact('cates', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request, Product $product)
    {
        if ($request->hasFile('image')) {
            $request->image = proccessUpload($request, 'product', 650, 750);
        }
        if ($request->hasFile('galleries')) {
            $galleries = [];
            foreach ($request->file('galleries') as $node) {
                $galleries[] = uploadMultipleImage($node, 'product_galleries', 650, 750);
            }
        }
        if ($request->validated()) {
            $product->update([
                'cate_id' => $request->cate_id,
                'bid' => $request->bid,
                'name' => $request->name,
                'name_seo' => $request->name_seo,
                'designer' => $request->designer,
                'public_year' => $request->public_year,
                'promote' => $request->promote,
                'status' => $request->status,
                'description' => $request->description,
                'image' => $request->image,
                'galleries' => json_encode($galleries)
            ]);
            return redirect()->back()->with('message', 'Created product successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('admin.product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $cates = Category::where('status', 1)->select(['id', 'name'])->get();
        $brands = Brand::where('status', 1)->select(['id', 'name'])->get();
        return view('admin.product.edit', compact('cates', 'brands', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductUpdateRequest $request, Product $product)
    {
        $galleries = null;
        if ($request->hasFile('image')) {
            $request->image = proccessUpload($request, 'product', 650, 750);
        }
        if ($request->hasFile('galleries')) {
            $galleries = [];
            foreach ($request->file('galleries') as $node) {
                $galleries[] = uploadMultipleImage($node, 'product_galleries', 650, 750);
            }
        }
        if ($request->validated()) {
            $product->update([
                'cate_id' => $request->cate_id,
                'bid' => $request->bid,
                'name' => $request->name,
                'name_seo' => $request->name_seo,
                'designer' => $request->designer,
                'public_year' => $request->public_year,
                'promote' => $request->promote,
                'status' => $request->status,
                'description' => $request->description,
                'image' => $request->image,
                'galleries' => $galleries ? json_encode($galleries) : $product->galleries
            ]);
            return redirect()->back()->with('message', 'Updated product successfully');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Category::find($id);
        if ($model) {
            $model->delete();
            return redirect()->back()->with('message', 'Delete #' . $id . ' successfully');
        }
        return redirect()->back()->with('message', 'Data not found');
    }

    public function updateStatus($id)
    {
        $model = Product::find($id);
        if ($model) {
            $model->status = ($model->status) ? 0 : 1;
            $model->save();
            $msg = ['status' => $model->status, 'message' => "Record #{$id} updated successfully"];
            return response()->json($msg);
        }
        return redirect()->back()->with('message', 'Nothing change');
    }
}
