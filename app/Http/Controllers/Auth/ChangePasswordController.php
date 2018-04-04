<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Hash;

class ChangePasswordController extends Controller
{
    /**
     * Create a new controller instance.
     * To check authentication.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = Auth::user();

        // Check logined user
        if ( !($id == $user->id) )
        {
            abort(404);
        }

        return view('auth.passwords.change')->with('user', $user);
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
        $user = Auth::user();

        // Check logined user
        if ( !($id == $user->id) )
        {
            abort(404);
        }

        // Check validation
        $validatedData = $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required',
            'confirmNewPassword' => 'required',
        ]);

        // Compare current password and input password
        if ( !Hash::check($request->oldPassword, $user->password) )
        {
            return redirect()->back()->with('status', 'Wrong Password!');
        }

        if ( $request->confirmNewPassword != $request->newPassword )
        {
            return redirect()->back()->with('status', 'Wrong Confirm Password!');
        }

        $user->password = bcrypt($request->newPassword);

        $user->save();

        return redirect()->back()->with('status', 'Change Password Successfully!');
    }
}
