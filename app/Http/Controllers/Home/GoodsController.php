<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BasicController;

class GoodsController extends BasicController
{
	/**
	 * 商品详情页
	 * [goods_detail description]
	 * @return [type] [description]
	 */
    public function goods_detail(Request $request){
    	$req = $request->all();
    	$goods_info = [];
    	if(!empty($req['goods_id'])){
			$goods = $this->goods_table->where(['id'=>$req['goods_id']])->first();
			$goods_info = $goods->toArray();
    	}
    	$cart_goods_list = $this->tools->cart_list();
    	if(in_array($req['goods_id'],$cart_goods_list)){
    		$in_cart = 1;
    	}else{
    		$in_cart = 0;
    	}
    	
        return view('home.goods_detail',['goods_info'=>$goods_info,'in_cart'=>$in_cart]);
    }
}
