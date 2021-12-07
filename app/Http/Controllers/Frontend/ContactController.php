<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slogan = Cache::remember('slogan_contact', timeToLive(), function () {
            return Setting::where([
                ['name', '=', 'slogan_contact'],
                ['status', '=', 1]
            ])
                ->first();
        });
        $phone = Cache::remember('phone', timeToLive(), function () {
            return Setting::where([
                ['name', '=', 'phone'],
                ['status', '=', 1]
            ])->first();
        });
        $address = Cache::remember('address', timeToLive(), function () {
            return Setting::where([
                ['name', '=', 'address'],
                ['status', '=', 1]
            ])->first();
        });
        $time_working = Cache::remember('time_working', timeToLive(), function () {
            return Setting::where([
                ['name', '=', 'time_working'],
                ['status', '=', 1]
            ])->first();
        });
        return view('frontend.contact.index', compact(['slogan', 'phone', 'address', 'time_working']));
    }

    public function postContact(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'address' => 'required|string',
            'phone' => 'required|string',
            'subject' => 'required|string',
            'content' => 'required|string'
        ]);
        if (Contact::create([
            'rep_id' => 0,
            'name' => $request->name,
            'email' => $request->email,
            'address' => $request->address,
            'phone' => $request->phone,
            'subject' => $request->subject,
            'content' => $request->content
        ])) {
            return redirect()->route('contact')->with('message', 'Your information has been recorded');
        } else {
            return redirect()->route('contact')->with('message', 'Something went wrong. Please try again later');
        }
    }
}
