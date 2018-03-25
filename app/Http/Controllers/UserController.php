<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource (all users).
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = Auth::user();

        if ( $currentUser->role == 'admin' )
        {
            $users = User::paginate(25);
            return view('users.index', compact('users'));
        }

        return 'Cannot access. You are not admin';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $user = User::where('id', '=', $id)->first(); //return 1 object
        // $user = User::where('id', '=', $id)->get(); //return collection

        $user = Auth::user();

        if ( $id == $user->id ) {
            return view('users.show', compact('user'));
        }

        // $error = 'Page does not exist';
        // return view('users.show', compact('error'));

        return 'Page does not exist';
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

        if ( $id == $user->id ) {
            return view('users.edit', compact('user'));
        }

        return 'Page does not exist';
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
        $user = User::find($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            // 'password' => 'required|string|min:6|confirmed',
            // 'role' => 'required',
        ]);

        // $user->name = $request->get('name');
        $user->update($request->all());

        $user->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function getTutors()
    {
        $tutors = User::where('role', 'tutor')->get();
        dd($tutors);
    }
}
