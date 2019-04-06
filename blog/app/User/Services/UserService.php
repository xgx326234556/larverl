<?php

namespace App\User\Services;
use App\User\Repository\UserRepository;
use App\User\Validator\UserValidator;
use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\Exceptions\ValidatorException;

/**
 * 服务层主要实现  业务逻辑
 * Class UserService
 * @package App\User\Services
 */
class UserService{

    protected $userRepository;
    protected $userValidator;

    public function __construct(UserRepository $userRepository,UserValidator $userValidator)
    {
        $this->userRepository = $userRepository;
        $this->userValidator = $userValidator;
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
     * @return mixed
     */
    public function addUserOne($name,$age,$sex){
        $user['name'] = $name;
        $user['age'] = $age;
        $user['sex'] = $sex;
        try{
            $this->userValidator->with($user)->passesOrFail( ValidatorInterface::RULE_CREATE );
            $res = $this->userRepository->create($user);
        }catch (ValidatorException $e){
           dd($e->getMessage());
        }
        return $res;

    }
}