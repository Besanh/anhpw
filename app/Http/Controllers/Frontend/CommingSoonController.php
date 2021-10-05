<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class CommingSoonController extends Controller
{
    public function index()
    {
        $countdown = Setting::where([
            ['name', '=', 'countdown'],
            ['status', '=', 1]
        ])
            ->select('value_setting')
            ->first();
        $slogan = Setting::where([
            ['name', '=', 'slogan-comming-soon'],
            ['status', '=', 1]
        ])
        ->select('value_setting')
        ->first();

        return view('frontend.comming-soon.index', compact(['countdown', 'slogan']));
    }
}
