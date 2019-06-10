<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class studentController extends Controller
{
    public function index(Request $request){
        $req = $request->all();
        
    	//$student_info = DB::table('student')->get()->toArray();
        //
        //var_dump(isset($req['find_name']));
        if(isset($req['find_name'])){

          $student_info = DB::table('student')->where('name', 'like', '%'.$req['find_name'].'%')->paginate(1);   
      }else{
        $req['find_name'] = '';
        $student_info = DB::table('student')->paginate(1); 
      }
        
    	
    	return view('addStudent',['student_info'=>$student_info,'find_name'=>$req['find_name']]);  
    }

    public function add(){
    	return view('add');
    }

    public function update(Request $request){
        $req = $request->all();
        $stu_info = DB::table('student')->where(['id'=>$req['id']])->first();
        
        return view('update',['stu_info'=>$stu_info]);
    }

    public function do_update(Request $request){
        $req = $request->all();
        $result = DB::table('student')->where(['id'=>$req['id']])->update([
            'name'=>$req['name'],
            'sex'=>$req['sex'],
            'age'=>$req['age']
        ]);
        if(!empty($result)){
            return redirect('/add_student');
        }
    }

    /**
     * insert into
     * delete from 
     * update 
     * get()
     */

    public function del(Request $request){
        $req = $request->all();
        $result = DB::table("student")->where(['id'=>$req['id']])->delete();
        if(!empty($result)){
            return redirect('/add_student');
        }
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
