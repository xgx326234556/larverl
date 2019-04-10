<?php
namespace App\Common\Repository;
use App\Common\Models\Redis;

class RedisRepository
{
    protected $redis;
    public function __construct(Redis $redis)
    {
       $this->redis = $redis;
    }

    /**
     * 设置 redis 集群 存储
     * @param $array
     */
    public function setRedis($array)
    {
        $redisDb = $this->getRedisDbName();
        $this->redis->setRedis($redisDb[1],$array);
    }

    /**
     * redis 储存库
     * @return array
     */
    public function getRedisDbName(){
        $redisName = array_keys(config('database.redis'));
         unset($redisName[0]);
         return $redisName;
    }

}