<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Support\Facades\Cache;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Cache::remember('store', timeToLive(), function () {
            return Store::where('status', 1)
                ->orderBy('id', 'DESC')
                ->get();
        });

        return view('frontend.store.index', compact('stores'));
    }
}
