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
    	$req = $request->all();

    	$user_info = User::where(['name'=>$req['name'],'password'=>$req['password']])->first();
    	//dd($user_info);
    	//$user = $user_info->toArray();
    	if(!empty($user_info)){
    		//发放权限，写入session
    		session(['name'=>$req['name']]);
    		//$request->session()->put('name', $req['name']);
    		//echo $request->session()->exists('name')."<br>";
    		return redirect('/');
    	}else{
    		echo 1111;
    	}
    	
    }

    public function logout(Request $request){
		//$request->session()->flush();
    	return redirect('/');
    }
}
