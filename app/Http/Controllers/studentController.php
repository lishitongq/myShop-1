<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class studentController extends Controller
{
    public function index(){
    	$student_info = DB::table('student')->get()->toArray();
    	dd($student_info);
    	return view('addStudent');
    }

    public function add(){
    	return view('add');
    }

    public function do_add(Request $request){
    	$req = $request->all();
    	// $validatedData = $request->validate([
     //    	'name' => 'required',
     //    	'age' => 'required',
    	// ],[
    	// 	'name.required'=>"11111"
    	// ]);
    	// 
    	$result = DB::table('student')->insert([
    		'name'=>$req['name'],
    		'age'=>$req['age'],
    		'sex'=>$req['sex'],
    		'addtime'=>time()
    	]);
    	dd($result);
    	//dd($req);
    }
}
