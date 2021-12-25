<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\AdminBaseController as Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:home-list', ['only' => ['index']]);
    }

    public function index()
    {
        return view('admin.home.home');
    }
}
