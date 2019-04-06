<?php

namespace App\User\Services;
use App\User\Repository\UserRepository;

/**
 * 服务层主要实现  业务逻辑
 * Class UserService
 * @package App\User\Services
 */
class UserService{

    protected $userRepository;
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function user(){

     dd(
         $this->userRepository->find(1)->toArray(),
         $this->userRepository->userCont()
     ) ;
    }
}