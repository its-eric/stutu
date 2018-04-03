<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;

class GuestController extends Controller
{
    public function welcome()
    {
        $users = User::where('role', 'tutor')->paginate(5);
        $courses = Course::paginate(5);

        return view('welcome')->with([
            'users' => $users,
            'courses' => $courses,
        ]);
    }

    public function allTutors()
    {
        $users = User::where('role', 'tutor')->paginate(25);
        return view('guest.tutors.index')->with('users', $users);
    }

    public function tutorDetail($id)
    {
        $user = User::find($id);
        return view('guest.tutors.detail')->with('user', $user);
    }

    public function allCourses()
    {
        $courses = Course::paginate(25);
        return view('guest.courses.index')->with('courses', $courses);
    }

    public function courseDetail($id)
    {
        $course = Course::find($id);
        return view('guest.courses.detail')->with('course', $course);
    }

    public function about()
    {
        return view('guest.about');
    }
}
