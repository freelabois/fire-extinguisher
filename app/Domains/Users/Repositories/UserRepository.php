<?php


namespace Domains\Users\Repositories;


use Domains\Users\Models\User;
use Freelabois\LaravelQuickstart\Extendables\Repository;

class UserRepository extends Repository
{
    protected $model = User::class;
}
