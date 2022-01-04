<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Profile;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $profile = Profile::find($id);
        return view('admin.profile.show', compact('profile'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profile = Profile::find($id);
        return view('admin.profile.edit', compact('profile'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'gender' => 'required|integer',
            'fullname' => 'required|string',
            'phone' => 'required|string',
            'avatar' => 'mimes:jpeg,jpg,png,bmp|dimensions:max_width=100,max_height=100,ratio=1|nullable',
            'birthday' => 'required|date|before:tomorrow',
            'address' => 'required|string'
        ]);
        $profile = Profile::find($id);
        $avatar = '';
        if ($request->hasFile('avatar')) {
            $request->file('avatar')->storeAs(
                'avatar',
                $profile->id . '_' . $request->file('avatar')->getClientOriginalName()
            );
            $avatar = Storage::path('avatar/' . $profile->id . '_' . $request->file('avatar')->getClientOriginalName());
        } else {
            $avatar = $request->gender == 0 ? asset('/img/undraw_profile.svg') : asset('/img/undraw_profile_3.svg');
        }
        $profile->update([
            'gender' => $request->gender,
            'fullname' => $request->fullname,
            'phone' => $request->phone,
            'avatar' => $avatar ? $avatar : $profile->avatar,
            'birthday' => $request->birthday,
            'address' => $request->address
        ]);
        return redirect()->back()->with('message', 'Updated profile successfully');
    }
}
