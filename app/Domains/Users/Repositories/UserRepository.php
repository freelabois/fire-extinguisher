<?php


namespace Freelabois\FiEx\Domains\Users\Repositories;


use Freelabois\FiEx\Domains\Users\Models\User;
use Freelabois\LaravelQuickstart\Extendables\Repository;

class UserRepository extends Repository
{
    protected $model = User::class;
}
