<?php

namespace App\User\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 模型及实体层主要实现 实体相关操作
 * Class User
 * @package App\User\Models
 */
class User extends Model
{
    public $timestamps = true;  // 自动维护创建时间
    protected $dateFormat = 'U'; // 时间储存格式
    protected $table = 'user'; // 数据库表名
    protected $fillable = ['name', 'age', 'sex','status']; // 数据库表字段
}