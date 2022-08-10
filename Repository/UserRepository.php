<?php

namespace Repository;

use Model\User;
use PDO;

interface UserRepository{
    public function login(User $user):void;
}

class UserRepositoryImpl implements UserRepository{
    public function __construct(private PDO $conn)
    {
        
    }

    public function login(User $user): void
    {
        $sql = <<<SQL
        SELECT username, password FROM tbl_user WHERE
        username = ? AND password = ?;
        SQL;
        $stat = $this->conn->prepare($sql);
        $stat->execute([$user->getUser(), $user->getPass()]);
    }
}

?>