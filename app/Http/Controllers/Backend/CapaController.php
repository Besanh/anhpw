<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Capacity;
use Illuminate\Http\Request;

class CapaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $capa = Capacity::orderBy('id', 'DESC')->get();
        return view('admin.capa.index', compact('capa'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.capa.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Capacity $capa)
    {
        $request->validate([
            'name' => 'required|string',
            'status' => 'required|integer'
        ]);
        $capa->create([
            'name' => $request->name,
            'status' => $request->status
        ]);
        return redirect()->back()->with('message', 'Created capacity successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Capacity $capa)
    {
        return view('admin.capa.show', compact('capa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Capacity $capa)
    {
        return view('admin.capa.edit', compact('capa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Capacity $capa)
    {
        $request->validate([
            'name' => 'required|string',
            'status' => 'required|integer'
        ]);
        $capa->update([
            'name' => $request->name,
            'status' => $request->status
        ]);
        return redirect()->back()->with('message', 'Updated capacity successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Capacity::find($id);
        if ($model) {
            $model->delete();
            return redirect()->back()->with('message', 'Delete #' . $id . ' successfully');
        }
        return redirect()->back()->with('message', 'Data not found');
    }

    public function updateStatus($id)
    {
        $model = Capacity::find($id);
        if ($model) {
            $model->status = ($model->status) ? 0 : 1;
            $model->save();
            $msg = ['status' => $model->status, 'updated_at' => $model->updated_at, 'message' => "Record #{$id} updated successfully"];
            return response()->json($msg);
        }
        return redirect()->back()->with('message', 'Nothing change');
    }
}
