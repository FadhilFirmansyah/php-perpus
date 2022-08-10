<?php

namespace Service;

use Model\User;
use Repository\UserRepositoryImpl;

interface UserService{
    public function validate(string $username, string $password):void;
}

class UserServiceImpl implements UserService{
    public function __construct(private UserRepositoryImpl $repo)
    {
        
    }

    public function validate(string $username, string $password): void
    {
        $user = new User(
            user: $username,
            pass: $password
        );

        $this->repo->login($user);
    }
}

?>