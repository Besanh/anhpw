<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController as Controller;
use App\Http\Requests\MenuStoreRequest;
use App\Http\Requests\MenuUpdateRequest;
use App\Models\Menu;
use App\Models\MenuType;
use Exception;
use Illuminate\Support\Facades\Route;

class MenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:menu-list', ['only' => ['index']]);
        $this->middleware('permission:menu-show', ['only' => ['show']]);
        $this->middleware('permission:menu-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:menu-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:menu-delete', ['only' => ['destroy']]);
        $this->middleware('permission:menu-find-menu-type', ['only' => ['findMenuType']]);
        $this->middleware('permission:menu-get-type', ['only' => ['getType']]);
        $this->middleware('permission:menu', ['only' => ['menu']]);
        $this->middleware('permission:menu-update-status', ['only' => ['updateStatus']]);
    }

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
        $image = null;
        // if ($request->type_id == 2) {
        if ($request->file('image')) {
            $image = proccessUpload($request, 'menu', 700, 700);
        }
        // }
        if ($request->validated()) {
            if (!$request->route || ($request->route && Route::has($request->route))) {
                Menu::create([
                    'parent_id' => $request->parent_id,
                    'type_id' => $request->type_id,
                    'head' => $request->head,
                    'route' => $request->route,
                    'name' => $request->name,
                    'name_seo' => $request->name_seo,
                    'alias' => $request->alias,
                    'url' => $request->url,
                    'content' => $request->content,
                    'icon' => $request->icon,
                    'priority' => $request->priority,
                    'status' => $request->status,
                    'note' => $request->note,
                    'image' => $image ? $image : $request->image
                ]);
                return redirect()->back()->with('message', 'Create menu successfully');
            } else {
                return redirect()->back()->with('error', 'Route not exist or something went wrong');
            }
        }
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
        $image = null;
        // if ($request->type_id == 2) {
        if ($request->file('image')) {
            $image = proccessUpload($request, 'menu', 700, 700);
        }
        // }
        $menu = Menu::find($id);
        if ($menu) {
            if ($request->validated()) {
                if (!$request->route || ($request->route && Route::has($request->route))) {
                    $menu->update([
                        'parent_id' => $request->parent_id,
                        'type_id' => $request->type_id,
                        'head' => $request->head,
                        'route' => $request->route,
                        'name' => $request->name,
                        'name_seo' => $request->name_seo,
                        'alias' => $request->alias,
                        'url' => $request->url,
                        'content' => $request->content,
                        'icon' => $request->icon,
                        'priority' => $request->priority,
                        'status' => $request->status,
                        'note' => $request->note,
                        'image' => $image ? $image : $request->image
                    ]);
                    return redirect()->back()->with('message', 'Update menu successfully');
                } else {
                    return redirect()->back()->with('error', 'Route not exist or something went wrong');
                }
            }
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
        $model = Menu::find($id);
        if ($model) {
            $model->delete();
            return redirect()->back()->with('message', 'Delete #' . $id . ' successfully');
        }
        return redirect()->back()->with('error', 'Data not found');
    }

    public function findMenuType($alias)
    {
        $model = MenuType::where('alias', $alias)
            ->select([
                'id',
                'name'
            ])
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
