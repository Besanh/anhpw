<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Help;
use Illuminate\Support\Arr;

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
        $title = '';
        $helps = Help::select([
            'helps.*',
            'help_types.name'
        ])
            ->join('help_types', 'help_types.id', '=', 'helps.help_type_id')
            ->where([
                ['alias', '=', $alias],
                ['help_types.status', '=', 1],
                ['helps.status', '=', 1]
            ])
            ->get();
        if ($helps) {
            $title = Arr::get($helps, '0.name');
        }

        return view('frontend.help.index', compact(['helps', 'title']));
    }
}
