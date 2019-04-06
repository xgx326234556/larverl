<?php

namespace App\User\Http\Controllers;

use App\User\Services\UserService;

class UserController
{
    protected $userService;
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function user(){
      $this->userService->user();
   }
}
