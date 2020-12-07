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

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware'=> ['web']],function (){
    Route::any('student/index','StudentController@index');
    Route::any('student/create','StudentController@create');
    Route::any('student/update/{id}','StudentController@update');
    Route::any('student/detail/{id}','StudentController@detail');

    Route::any('course/index','CourseController@index');
    Route::any('course/create','CourseController@create');
    Route::any('course/update/{id}','CourseController@update');
});

Route::any('chat/index','ChatController@index');
Route::any('chat/show','ChatController@show');
