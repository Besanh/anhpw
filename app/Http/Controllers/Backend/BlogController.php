<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController as Controller;
use App\Http\Requests\BlogStoreRequest;
use App\Http\Requests\BlogUpdateRequest;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:blog-list', ['only' => ['index']]);
        $this->middleware('permission:blog-show', ['only' => ['show']]);
        $this->middleware('permission:blog-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:blog-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:blog-delete', ['only' => ['destroy']]);
        $this->middleware('permission:blog-update-status', ['only' => ['updateStatus']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogs = Blog::orderBy('id', 'DESC')->select(['id', 'title', 'published_at', 'status', 'created_at', 'updated_at'])->get();
        return view('admin.blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BlogStoreRequest $request, Blog $blog)
    {
        if ($request->hasFile('image')) {
            $request->image = proccessUpload($request, 'blog', 400, 300);
        }
        if ($request->validated()) {
            $blog->create([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $request->image,
                'published_at' => $request->published_at,
                'status' => $request->status
            ]);
            return redirect()->back()->with('message', 'Created blog successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        return view('admin.blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        return view('admin.blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BlogUpdateRequest $request, Blog $blog)
    {
        if ($request->hasFile('image')) {
            $request->image = proccessUpload($request, 'blog', 400, 300);
        }
        if ($request->validated()) {
            $blog->update([
                'title' => $request->title,
                'content' => $request->content,
                'image' => $request->image ? $request->image : $blog->image,
                'published_at' => $request->published_at ? $request->published_at : $blog->published_at,
                'status' => $request->status
            ]);
            return redirect()->back()->with('message', 'Updated blog successfully');
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
        $model = Blog::find($id);
        if ($model) {
            $model->delete();
            return redirect()->back()->with('message', 'Delete #' . $id . ' successfully');
        }
        return redirect()->back()->with('message', 'Data not found');
    }

    public function updateStatus($id)
    {
        $model = Blog::find($id);
        if ($model) {
            $model->status = ($model->status) ? 0 : 1;
            $model->save();
            $msg = ['status' => $model->status, 'message' => "Record #{$id} updated successfully"];
            return response()->json($msg);
        }
        return redirect()->back()->with('message', 'Nothing change');
    }
}
