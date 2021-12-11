<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Help;
use Illuminate\Support\Facades\Cache;

class HelpController extends Controller
{
    /**
     * Help
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(string $alias)
    {
        $helps = Help::select('helps.*')
            ->join('help_types', 'help_types.id', '=', 'helps.help_type_id')
            ->where([
                ['alias', '=', $alias],
                ['help_types.status', '=', 1],
                ['helps.status', '=', 1]
            ])
            ->get();

        return view('frontend.help.index', compact('helps'));
    }
}
