<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BasicController;

class OrderController extends BasicController
{
    public function index(){}
    /**
     * 订单列表
     * [order_list description]
     * @return [type] [description]
     */
    public function order_list(){
    	$uid = session('user_id');
    	$order_info = $this->order_table->where(['uid'=>$uid])->orderBy('add_time','desc')->paginate(5);
    	$order = $order_info->toArray()['data'];
    	
    	$state_list = [1=>'待支付',2=>'已支付',3=>'已过期',4=>'用户删除'];
    	//十分钟取消订单
    	foreach($order as $k=>$v){
    		$order[$k]['end_time'] = date('Y/m/d H:i:s',$v['add_time'] + 10 * 60);
    		$order[$k]['order_state'] = $state_list[$v['state']];
    	}

    	return view('home.order_list',['order_info'=>$order_info,'order'=>$order]);
    }
}
