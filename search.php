<?php 
require_once __DIR__ . "/Config/Connection.php";

$keyword = $_POST['search']

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
                <a href="katalog.php">
                    <button type="button" class="btn btn-primary btn-sm">Kembali</button></a>
                <a href="logout.php">
                    <button style="margin-left: -350px;" type="button" class="btn btn-secondary btn-sm">Logout</button>
                </a>
                <form class="d-flex" action="search.php" method="POST">
                    <input class="form-control me-2" type="search" name="search" placeholder="Cari Judul Buku" aria-label="Search">
                    <button class="btn btn-primary" type="submit">Cari</button>
                  </form>
              </div>
              <hr>
              <!-- Daftar Buku -->
              <div class="row">
              <?php
                    $buku = mysqli_query($koneksi,"SELECT * FROM tbl_buku WHERE judul LIKE '%$keyword%'");
                    $x = mysqli_num_rows($buku);
                    if ($x > 0) {
                        while($b = mysqli_fetch_array($buku)){
                ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="card mb-4">
                        <div class="card-body">
                          <h3 class="card-title fs-6"><?= $b['judul']; ?></h3>
                          <div class="pt-2 pb-4">
                              <img src="images/<?= $b['gambar']; ?>" class="gambar">
                          </div>
                          <p><?= $b["isbn"] ?></p>
                        <div class="nav justify-content-between">
                        <a href="update.php?id=<?= $b['id_buku']; ?>">
                            <button type="button" class="btn btn-warning me-2">Edit</button>        
                        </a>
                        <a href="delete.php?id=<?= $b['id_buku']; ?>">
                            <button type="button" class="btn btn-danger">Hapus</button>        
                        </a>
                        </div>
                        </div>
                      </div>
                </div>
                <?php 
                        }
                    } else {
                        $error = true;
                    }
                ?>
              </div>
              <?php if(isset($error)) { ?>
                <div class="alert alert-danger" role="alert">
                    Buku Tidak Ditemukan
                </div>
                <?php } ?> 
            </div>
          </div>
    </div>

    <!-- Bootstrap -->
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>