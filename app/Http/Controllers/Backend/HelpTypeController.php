<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\HelpTypeStoreRequest;
use App\Http\Requests\HelpTypeUpdateRequest;
use App\Models\HelpType;
use Illuminate\Http\Request;

class HelpTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $help_types = HelpType::orderBy('id', 'DESC')->get();
        return view('admin.help-type.index', compact('help_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.help-type.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HelpTypeStoreRequest $request, HelpType $helpType)
    {
        if ($request->validated()) {
            $helpType->create($request->validated());
            return redirect()->back()->with('message', 'Created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(HelpType $helpType)
    {
        return view('admin.help-type.show', compact('helpType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(HelpType $helpType)
    {
        return view('admin.help-type.edit', compact('helpType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HelpTypeUpdateRequest $request, HelpType $helpType)
    {
        if ($request->validated()) {
            $helpType->update($request->validated());
            return redirect()->back()->with('message', 'Updated successfully');
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
        $model = HelpType::find($id);
        if ($model) {
            $model->delete();
            return redirect()->back()->with('message', 'Delete #' . $id . ' successfully');
        }
        return redirect()->back()->with('message', 'Data not found');
    }

    public function updateStatus($id)
    {
        $model = HelpType::find($id);
        if ($model) {
            $model->status = ($model->status) ? 0 : 1;
            $model->save();
            $msg = ['status' => $model->status, 'updated_at' => $model->updated_at, 'message' => "Record #{$id} updated successfully"];
            return response()->json($msg);
        }
        return redirect()->back()->with('message', 'Nothing change');
    }
}
