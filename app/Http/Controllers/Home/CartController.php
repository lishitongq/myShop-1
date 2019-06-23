<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Cart;
use App\Http\Model\Goods;
use App\Http\Controllers\BasicController;

class CartController extends BasicController
{
    public function cart(){

    	$cart_info = Cart::where(['uid'=>session('user_id')])->get();
    	$total = 0;
    	foreach($cart_info->toArray() as $v){
    		$total += $v['goods_price'];
    	}

    	
    	return view('home.cart',['cart_info'=>$cart_info,'total'=>$total]);
    }

    public function add_cart(Request $request){
    	$req = $request->all();
    	$uid = session('user_id');
    	//判断购物车有没有重复的
    	$cart_info = Cart::where(['uid'=>$uid])->select(['goods_id'])->get()->toArray();


    	
    	$cart_goods_arr = [];
    	if(!empty($cart_info)){
    		foreach($cart_info as $v){
    		$cart_goods_arr[] = $v['goods_id'];
    		}
    	}

    	if(in_array($req['goods_id'],$cart_goods_arr)){
    		die(json_encode(['errno'=>0,'msg'=>'购物车已存在该商品']));
    	}
    	
    	$goods_info = Goods::where(['id'=>$req['goods_id']])->select(['id','goods_pic','goods_name','goods_price'])->first();

    	$goods = $goods_info->toArray();

    	$result = Cart::insert([
    		"goods_id"=>$goods['id'],
    		'goods_price'=>$goods['goods_price'],
    		'goods_name'=>$goods['goods_name'],
    		'goods_pic'=>$goods['goods_pic'],
    		'add_time'=>time(),
    		'uid'=>$uid
    	]);
    	if($result){
    		die(json_encode(['errno'=>200,'msg'=>'操作成功']));
    	}else{
    		die(json_encode(['errno'=>0,'msg'=>'操作失败']));
    	}
    }
}
