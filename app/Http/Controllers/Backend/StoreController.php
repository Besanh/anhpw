<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Provinces;
use App\Models\Store;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::orderBy('id', 'DESC')->get();
        return view('admin.store.index', compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $provinces = Provinces::where('status', 1)->select(['id', 'name'])->get();
        return view('admin.store.create', compact('provinces'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Store $store)
    {
        $request->validate([
            'province_id' => 'required|integer',
            'name' => 'required|string',
            'location' => 'string|nullable',
            'link' => 'string|nullable',
            'tel' => 'string|nullable',
            'email' => 'string|nullable',
            'website' => 'string|nullable',
            'working_time' => 'string|nullable',
            'status' => 'required|integer',
            'note' => 'string|nullable'
        ]);
        $image = '';
        if ($request->hasFile('image')) {
            $image = $this->upload($request->file('image'), 'stores');
        }

        $store->create([
            'province_id' => $request->province_id,
            'name' => $request->name,
            'location' => $request->location,
            'link' => $request->link,
            'tel' => $request->tel,
            'email' => $request->email,
            'website' => $request->website,
            'working_time' => $request->working_time,
            'image' => $image,
            'status' => $request->status,
            'note' => $request->note,
        ]);
        return redirect()->back()->with('message', 'Created store successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        return view('admin.store.show', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        $provinces = Provinces::where('status', 1)->select(['id', 'name'])->get();
        return view('admin.store.edit', compact(['store', 'provinces']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Store $store)
    {
        $request->validate([
            'province_id' => 'required|integer',
            'name' => 'required|string',
            'location' => 'string|nullable',
            'link' => 'string|nullable',
            'tel' => 'string|nullable',
            'email' => 'string|nullable',
            'website' => 'string|nullable',
            'working_time' => 'string|nullable',
            'status' => 'required|integer',
            'note' => 'string|nullable'
        ]);
        $image = '';
        if ($request->hasFile('image')) {
            $image = $this->upload($request->file('image'), 'stores');
        }
        $store->update([
            'province_id' => $request->province_id,
            'name' => $request->name,
            'location' => $request->location,
            'link' => $request->link,
            'tel' => $request->tel,
            'email' => $request->email,
            'website' => $request->website,
            'working_time' => $request->working_time,
            'image' => $image ? $image : $store->image,
            'status' => $request->status,
            'note' => $request->note,
        ]);
        return redirect()->back()->with('message', 'Updated store successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Store::find($id);
        if ($model) {
            $model->delete();
            return redirect()->back()->with('message', 'Delete #' . $id . ' successfully');
        }
        return redirect()->back()->with('message', 'Data not found');
    }

    public function updateStatus($id)
    {
        $model = Store::find($id);
        if ($model) {
            $model->status = ($model->status) ? 0 : 1;
            $model->save();
            $msg = ['status' => $model->status, 'message' => "Record #{$id} updated successfully"];
            return response()->json($msg);
        }
        return redirect()->back()->with('message', 'Nothing change');
    }

    public function upload($file, $model = 'store', $width = 300, $height = 100)
    {
        $data = '';
        try {
            $dir = 'userfiles/images/' . $model . '/';
            $dir_org = 'userfiles/images/' . $model . '_org/';
            $dir_thumb = 'userfiles/images/' . $model . '_thumb/';
            $dir_thumb_small = 'userfiles/images/' . $model . '_thumb_small/';

            $name = microtime(true) . '.' . $file->extension();
            !is_dir($dir) ? createDir($dir) : (!is_dir($dir_org) ? createDir($dir_org) : (!is_dir($dir_thumb) ? createDir($dir_thumb) : (!is_dir($dir_thumb_small) ? createDir($dir_thumb_small) : null)));

            // Save org
            Image::make($file->getRealPath())->save(createImageUri($dir_org, $name));
            // Save thumb
            Image::make($file->getRealPath())->resize(150, 150, function ($constraint) {
                $constraint->aspectRatio();
            })->save(createImageUri($dir_thumb, $name));

            if (Image::make($file->getRealPath())->resize($width, $height, function ($constraint) {
                // $constraint->aspectRatio();
            })->save(createImageUri($dir, $name))) {
                $data = createImageUri($dir, $name);
            }
            return $data;
        } catch (\Throwable $th) {
            throw $th;
            return false;
        }
    }
}
