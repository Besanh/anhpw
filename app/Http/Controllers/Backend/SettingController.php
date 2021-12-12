<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\SettingStoreRequest;
use App\Http\Requests\SettingUpdateRequest;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings = Setting::orderBy('id', 'DESC')->get();
        return view('admin.setting.index', compact('settings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Setting::SETTING_TYPES;
        return view('admin.setting.create', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SettingStoreRequest $request, Setting $setting)
    {
        $val = null;
        if ($request->type == 'json') {
            $val = $this->proccessValue($request->key_setting, $request->value_setting);
        } elseif ($request->type == 'image' || $request->type == 'text') {
            $val = $request->value_setting;
        }

        if ($request->validated()) {
            $setting->create([
                'name' => $request->name,
                'value_setting' => $val ? $val : $request->value_setting,
                'type' => $request->type,
                'status' => $request->status
            ]);
            return redirect()->back()->with('message', 'Created setting successfully');
        }
        return redirect()->back()->with('error', 'Something went wrong');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        return view('admin.setting.show', compact('setting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        $types = Setting::SETTING_TYPES;
        return view('admin.setting.edit', compact(['setting', 'types']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SettingUpdateRequest $request, Setting $setting)
    {
        $val = null;
        if ($request->type == 'json') {
            $val = $this->proccessValue($request->key_setting, $request->value_setting);
        } elseif ($request->type == 'image' || $request->type == 'text') {
            $val = $request->value_setting;
        }

        if ($request->validated()) {
            $setting->update([
                'name' => $request->name,
                'value_setting' => $val ? $val : $setting->value_setting,
                'type' => $request->type,
                'status' => $request->status
            ]);
            return redirect()->back()->with('message', 'Updated setting successfully');
        }
        return redirect()->back()->with('error', 'Something went wrong');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = Setting::find($id);
        if ($model) {
            $model->delete();
            return redirect()->back()->with('message', 'Delete #' . $id . ' successfully');
        }
        return redirect()->back()->with('error', 'Data not found');
    }

    public function updateStatus($id)
    {
        $model = Setting::find($id);
        if ($model) {
            $model->status = ($model->status) ? 0 : 1;
            $model->save();
            $msg = ['status' => $model->status, 'message' => "Record #{$id} updated successfully"];
            return response()->json($msg);
        }
        return redirect()->back()->with('message', 'Nothing change');
    }

    protected function proccessValue($key, $value)
    {
        $json_value = [];
        if (is_array($value)) {
            foreach ($value as $k => $node) {
                $json_value[$k] = [
                    $key[$k] => $node
                ];
            }
        }

        return json_encode($json_value);
    }

    public function fieldText()
    {
        return view('admin.setting.sub-file.field-text');
    }

    public function fieldJson()
    {
        return view('admin.setting.sub-file.field-json');
    }

    public function fieldImage()
    {
        return view('admin.setting.sub-file.field-image');
    }
}
