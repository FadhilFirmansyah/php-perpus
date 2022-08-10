<?php

namespace Config;

require_once __DIR__ . "/Database.php";
require_once __DIR__ . "/../Model/Buku.php";
require_once __DIR__ . "/../Repository/BukuRepository.php";
require_once __DIR__ . "/../Service/BukuService.php";

use Config\Database;
use Model\Buku;
use Repository\BukuRepositoryImpl;
use Service\BukuServiveImpl;

$data = Database::getConnect();
/////////////////////////////////////////////////
$repo = new BukuRepositoryImpl($data);
return $service = new BukuServiveImpl($repo);
/////////////////////////////////////////////////

?>