<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Tools\Tools;

use DB;

class studentController extends Controller
{
    public $tools;
    public $redis;
    public function __construct(Tools $tools){
        $this->tools = $tools;
        $this->redis = $tools->getRedis();
    }
    public function index(Request $request){
        // DB::connection()->enableQueryLog();

        // $info = DB::table("student")->
        // leftJoin('class','class.id','=','student.class_id')->get();
        
        //  $log = DB::getQueryLog();

        // dd($log);
        //$redis = $this->tools->getRedis();
        //$re = $redis -> exists('num');
        //$redis->del('num');
        ////$re = $redis -> exists('num');
        //$redis->incr('num');
        
        $req = $request->all();
        
    	

        //
        //var_dump(isset($req['find_name']));
        if(isset($req['find_name'])){

          $student_info = DB::table('student')->where('name', 'like', '%'.$req['find_name'].'%')->paginate(1);   
      }else{
        $req['find_name'] = '';

        $student_info = DB::table('student')->paginate(1); 
      }
      
        // $log = DB::getQueryLog();

        // dd($log);
        
        
        $stu_info = $student_info->toArray();
        $stu_json = json_encode($stu_info);
        //var_dump($stu_json);
    	$this->redis->set('stu_info',$stu_json,10);

    	return view('addStudent',['student_info'=>$student_info,'find_name'=>$req['find_name']]);  
    }

    public function add(){
        $redis = new \Redis();
        $redis->connect('127.0.0.1','6379');
        $num = $redis->get('num');
        echo $num."<br/>";
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
        $req['name'] = $_POST['name'];
        
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
