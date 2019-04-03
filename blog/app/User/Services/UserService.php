<?php

namespace App\User\Services;
use App\User\Models\UserModel;

class UserService{

    protected $userModel;
    public function __construct(UserModel $userModel)
    {
        $this->userModel = $userModel;
    }

    public function user(){

        $this->userModel->add();
    }
}