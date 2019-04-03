<?php
namespace App\User\Http\Middleware;
use Closure;
class CheckToken{
    public function handle($request,Closure $next){
        if(1==2){
            return $next($request);
        }else{
           dd("没有登陆") ;
        }
    }
}