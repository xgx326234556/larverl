<?php

namespace App\User\Models;

use Illuminate\Database\Eloquent\Model;
use Tymon\JWTAuth\Contracts\JWTSubject;
/**
 * 模型及实体层主要实现 实体相关操作
 * Class User
 * @package App\User\Models
 */
class User extends Model implements JWTSubject
{
    public $timestamps = true;  // 自动维护创建时间
    protected $dateFormat = 'U'; // 时间储存格式
    protected $table = 'user'; // 数据库表名
    protected $fillable = ['name', 'age', 'sex','status','password','token']; // 数据库表字段

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}