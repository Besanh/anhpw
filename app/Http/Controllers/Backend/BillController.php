<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController as Controller;
use App\Models\Bill;
use Illuminate\Http\Request;

class BillController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:bill-list', ['only' => ['index']]);
        $this->middleware('permission:bill-show', ['only' => ['show']]);
        $this->middleware('permission:bill-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:bill-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:bill-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bills = Bill::orderBy('id', 'DESC')->get();
        return view('admin.bill.index', compact('bills'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
