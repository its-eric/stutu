<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::resource('users', 'UserController');
Route::resource('courses', 'CourseController');
Route::get('/tutor-courses', 'CourseController@listTutorCourses')->name('listTutorCourses');

Route::post('/filter', 'FilterController@filterAll')->name('filter');
// Route::post('/filter/user', 'FilterController@filterUser');

// Route::get('/tutors', 'UserController@getTutors');
