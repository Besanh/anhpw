<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\HelpContentStoreRequest;
use App\Models\Help;
use App\Models\HelpContent;

class HelpContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $help_contents = HelpContent::orderBy('id', 'DESC')->get();

        return view('admin.help-content.index', compact('help_contents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(int $help_id = null)
    {
        $query = Help::where('status', '=', 1);
        if (is_numeric($help_id)) {
            $query->where(function ($query) use ($help_id) {
                $query->where('id', $help_id);
            });
        }
        $help_list = $query->get();
        return view('admin.help-content.create', compact(['help_list', 'help_id']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HelpContentStoreRequest $request)
    {
        if ($request->validated()) {
            HelpContent::create($request->validated());

            return redirect()->back()->with('message', 'Created successfully');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(HelpContent $helpContent, int $help_id = null)
    {
        return view('admin.help-content.show', compact(['helpContent', 'help_id']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(HelpContent $helpContent, int $help_id = null)
    {
        $query = Help::where('status', '=', 1);
        if (is_numeric($help_id)) {
            $query->where(function ($query) use ($help_id) {
                $query->where('id', $help_id);
            });
        }
        $help_list = $query->get();
        return view('admin.help-content.edit', compact(['helpContent', 'help_list', 'help_id']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(HelpContentStoreRequest $request, HelpContent $helpContent)
    {
        if ($request->validated()) {
            $helpContent->update($request->validated());
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
        $model = HelpContent::find($id);
        if ($model) {
            $model->delete();
            return redirect()->back()->with('message', 'Delete #' . $id . ' successfully');
        }
        return redirect()->back()->with('message', 'Data not found');
    }

    public function updateStatus($id)
    {
        $model = HelpContent::find($id);
        if ($model) {
            $model->status = ($model->status) ? 0 : 1;
            $model->save();
            $msg = ['status' => $model->status, 'updated_at' => $model->updated_at, 'message' => "Record #{$id} updated successfully"];
            return response()->json($msg);
        }
        return redirect()->back()->with('message', 'Nothing change');
    }

    /**
     * Xem danh sach cau hoi theo topic
     */
    public function viewTopic(int $help_id)
    {
        $help_contents = HelpContent::where('help_id', $help_id)->orderBy('priority', 'DESC')->get();

        return view('admin.help-content.index', compact(['help_contents', 'help_id']));
    }
}
