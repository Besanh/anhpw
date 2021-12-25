<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController as Controller;
use App\Http\Requests\HelpStoreRequest;
use App\Http\Requests\HelpUpdateRequest;
use App\Models\Help;
use App\Models\HelpType;

class HelpController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:help-list', ['only' => ['index']]);
        $this->middleware('permission:help-show', ['only' => ['show']]);
        $this->middleware('permission:help-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:help-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:help-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $helps = Help::orderBy('id', 'DESC')->get();

        return view('admin.help.index', compact('helps'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $help_types = HelpType::where('status', '=', 1)
            ->select(['id', 'name'])
            ->orderBy('priority', 'DESC')
            ->get();
        return view('admin.help.create', compact('help_types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HelpStoreRequest $request)
    {
        if ($request->validated()) {
            Help::create($request->validated());

            return redirect()->back()->with('message', 'Created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Help $help)
    {
        return view('admin.help.show', compact('help'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Help $help)
    {
        $help_types = HelpType::where('status', '=', 1)
            ->select(['id', 'name'])
            ->orderBy('priority', 'DESC')
            ->get();
        return view('admin.help.edit', compact(['help', 'help_types']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HelpUpdateRequest $request, Help $help)
    {
        if ($request->validated()) {
            $help->update($request->validated());
            return redirect()->back()->with('message', 'Updated successfully');
        }

        return redirect()->refresh();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Help::find($id);
        if ($model) {
            $model->delete();
            return redirect()->back()->with('message', 'Delete #' . $id . ' successfully');
        }
        return redirect()->back()->with('message', 'Data not found');
    }

    public function updateStatus($id)
    {
        $model = Help::find($id);
        if ($model) {
            $model->status = ($model->status) ? 0 : 1;
            $model->save();
            $msg = ['status' => $model->status, 'updated_at' => $model->updated_at, 'message' => "Record #{$id} updated successfully"];
            return response()->json($msg);
        }
        return redirect()->back()->with('message', 'Nothing change');
    }
}
