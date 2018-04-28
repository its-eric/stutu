<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\User;
use Auth;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $currentUser = Auth::user(); // another way to get current user
        $courses = Course::paginate(10);
        return view('courses.index', compact('courses'));
    }

    public function listTutorCourses(Request $request)
    {
        if (!(Auth::user()->role == 'tutor')) {
            abort(404);
        }

        $courses = Course::where('user_id', Auth::user()->id)->paginate(10);
        return view('courses.index')->with([
            'courses' => $courses,
            'yourCourses' => true,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('courses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'description' => 'required',
            'discount' => 'required',
            'tuition_fee' => 'required',
        ]);

        $course = new Course;

        $course->name = $request->name;
        $course->description = $request->description;
        $course->discount = $request->discount;
        $course->tuition_fee = $request->tuition_fee;
        $course->user_id = Auth::user()->id;

        $course->save();

        return redirect()->action('CourseController@listTutorCourses');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $course = Course::find($id);
        return view('courses.show', compact('course'));
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
        $course = Course::find($id);

        if ($course->user_id == $user->id) {
            return view('courses.edit', compact('course'));
        }

        return "Page not found";
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
        $course = Course::find($id);
        $course->update($request->all());
        $course->save();

        return view('courses.show', compact('course'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::find($id);
        $course->delete();

        // return Redirect::route('courses.index');
        return redirect()->action('CourseController@listTutorCourses');
    }
}
