<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use App\Http\Model\Goods;
use App\Http\Model\Cart;
use DB;

class IndexController extends BasicController
{
	/**
	 * 商城主页[商品list]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
    public function index(Request $request,Cart $cart){
        $cart_goods_arr = [];
        if($request->session()->exists('user_name')){
            $cart_goods_arr = $this->tools->cart_goods($cart,session('user_id'));
        }
       
    	
        $new_info = Goods::orderBy('add_time','desc')->limit(4)->get()->toArray();
        $info = Goods::paginate(4);

        
        $new = $this->handle_double($new_info,$cart_goods_arr);
        $n_info = $this->handle_double($info->toArray()['data'],$cart_goods_arr);
        
    	return view('index',['new_goods'=>$new,'goods'=>$n_info,'info'=>$info]);
    }

    public function handle_double($info,$cart_goods_arr){
        $i = 0;
        $j = 1;
        $tmp = [];
        $key = 0;
        foreach($info as $k=>$v){
            if(in_array($v['id'],$cart_goods_arr)){
                $info[$k]['in_cart'] = 1;
            }else{
                $info[$k]['in_cart'] = 0;
            }
        }
        foreach($info as $k=>$v){
            if($i <= $j){
                $tmp[$key][] = $v;
            }
            if($i >= $j){
                $i = 0;
                $key ++;
            }else{
                $i++;
            }
        }
        return $tmp;
    }
}
