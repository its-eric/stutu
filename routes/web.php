<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route for guest
Route::get('/', 'GuestController@welcome')->name('welcome');
Route::get('/all-tutors', 'GuestController@allTutors');
Route::get('/tutors/{id}/detail', 'GuestController@tutorDetail');
Route::get('/all-courses', 'GuestController@allCourses');
Route::get('/courses/{id}/detail', 'GuestController@courseDetail');
Route::get('/about', 'GuestController@about');

// End route for guest

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('users', 'UserController');

Route::get('users/{id}/change-password', 'Auth\ChangePasswordController@edit');
Route::post('users/{id}/change-password', 'Auth\ChangePasswordController@update');

Route::resource('courses', 'CourseController');
Route::get('/tutor-courses', 'CourseController@listTutorCourses')->name('listTutorCourses');

Route::any('/filter', 'FilterController@filterAll')->name('filter');
// Route::post('/filter/user', 'FilterController@filterUser');

// Route::get('/tutors', 'UserController@getTutors');
