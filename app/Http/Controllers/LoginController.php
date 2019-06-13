<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Model\User;

class LoginController extends Controller
{
    public function login(){
    	return view('login');
    }
    public function do_login(Request $request){
    	$validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required'
        ]);
        $req = $request->all();
        $user_info = User::where(['name'=>$req['name'],'password'=>md5($req['password'])])
        ->select('id','name')
        ->first();
        if(empty($user_info)){
            echo '用户或密码错误！';
            die();
        }
        $user = [
            'id'=>$user_info['id'],
            'user_name'=>$user_info['name']
        ];
        session(['user'=>$user]);
        return redirect('/');
    	
    }

    public function register(){
        return view('register');
    }

    public function do_register(Request $request){
        $validatedData = $request->validate([
            'name' => 'required',
            'password' => 'required',
            'confirm_password' => 'same:password',
        ]);

        $req = $request->all();
        $add_result = User::insert([
            'name'=>$req['name'],
            'password'=>md5($req['password']),
            'reg_time'=>time()
            
        ]);
        if($add_result){
            return redirect('/login');
        }else{
            echo "注册失败！";
        }
    }

    public function logout(Request $request){
		//$request->session()->flush();
    	return redirect('/');
    }
}
