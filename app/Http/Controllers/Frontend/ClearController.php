<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;

class ClearController extends Controller
{
    public function clearCache()
    {
        Cache::flush();
        return redirect()->route('frontend.default');
    }

    public function clearCacheAdmin()
    {
        Cache::flush();
        return redirect()->route('admin.dashboard');
    }
}
