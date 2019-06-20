<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use DB;

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
        DB::connection()->enableQueryLog(); 
        //$student_info = \DB::table('student')->where(['id'=>'8'])->get();
         $info = DB::table("student")->select(['name','sex'])->leftJoin('class','class.id','=','student.class_id')->get();

        // $log = DB::getQueryLog();


        //$strr = $student_info->toArray()[0]->name;
        
        
        //dd($strr->toArray());
       // $str = '<script>alert(1111)</script>';
    	
    	return view('index',['str'=>'']);
    }
}
