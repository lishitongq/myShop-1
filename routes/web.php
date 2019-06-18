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

Route::get('/','IndexController@index');
Route::middleware(['login'])->group(function(){
	Route::get('/order','Home\OrderController@index');
});

Route::get('/add_goods','Admin\GoodsController@add_goods');
Route::post('/do_add_goods','Admin\GoodsController@do_add_goods');

Route::get('login','LoginController@login'); //登录
Route::post('do_login','LoginController@do_login'); //登录表单提交验证
Route::get('register','LoginController@register'); //注册
Route::post('do_register','LoginController@do_register'); //表单验证
Route::get('logout','LoginController@logout'); //退出



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
