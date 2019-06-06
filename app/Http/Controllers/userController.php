<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class userController extends Controller
{
    public function index(){
    	$student = DB::table("student")->paginate(1);
    	
    	return view('student',['student'=>$student]);
    }

    public function add(){
    	return view('addStudent');
    }

    public function do_add(Request $request){
    	$req = $request->all();
    	$validateData = $request->validate([
    		'name'=>'required'
    	],[
    		'name.required'=>'名字必须！'
    	]);
    	DB::table('student')->insert([
    		'name'=>$req['name'],
    		'sex'=>$req['sex'],
    		'age'=>$req['age'],
    		'class'=>$req['class'],
    		'addtime'=>time()
    	]);
    	return redirect('/user');
    }


}
