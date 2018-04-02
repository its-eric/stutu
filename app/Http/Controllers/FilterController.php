<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Course;

class FilterController extends Controller
{
    public function filterAll(Request $request)
    {
        $filterStr = $request->filterStr;

        $users = User::where('name', 'LIKE', '%'.$filterStr.'%')
                    ->orWhere('email', 'LIKE', '%'.$filterStr.'%')
                    ->get();

        $courses = Course::where('name', 'LIKE', '%'.$filterStr.'%')
                    ->orWhere('description', 'LIKE', '%'.$filterStr.'%')
                    ->get();

        $data = [
            'users'  => $users,
            'courses'   => $courses
        ];

        // Convert array to json
        // $jsonData = json_encode($data);

        return view('filters.filter')->with('data', $data);
    }
}
