<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
	/**
	 * 商城主页[商品list]
	 * @param  Request $request [description]
	 * @return [type]           [description]
	 */
    public function index(Request $request){
    	//$se = $request->session()->all();
    	//dd($se);
    	
    	return view('index');
    }
}
