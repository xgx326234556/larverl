<?php

namespace App\User\Http\Controllers;
use App\User\Services\UserService;
use Illuminate\Http\Request;


class UserController
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;

    }

    public function findUserOne($id){
      $this->userService->findUserOne($id);
   }

   public function addUserOne(Request $request){
        dd(42342423);
       $name = $request->get('name');
       $age = $request->get('age');
       $sex = $request->get('sex');
       $res = $this->userService->addUserOne($name,$age,$sex);
       return $res;
   }

   public function userList(){
       return $this->userService->userList();
   }

   public function userRedis(Request $request){
        $name = $request->get('name');
        $age = $request->get('age');
        $this->userService->userRedis($name,$age);
   }
}
