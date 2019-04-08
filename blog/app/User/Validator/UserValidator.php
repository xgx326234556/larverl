<?php

namespace  App\User\Validator;

use Prettus\Validator\Contracts\ValidatorInterface;
use Prettus\Validator\LaravelValidator;

class UserValidator extends LaravelValidator
{
    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name' => 'required',
            'age'  => 'required|integer',
            'sex'=> 'required|integer'
        ],
        ValidatorInterface::RULE_UPDATE => [
            //  不想修改的字段也会被检查  有点鸡助
        ]
    ];
    protected $messages = [
        'name.required' => '名字不能为空',
        'age.required' => '年龄不能为空',
        'sex.required' => '性别不能为空',
        'age.integer' => '年龄只能为数字',
        'sex.integer' => '性别只能为数字',
    ];

}

