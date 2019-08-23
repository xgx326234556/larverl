<?php
namespace App\User\Services;
use App\User\Repositorys\UserRepository;
use Prettus\Validator\Exceptions\ValidatorException;
use Tymon\JWTAuth\JWTAuth;

class TokenService
{
    protected  $JWTAuth;
    protected  $userRepository;
    public function __construct(JWTAuth $JWTAuth,UserRepository $userRepository)
    {
        $this->JWTAuth = $JWTAuth;
        $this->userRepository = $userRepository;
    }

    /**
     * @param $name
     * @param $password
     * @return array|string
     */
    public function token($name,$password)
    {
        $user = $this->userRepository->findWhere(['name'=>$name,'password'=>$password])->first();
        try{
            if($user){
                $token = $this->JWTAuth->fromUser($user);
                $this->userRepository->update(['token'=>$token],$user->id);
                return $token;
            }else{
                return '用户信息错误';
            }
        }catch (ValidatorException $e){
            return $e->getMessageBag()->getMessages();
        }
    }
}