<?php

namespace App\Http\Controllers;

use App\Models\Provinces;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Provinces::all();

        return view('admin.province.index', compact('provinces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.province.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Provinces $province)
    {
        $request->validate([
            'name' => 'required|string',
            'status' => 'required|integer',
            'note' => 'string'
        ]);

        $province->create([
            'name' => $request->name,
            'status' => $request->status,
            'note' => $request->note
        ]);

        return redirect()->back()->with('message', 'Created Province Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Provinces $province)
    {
        return view('admin.province.show', compact('province'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Provinces $province)
    {
        return view('admin.province.edit', compact('province'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Provinces $province)
    {
        $request->validate([
            'name' => 'required|string',
            'status' => 'required|integer',
            'note' => 'string'
        ]);
        
        $province->update([
            'name' => $request->name,
            'status' => $request->status,
            'note' => $request->note
        ]);

        return redirect()->back()->with('message', 'Updated province successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Provinces::find($id);
        if ($model) {
            $model->delete();
            return redirect()->back()->with('message', 'Delete #' . $id . ' successfully');
        }
        return redirect()->back()->with('message', 'Data not found');
    }

    public function updateStatus($id)
    {
        $model = Provinces::find($id);
        if ($model) {
            $model->status = ($model->status) ? 0 : 1;
            $model->save();
            $msg = ['status' => $model->status, 'message' => "Record #{$id} updated successfully"];
            return response()->json($msg);
        }
        return redirect()->back()->with('message', 'Nothing change');
    }
}
