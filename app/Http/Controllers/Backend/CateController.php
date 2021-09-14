<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\CateStoreRequest;
use App\Http\Requests\CateUpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'DESC')->get();
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CateStoreRequest $request, Category $cate)
    {
        if ($request->validated()) {
            if ($request->file('image')->isValid()) {
                proccessUpload($request, 'category');
            }

            $cate->create([
                'name' => $request->name,
                'name_seo' => $request->name_seo,
                'image' => $request->image,
                'status' => $request->status,
                'description' => $request->description
            ]);
            return redirect()->back()->with('message', 'Created category successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        return view('admin.category.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CateUpdateRequest $request, Category $category)
    {
        if ($request->validated()) {
            if ($request->hasFile('image')) {
                $request->image = proccessUpload($request, 'category', 900, 450);
            }

            $category->update([
                'name' => $request->name,
                'name_seo' => $request->name_seo,
                'image' => $request->file('image') ? $request->image : $category->image,
                'status' => $request->status,
                'description' => $request->description
            ]);
            return redirect()->back()->with('message', 'Updated category successfully');
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
        $model = Category::find($id);
        if ($model) {
            $model->status = ($model->status) ? 0 : 1;
            $model->save();
            $msg = ['status' => $model->status, 'message' => "Record #{$id} updated successfully"];
            return response()->json($msg);
        }
        return redirect()->back()->with('message', 'Nothing change');
    }
}
