<?php
namespace  App\User\Repository;
use App\User\Models\User;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 *仓储层主要实现 与本实体相关的业务
 * Class UserRepository
 * @package App\User\Repository
 */
class UserRepository extends BaseRepository{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
       return User::class;
    }

    public function userCont(){
        return 12;
    }
}