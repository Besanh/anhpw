<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class TestController extends Controller
{
    public function index()
    {
        $arr = array(
            '_token' => 'DzrQS4JMs1jreZp5quz5uGgtTlqpHy1zSRnm8LCq',
            'bid' => array(
                0 => array(
                    'name' => 'bid[]',
                    'value' => 1
                ),

                1 => array(
                    'name' => 'bid[]',
                    'value' => 3
                ),

                2 => array(
                    'name' => 'bid[]',
                    'value' => 5
                )

            )

        );
        foreach(Arr::get($arr, 'bid') as $itam)
        {
            getArray(Arr::get($itam, 'value'));
        }
    }
}
