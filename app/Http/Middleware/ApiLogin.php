<?php

namespace App\Http\Middleware;

use Closure;

class ApiLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!$request->session()->exists('user_name')){
            die(json_encode(['errno'=>4013,'msg'=>'请登录']));
        }
        return $next($request);
    }
}
