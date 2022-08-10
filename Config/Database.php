<?php

namespace Config;

use PDO;

class Database{

    public static function getConnect():PDO{
        $host = "localhost";
        $port = 3306;
        $db = "db_perpus";
        $user = "root";
        $pass = "";

        return new PDO("mysql:host=$host:$port;dbname=$db", $user, $pass);
    }
}

?>