<?php

namespace Config;

require_once __DIR__ . "/Database.php";
require_once __DIR__ . "/../Model/User.php";
require_once __DIR__ . "/../Repository/UserRepository.php";
require_once __DIR__ . "/../Service/UserService.php";

use Config\Database;
use Model\User;
use Repository\UserRepositoryImpl;
use Service\UserServiceImpl;

$db = Database::getConnect();
$repo = new UserRepositoryImpl($db);
return $login = new UserServiceImpl($repo);

?>