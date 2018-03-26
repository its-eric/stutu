<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;

class UserController extends Controller
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
     * Display a listing of the resource (all users).
     * Only admin can access this page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $currentUser = Auth::user();

        if ( $currentUser->role == 'admin' )
        {
            $users = User::paginate(25); //paginate
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
        // same with register function
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // same with register function
    }

    /**
     * Display the specified user (profile)
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get current user
        $user = Auth::user();

        // check show/{id} on url is the same id with current user.
        if ( $id == $user->id )
        {
            return view('users.show', compact('user'));
        }

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
        // get current user
        $user = Auth::user();

        // check show/{id} on url is the same id with current user.
        if ( $id == $user->id )
        {
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
            // 'password' => another page
            // 'role' => cannot change
        ]);

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

    /**
     * List tutor only.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getTutors()
    {
        $tutors = User::where('role', 'tutor')->get();
        // dd($tutors);
        // Return
    }
}
