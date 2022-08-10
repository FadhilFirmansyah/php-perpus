<?php
error_reporting(0);

session_start();

require_once __DIR__ . "/Config/Object.php";

if($_SESSION["common"] == true || $_SESSION["admin"] == true){
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $judul = $_POST["judul"];
    $pengarang = $_POST["pengarang"];
    $penerbit = $_POST["penerbit"];
    $isbn = $_POST["isbn"];

    //
    $gambar = $_FILES["gambar"]["name"];
    $typeGambar = $_FILES["gambar"]["type"];
    $sizeGambar = $_FILES["gambar"]["size"];
    $pathGambar = $_FILES["gambar"]["tmp_name"];
    //
    if($typeGambar == "image/jpeg" || $typeGambar == "image/png"){
        if($sizeGambar <= 40000000){
            move_uploaded_file($pathGambar, __DIR__ . "/images/" . $gambar);
            $service->saveBuku($judul, $pengarang, $penerbit, $gambar, $isbn);
            //
            if($_SESSION["common"]){
              header("Location: insert.php");
            }else{
              header("Location: katalog.php");
              exit();
            }
            exit();
        }
    }else{
      echo "Pastikan gambar bertipe png/jpg dan ukuran gambar kurang dari 40mb";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>

     <!-- Bootstrap -->
     <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card my-4">
            <h2 class="card-header p-2">Tambah Buku</h2>
            <div class="card-body">
              <?php 
              if($_SESSION["admin"]){
                echo "<a href='katalog.php'><button type='button' class='btn btn-primary btn-sm mb-4'>Kembali</button></a>";
              }elseif($_SESSION["common"]){
                echo "<a href='login.php'><button type='button' class='btn btn-primary btn-sm mb-4'>Kembali</button></a>";
              }
              ?>                            
              <a href="logout.php">
                <button type="button" class="btn btn-secondary btn-sm mb-4">Logout</button>
              </a>
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" required>
                      </div>
                      <div class="mb-3">
                        <label for="gambar" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="gambar" name="gambar" required>
                      </div>
                      <div class="mb-3">
                        <label for="pengarang" class="form-label">Pengarang</label>
                        <input type="text" class="form-control" id="pengarang" name="pengarang" required>
                      </div>
                      <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="penerbit" required>
                      </div>
                      <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="number" class="form-control" id="isbn" name="isbn" required>
                      </div>
                      <div class="mb-3">
                        <button type="submit" name="insert" class="btn btn-success">Tambah</button>
                      </div>
                </form>
            </div>
          </div>
    </div>

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php } ?>