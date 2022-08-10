<?php
session_start();

require_once __DIR__ . "/Config/Object.php";

if(!$_SESSION["admin"]){
    header("Location: login.php");
    exit();
}

$data = $service->showAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

    <style>
        a {
            text-decoration: none;
        }
        .gambar {
            width: 100%;
            max-height: 330px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2 class="card-header p-2 text-center">Daftar Buku</h2>
            <div class="card-body">
                <!-- Navigasi -->
              <div class="nav justify-content-between">
                <a href="insert.php">
                    <button type="button" class="btn btn-primary">Tambah</button></a>
                <a href="logout.php">
                    <button type="button" style="margin-left: -350px;" class="btn btn-secondary">Logout</button>
                </a>
                <form class="d-flex" action="search.php" method="POST">
                    <input class="form-control me-2" type="search" name="search" placeholder="Cari Judul Buku" aria-label="Search">
                    <button class="btn btn-primary" type="submit">Cari</button>
                  </form>
              </div>
              <hr>
              <!-- Daftar Buku -->
              <div class="row">
                <?php foreach($data as $buku){ ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card mb-4">
                        <div class="card-body">
                          <h3 class="card-title fs-6"><?= $buku->getJudul() ?></h3>
                          <div class="pt-2 pb-4">
                              <img src="images/<?= $buku->getGambar() ?>" class="gambar">
                          </div>
                          <p><?= $buku->getIsbn() ?></p>
                        <div class="nav justify-content-between">
                        <a href="update.php?id=<?= $buku->getId() ?>">
                            <button type="button" class="btn btn-warning me-2">Edit</button>        
                        </a>
                        <a href="delete.php?id=<?= $buku->getId() ?>">
                            <button type="button" class="btn btn-danger">Hapus</button>        
                        </a>
                        </div>
                        </div>
                      </div>
                </div>
                <?php } ?>
              </div>
            </div>
          </div>
    </div>

    <!-- Bootstrap -->
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>