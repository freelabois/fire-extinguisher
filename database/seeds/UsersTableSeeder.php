<?php

use Domains\Users\Models\User;
use Illuminate\Database\Seeder;
class UsersTableSeeder extends Seeder
{
    public function run()
    {
        factory(User::class, 50)->create();
    }
}
