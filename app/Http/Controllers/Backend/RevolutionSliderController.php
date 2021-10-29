<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\RsStoreRequest;
use App\Http\Requests\RsUpdateRequest;
use App\Models\RevolutionSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class RevolutionSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = RevolutionSlider::select(['id', 'image', 'status', 'created_at', 'updated_at'])
            ->orderBy('priority', 'DESC')
            ->get();
        return view('admin.revolution-slider.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = RevolutionSlider::SLIDE_TYPES;
        return view('admin.revolution-slider.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RsStoreRequest $request, RevolutionSlider $revolutionSlider)
    {
        if ($request->validated()) {
            $revolutionSlider->create($request->validated());
            return redirect()->back()->with('message', 'Created succussfully');
        }
        return redirect()->route('comming-soon');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(RevolutionSlider $revolutionSlider)
    {
        return view('admin.revolution-slider.show', compact('revolutionSlider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(RevolutionSlider $revolutionSlider)
    {
        $types = RevolutionSlider::SLIDE_TYPES;
        return view('admin.revolution-slider.edit', compact(['revolutionSlider', 'types']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RsUpdateRequest $request, RevolutionSlider $revolutionSlider)
    {
        if ($request->validated()) {
            $revolutionSlider->update($request->validated());
            return redirect()->back()->with('message', 'Updated successfully');
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
        $model = RevolutionSlider::find($id);
        if ($model) {
            $model->delete();
            return redirect()->back()->with('message', 'Delete #' . $id . ' successfully');
        }
        return redirect()->back()->with('message', 'Data not found');
    }

    public function updateStatus($id)
    {
        $model = RevolutionSlider::find($id);
        if ($model) {
            $model->status = ($model->status) ? 0 : 1;
            $model->save();
            $msg = ['status' => $model->status, 'message' => "Record #{$id} updated successfully"];
            return response()->json($msg);
        }
        return redirect()->back()->with('message', 'Nothing change');
    }

    /**
     * Chon thay doi field theo type
     */
    public function fieldChange($field)
    {
        return view('admin.revolution-slider.sub_files.field-change', ['type' => $field]);
    }

    /**
     * Sort slide
     */
    public function sortSlide(Request $request, RevolutionSlider $revolutionSlider)
    {
        $data = $request->all();
        if ($data) {
            foreach (Arr::get($data, 'data') as $node) {
                RevolutionSlider::where('id', Arr::get($node, 'id'))
                    ->update([
                        'priority' => Arr::get($node, 'priority')
                    ]);
            }
            return response()->json(['msg' => 'Update success']);
        }
        return response()->json(['msg' => 'Update error']);
    }
}
