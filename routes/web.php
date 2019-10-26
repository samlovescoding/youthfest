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

//Authentication Routes
Auth::routes(["verify"=>true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/about', 'HomeController@about');
Route::get('events/{id}/assign', 'EventsController@assign');
Route::get('events/{event_id}/assign/{student_id}', 'EventsController@assign_create');
Route::get('events/{event_id}/deassign/{student_id}', 'EventsController@deassign');
Route::get('home/approve_list/', 'HomeController@approve_list');
Route::get('report/event', 'HomeController@report_event');
Route::get('report/all', 'HomeController@report_all');
Route::get('home/approve_user/{id}', 'HomeController@approve_user');
Route::post('home/destroy_user/{id}', 'HomeController@destroy_user');
Route::get('home/generate', 'HomeController@generate');
Route::get('home/change_password', 'HomeController@change_password')->name("change_password");
Route::post('home/change_password_update', 'HomeController@change_password_update')->name("change_password_update");
Route::get('students/college/{college_name}', 'StudentsController@college');
Route::get('students/college_id_cards/{college_name}', 'StudentsController@college_id_cards');
Route::get('students/lock_college_id_cards/{college_name}', 'StudentsController@lock_college_id_cards');
Route::get('students/unassigned', 'StudentsController@index_unassigned');
Route::get('colleges/login_as/{college}', 'CollegesController@login_as');
Route::get('students/{id}/id-card', 'StudentsController@print_idcard');
Route::get('students/{id}/print', 'StudentsController@print');
Route::get('students/id-cards', 'StudentsController@idcards');
Route::get('students/all', 'StudentsController@all');
Route::get('students/lock', 'StudentsController@lock_idcards');
Route::resource('students', 'StudentsController')->middleware("verified");
Route::resource('colleges', 'CollegesController')->middleware("verified");
Route::resource('events', 'EventsController')->middleware("verified");

/*  Password Reset
//Misc
Route::get('hash/{password}', function($password){
    return password_hash($password, PASSWORD_DEFAULT);
});
*/