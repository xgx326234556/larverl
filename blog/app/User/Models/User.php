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
   protected  $fillable = ['name','age','sex'];
}