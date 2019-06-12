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

Route::any('/', function () {
    return view('welcome');
});

Route::middleware(['stu'])->group(function(){
	Route::get('/add_student','studentController@index'); //学生增删改查主页面
});


Route::get('/add','studentController@add');
Route::post('/do_add','studentController@do_add');
Route::get('/update_student','studentController@update');
Route::post('/do_update','studentController@do_update');
Route::get('/del','studentController@del');

// Route::get('/user','userController@index');
// Route::get('/add_user','userController@add');
// Route::any('/do_add','userController@do_add');
