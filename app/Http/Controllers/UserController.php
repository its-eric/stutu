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
            $users = User::where('id', '!=', Auth::user()->id)->paginate(25); //paginate
            return view('users.index', compact('users'));
        }

        abort(404);
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
        $user = User::find($id);

        if ( Auth::user()->role == 'admin' || $id == Auth::user()->id )
        {
            return view('users.show', compact('user'));
        }

        abort(404);
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
        $user = User::find($id);

        // check show/{id} on url is the same id with current user.
        if ( Auth::user()->role == 'admin' || $id == Auth::user()->id )
        {
            return view('users.edit', compact('user'));
        }

        abort(404);
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
            'email' => 'required|string|email|max:255',
            // 'password' => another page
            // 'role' => cannot change
        ]);

        $user->update($request->all());

        $user->save();

        return view('users.show', compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->action('UserController@index');
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
