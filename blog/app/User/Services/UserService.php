<?php

namespace App\User\Services;
use App\Common\Repository\RedisRepository;
use App\User\Repository\UserRepository;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * 服务层主要实现  业务逻辑
 * Class UserService
 * @package App\User\Services
 */
class UserService{

    protected $userRepository;
    protected $redisRepository;
    public function __construct(
        UserRepository $userRepository,
        RedisRepository $redisRepository
    )
    {
        $this->userRepository = $userRepository;
        $this->redisRepository = $redisRepository;
    }

    public function findUserOne($id)
    {
        $res = $this->userRepository->find($id)->toArray();
        dd($res);
    }

    /**
     * @param $name
     * @param $age
     * @param $sex
     * @return array|mixed
     */
    public function addUserOne($name,$age,$sex){
        $user['name'] = $name;
        $user['age'] = $age;
        $user['sex'] = $sex;
        try{
            $res = $this->userRepository->create($user);
        }catch (ValidatorException $e){
            return $e->getMessageBag()->getMessages();
        }
        return $res;
    }

    public function userList(){
        $users = $this->userRepository->findWhereIn('id',[1,2,3,4,5,6]);
        return response($users,200);
    }

    public function userRedis($name,$age)
    {
            $array = ['name'=>$name,'age'=>$age];
            $this->redisRepository->setRedis($array);
    }
}