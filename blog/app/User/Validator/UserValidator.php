<?php

namespace  App\User\Validator;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class UserValidator extends LaravelValidator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required',
            'age'  => 'integer',
            'sex'=> 'integer'
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name' => 'required',
            'age'  => 'integer',
            'sex'=> 'integer'
        ]
    ];
    protected $messages = [
        'name.required' => '名字不能为空',
        'age.integer' => '年龄只能为数字',
        'sex.integer' => '性别只能为数字',
    ];

}

