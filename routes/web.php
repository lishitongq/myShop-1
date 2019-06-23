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

Route::get('/','IndexController@index'); //主页

//登录\注册\退出
Route::get('login','LoginController@login'); //登录
Route::post('do_login','LoginController@do_login'); //登录表单提交验证
Route::get('register','LoginController@register'); //注册
Route::post('do_register','LoginController@do_register'); //表单验证
Route::get('logout','LoginController@logout'); //退出

Route::middleware(['login'])->group(function(){
	Route::get('/order','Home\OrderController@index');
	//购物车相关路由
	Route::get('my_cart','Home\CartController@cart');
	Route::post('add_cart','Home\CartController@add_cart'); //加入购物车
	Route::get('confirm_pay','Pay\AliPayController@confirm_pay'); //确认订单
});

//商品相关路由
Route::get('goods_detail',"Home\GoodsController@goods_detail");



//支付相关路由
Route::get('/pay','Pay\AliPayController@pay');
Route::post('/notify_url','Pay\AliPayController@aliNotify');


//------------------后台
Route::get('/admin','Admin\IndexController@index');

Route::get('admin/goods_list','Admin\GoodsController@index');
Route::get('/add_goods','Admin\GoodsController@add_goods');
Route::post('/do_add_goods','Admin\GoodsController@do_add_goods');





//-------------------------------------其他

//学生管理系统

Route::middleware(['stu'])->group(function(){
	Route::get('/add_student','studentController@index'); //学生增删改查主页面
});


Route::get('/add','studentController@add');
Route::post('/do_add','studentController@do_add');
Route::get('/update_student','studentController@update');
Route::post('/do_update','studentController@do_update');
Route::get('/del','studentController@del');

