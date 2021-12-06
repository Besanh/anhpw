<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Help;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class HelpController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $helps = Cache::remember('helps', timeToLive(), function () {
            return Help::where('status', '=', 1)->get();
        });

        return view('frontend.help.index', compact('helps'));
    }
}
