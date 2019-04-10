<?php
namespace App\Common\Models;
use Illuminate\Database\Eloquent\Model;

class Redis extends Model
{

    public function setRedis($redisDb,$array)
    {
        $redis = app('redis')->connection($redisDb);
        $redis->set('user', json_encode($array));
        dd(json_decode($redis->get('user')));
    }

}