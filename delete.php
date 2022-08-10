<?php
session_start();

require_once __DIR__ . "/Config/Object.php";

if(!$_SESSION["admin"]){
    header("Location: login.php");
    exit();
  }

$id = htmlspecialchars($_GET["id"]);

$service->deleteBuku($id);

header("Location: katalog.php");
exit();

?>