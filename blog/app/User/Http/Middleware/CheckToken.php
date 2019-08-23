<?php
namespace App\User\Http\Middleware;
use App\User\Repositorys\UserRepository;
use Closure;
use Illuminate\Http\Request;

class CheckToken{
    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function handle(Request $request,Closure $next){
        $token = $request->header('token');
        if($token){
            $user = $this->userRepository->findWhere(['token'=>$token])->first();
            if($user){
                return $next($request);
            }else{
                dd('用户不存在');
            }
        }else{
            dd("没有token") ;
        }
    }
}