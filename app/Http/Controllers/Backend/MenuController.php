<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\MenuStoreRequest;
use App\Http\Requests\MenuUpdateRequest;
use App\Models\Menu;
use App\Models\MenuType;
use Exception;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($alias)
    {
        return $this->menu($this->findMenuType($alias), $alias);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($alias, Menu $menu)
    {
        $type = $this->findMenuType($alias);
        $menu->type_id = $type->id;
        $menu_list = Menu::buildDataForList(Menu::buildTree($type->id));

        return view('admin.menu.create', ['type' => $type, 'menu_list' => $menu_list, 'alias' => $alias]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuStoreRequest $request)
    {
        if ($request->validated()) {
            Menu::create($request->validated());
            return redirect()->back()->with('message', 'Created menu successfully');
        }

        return redirect()->back()->with('message', 'Somthing went wrong');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($alias, $id)
    {
        $menu = Menu::find($id);
        if ($menu) {
            return view('admin.menu.show', compact('menu', 'alias'));
        }
        return redirect()->back()->with('message', 'Page not found');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($alias, $id)
    {
        $menu = Menu::where('id', $id)->first();
        if ($menu) {
            $type = $this->findMenuType($alias);
            $menu_list = Menu::buildDataForList(Menu::buildTree($menu->type_id), $menu->id);

            return view('admin.menu.edit', compact('menu', 'alias', 'menu_list', 'type'));
        }

        return redirect()->route('menu', $alias)->with('message', 'Page not found');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MenuUpdateRequest $request, $id)
    {
        $menu = Menu::find($id);
        if ($menu) {
            if ($request->validated()) {
                $menu->update($request->validated());
                return redirect()->back()->with('message', 'Updated successfully');
            }
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
        $model = Menu::find($id);
        if ($model) {
            $model->delete();
            return redirect()->back()->with('message', 'Delete #' . $id . ' successfully');
        }
        return redirect()->back()->with('message', 'Data not found');
    }

    public function findMenuType($alias)
    {
        $model = MenuType::where('alias', $alias)
            ->first();
        if ($model) {
            return $model;
        }
        throw new Exception('The requested page does not exist.');
    }

    public function getType($type_id)
    {
        $menu = Menu::buildTreeById($type_id);
        if ($menu) {
            foreach ($menu as $k => $m) {
                echo "<option value=" . $k . ">'.$m.'</option>";
            }
        }
    }

    protected function menu($type, $alias)
    {
        $model = Menu::buildTree($type->id, null);
        return view('admin.menu.index', compact(['type', 'model', 'alias']));
    }

    public function updateStatus($id)
    {
        $model = Menu::find($id);
        if ($model) {
            $model->status = ($model->status) ? 0 : 1;
            $model->save();
            $msg = ['status' => $model->status, 'message' => "Record #{$id} updated successfully"];
            return response()->json($msg);
        }
        return redirect()->back()->with('message', 'Nothing change');
    }
}
