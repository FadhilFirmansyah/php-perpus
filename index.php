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
        html {
            overflow-x: hidden;
        }
        .hero > .row, .feature > .row {
            height: 100vh;
        }
        .hero-img {
            width: 50%;
            height: auto;
        }
        .feature-img {
            width: 85%;
            height: auto;
            border-radius: 10px;
        }
        footer {
            background-color: #EEE !important;
        }
    </style>
</head>
<body>
    
        <nav class="navbar fixed-top navbar-expand-lg navbar-light bg-light px-5 pt-3">
            <div class="container-fluid justify-content-between">
              <a class="navbar-brand fw-bold" href="#">PERPUSTAKAAN</a>
              <a href="login.php">
                <button type="button" class="btn btn-primary">Login</button>
                </a>
            </div>
        </nav>

          <div class="hero bg-light">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12 d-flex justify-content-center">
                    <div>
                        <h5>Selamat Datang Di</h5>
                        <h1 class="fw-bold mb-2">Perpustakaan SNAPAN</h1>
                        <p>Tempatnya Membaca dan Menambah Ilmu</p>
                        <a href="login.php">
                            <button type="button" class="btn btn-primary btn-sm mt-4">Lihat Buku</button>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 d-flex justify-content-center">
                    <img src="assets/svg/hero.svg" alt="Membaca Buku" class="hero-img">
                </div>
            </div>
        </div>

        <div class="feature bg-light">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12 d-flex justify-content-center">
                    <img src="assets/svg/perpus.jpg" alt="Membaca Buku" class="feature-img">
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12 d-flex justify-content-center">
                    <div>
                        <h2 class="fw-bold mb-3">Koleksi Perpustakaan</h2>
                        <p class="fs-5">Perpustakaan SNAPAN memiliki koleksi buku yang lengkap <br> dalam berbagai bentuk (buku, buku digital, audiovisual, majalah, <br> koran, jurnal, jurnal elektronik)</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="feature bg-light">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 col-md-12 col-sm-12 d-flex justify-content-center">
                    <div class="ms-5">
                        <h2 class="fw-bold mb-3">Peminjaman Buku</h2>
                        <p class="fs-5">Di Perpustakaan SNAPAN memiliki pelayanan pinjam buku kepada para pembaca</p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-12 col-sm-12">
                    <img src="assets/svg/pinjam.jpg" alt="Membaca Buku" class="feature-img ms-5">
                </div>
            </div>
        </div>

        <footer class="pt-3">
            <div class="row">
                <div class="col-12">
                    <p class="fw-bold text-center">
                        &copy; <script>document.write(new Date().getFullYear())</script> SMK N 8 Semarang
                    </p>
                </div>
            </div>
        </footer>
      <!-- Bootstrap -->
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>