<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GoodsController extends Controller
{
    public function add_goods(){
    	return view('admin.add_goods');
    }
    public function do_add_goods(Request $request){
    	//goods/or4QMjUOfSPCvz9Q5G7acZlnMp674IgMfn4SNVD6.jpeg
    	
		$path = $request->file('goods_source')->store('goods');
		echo asset('storage'.'/'.$path);
		
    }
}
