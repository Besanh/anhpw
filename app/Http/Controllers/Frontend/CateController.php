<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CateController extends Controller
{
    public function getCate($alias)
    {
        $cate = Category::where([
            ['alias', '=', $alias],
            ['status', '=', 1]
        ])
        ->first();
        if($cate)
        {
            
        }
    }
}
