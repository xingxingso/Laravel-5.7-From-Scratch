<?php 

namespace App\Repositories;

use App\Repositories\UserRepository;

class DbUserRepository implements UserRepository
{
    public function create($attributes) 
    {
        dd('creating the user');
    }
}
