<?php
session_start();

require_once __DIR__ . "/Config/Object.php";

if(!$_SESSION["admin"]){
  header("Location: login.php");
  exit();
}

//
$id = htmlspecialchars($_GET["id"]);
//

if($_SERVER["REQUEST_METHOD"] == "POST"){
  $judul = $_POST["judul"];
  $pengarang = $_POST["pengarang"];
  $penerbit = $_POST["penerbit"];
  $isbn = $_POST["isbn"];

  $service->updateBuku($judul, $pengarang, $penerbit, $isbn, $id);

  header("Location: katalog.php");
}

//
$values = $service->showBukuId($id);
//

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Buku</title>

     <!-- Bootstrap -->
     <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="card my-4">
            <h2 class="card-header p-2">Edit Buku</h2>
            <div class="card-body">
              <a href="katalog.php">
                <button type="button" class="btn btn-primary btn-sm mb-4">Kembali</button>
              </a>
                <form action="" method="post">
                <?php foreach($values as $value) { ?>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul" value="<?= $value->getJudul() ?>" required>
                      </div>
                      <div class="mb-3">
                        <label for="pengarang" class="form-label">Pengarang</label>
                        <input type="text" class="form-control" id="pengarang" name="pengarang" value="<?= $value->getPengarang() ?>" required>
                      </div>
                      <div class="mb-3">
                        <label for="penerbit" class="form-label">Penerbit</label>
                        <input type="text" class="form-control" id="penerbit" name="penerbit" value="<?= $value->getPenerbit() ?>" required>
                      </div>
                      <div class="mb-3">
                        <label for="isbn" class="form-label">ISBN</label>
                        <input type="number" class="form-control" id="isbn" name="isbn" value="<?= $value->getIsbn() ?>" required>
                      </div>
                      <div class="mb-3">
                        <button type="submit" name="update" class="btn btn-success">Update</button>
                      </div>
                <?php } ?>
                </form>
            </div>
          </div>
    </div>

    <!-- Bootstrap -->
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>