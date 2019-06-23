<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Model\Goods;

class GoodsController extends Controller
{
    public function index(){

        $info = Goods::orderBy('add_time','asc')->paginate(2);
        
        return view('admin.goods_list',['goods_list'=>$info]);
    }

    

    public function add_goods(){
    	return view('admin.add_goods');
    }

    /**
     * @author   <[<email address>]>
     * [do_add_goods description]
     * @param  Request $request [description]
     * @return [type]           [description]
     */
    public function do_add_goods(Request $request){
    	//goods/or4QMjUOfSPCvz9Q5G7acZlnMp674IgMfn4SNVD6.jpeg
    	$req = $request->all();
        
		$path = $request->file('goods_source')->store('goods');
        
		//$pic_url = asset('storage'.'/'.$path);
        $result = Goods::insert([
            'goods_name'=>$req['goods_name'],
            'goods_pic'=>'storage/'.$path,
            'goods_price'=>$req['price'],
            'add_time'=>time()
        ]);
		
        if($result){
            return redirect('admin/goods_list');
        }else{
            echo 'fail';
        }
    }
}
