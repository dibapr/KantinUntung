<?php
    session_start();
    require 'conn.php';

    if(isset($_POST["submit"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
        if(!$username) {
            $errorUsername = true;
        } elseif(!$password) {
            $errorPassword = true;
        }
        //Check Username
        if(mysqli_num_rows($result) === 1) {
            //Check Password
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row["password"])) {
                $_SESSION["level"] = $row["id_user_level"];
                if($_SESSION["level"] == 1) {
                    $_SESSION["admin"] = true;
                    header("Location: admin.php");
                } else {
                    $_SESSION["login"] = true;
                    header("Location: index.php");
                }
                exit;
            }
        }
        $error = true;
    }
    //Kalau sudah login, dilempar lagi ke halaman Index

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="../dist/output.css">
    <title>Login</title>
</head>
<body>
    <div class="container mx-auto flex items-center justify-center flex-col mt-10 p-20">
        <?php if(isset($errorUsername)) : ?>
                <p class="text-red-500 mb-3">Anda belum memasukkan username.</p>
        <?php elseif (isset($errorPassword)) : ?>
                <p class="text-red-500 mb-3">Anda belum memasukkan password.</p>
        <?php elseif (isset($error)) : ?>
                <p class="text-red-500 mb-3">Username dan password anda tidak cocok.</p>
        <?php endif ; ?>
        <div class="head">
            <h1 class="text-5xl mb-4 font-semibold text-dark-green">KantinUntung</h1>
            <h3 class="text-xl text-slate-600">Login untuk masuk</h3>
        </div>
        <div class="form mt-5">
            <form method="POST">
                <input type="text" class="form-input w-80 h-auto rounded-tl-lg rounded-tr-lg" name="username" id="username" placeholder="Username" autocomplete="off">
                <br>
                <input type="password" class="form-input w-80 h-auto rounded-bl-lg rounded-br-lg" name="password" id="password" placeholder="Password" autocomplete="off">
                <div class="button flex">
                    <button type="submit" class="grow bg-light-green text-slate-800 mt-5 py-2 px-8 rounded-lg" name="submit">Login</button>
                </div>
                <div class="forgot mt-5">
                    <p class="font-light">Belum punya akun?<a href="register.php" class="font-medium"> Daftar dulu.</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>