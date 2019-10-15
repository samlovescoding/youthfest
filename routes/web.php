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

//Default Route
Route::get('/', function () {
    return view('landing.index');
});

//Default Route
Route::get('/landing', function () {
    return view('landing.index');
});

//Authentication Routes
Auth::routes(["verify"=>true]);

//Home
Route::get('/home', 'HomeController@index')->name('home');

//Events
Route::get('events/{id}/assign', 'EventsController@assign');
Route::get('events/{event_id}/assign/{student_id}', 'EventsController@assign_create');
Route::get('events/{event_id}/deassign/{student_id}', 'EventsController@deassign');

//Super Admin User_Approve Routes
Route::get('home/approve_list/', 'HomeController@approve_list');
Route::get('home/approve_user/{id}', 'HomeController@approve_user');
Route::post('home/destroy_user/{id}', 'HomeController@destroy_user');
Route::get('home/generate', 'HomeController@generate');
Route::get('home/change_password', 'HomeController@change_password')->name("change_password");
Route::post('home/change_password_update', 'HomeController@change_password_update')->name("change_password_update");

//Student Print Routes
Route::get('students/{id}/print', 'StudentsController@print');

//Resource Routes
Route::resource('students', 'StudentsController')->middleware("verified");
Route::resource('colleges', 'CollegesController')->middleware("verified");
Route::resource('events', 'EventsController')->middleware("verified");