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


Route::post('/register', 'API\AuthController@register');
Route::post('/login', 'API\AuthController@login');

Route::middleware('auth:api')->group(function () {
    Route::post('/logout', 'API\AuthController@logout');
    Route::post('/get-user', 'API\AuthController@getUser');
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::resource('users', 'UserController');
    Route::resource('courses', 'CourseController');
    Route::get('/tutor-courses', 'CourseController@listTutorCourses')->name('listTutorCourses');

    Route::post('/filter', 'FilterController@filterAll')->name('filter');
    // Route::post('/filter/user', 'FilterController@filterUser');

    // Route::get('/tutors', 'UserController@getTutors');
});