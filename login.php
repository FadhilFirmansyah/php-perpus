<?php

session_start();

require_once __DIR__ . "/Config/Login.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $user = $_POST["username"];
    $pass = $_POST["password"];

    $login->validate($user, $pass);

    if($_POST["password"] == "admin"){
        $_SESSION["admin"] = true;
        header("Location: katalog.php");
        exit();
    }elseif($_POST["password"] == "user"){
        $_SESSION["common"] = true;
        header("Location: insert.php");
        exit();
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">

    <style>
        .login > .row {
            height: 100vh;
        }
        .login-card {
            padding: 80px 50px;
            background-color: #fff;
            border-radius: 20px;
        }
    </style>
</head>
<body>
    
    <div class="container">
        <section class="login">
            <div class="row justify-content-center align-items-center">
                <div class="col-6 login-card shadow">
                    <h1 class="text-center mb-5">LOGIN</h1>
                    <!-- <?php if (isset($error)) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            Login Gagal, mungkin Username atau Password Salah
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?> -->
                    <form action="" method="POST">
                        <div class="col form-floating mb-3">
                            <input type="text" class="form-control" name="username" id="username"required>
                            <label for="username">Username</label>
                        </div>
                        <div class="col form-floating mb-4">
                            <input type="password" class="form-control" name="password" id="password" required>
                            <label for="password">Password</label>
                        </div>
                        <div class="col text-center mt-4">
                            <button type="submit" class="btn btn-dark" name="login" style="width: 100%;">LOGIN</button>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>

    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>
</html>