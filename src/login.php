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
                    $_SESSION["user"] = $row["username"];
                    $_SESSION["telp"] = $row["notelp"];
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
<body class="dark:bg-slate-800">
    <div class="container mx-auto mt-10 p-20">
        <?php if(isset($errorUsername)) : ?>
                <p class="text-red-500 mb-3">Anda belum memasukkan username.</p>
        <?php elseif (isset($errorPassword)) : ?>
                <p class="text-red-500 mb-3">Anda belum memasukkan password.</p>
        <?php elseif (isset($error)) : ?>
                <p class="text-red-500 mb-3">Username dan password anda tidak cocok.</p>
        <?php endif ; ?>
        <div class="head text-center">
            <h1 class="text-3xl lg:text-5xl mb-4 font-semibold text-dark-green dark:text-light-green">KantinUntung</h1>
            <h3 class="text-md lg:text-xl text-slate-600 dark:text-gray-300">Login untuk masuk</h3>
        </div>
        <div class="form mt-5">
            <form method="POST">
                <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Username</label>
                <div class="flex">
                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-check-fill" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M15.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L12.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg>
                    </span>
                    <input type="text" name="username" id="website-admin" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <label for="website-admin" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300 mt-3">Password</label>
                <div class="flex">
                    <span class="inline-flex items-center px-3 text-sm text-gray-900 bg-gray-200 rounded-l-md border border-r-0 border-gray-300 dark:bg-gray-600 dark:text-gray-400 dark:border-gray-600">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lock-fill" viewBox="0 0 16 16">
                            <path d="M8 1a2 2 0 0 1 2 2v4H6V3a2 2 0 0 1 2-2zm3 6V3a3 3 0 0 0-6 0v4a2 2 0 0 0-2 2v5a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V9a2 2 0 0 0-2-2z"/>
                        </svg>
                    </span>
                    <input type="password" name="password" id="website-admin" class="rounded-none rounded-r-lg bg-gray-50 border text-gray-900 focus:ring-blue-500 focus:border-blue-500 block flex-1 min-w-0 w-full text-sm border-gray-300 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                </div>
                <div class="button flex flex-col">
                    <button type="submit" class="grow bg-light-green text-slate-800 mt-5 py-2 px-8 rounded-lg" name="submit">Login</button>
                    <a href="index.php" class="button grow bg-slate-200 mt-2 text-center py-2 px-8 rounded-lg">Lewati Dulu</a>
                </div>
                <div class="forgot mt-5 dark:text-gray-300">
                    <p class="font-light">Belum punya akun?<a href="register.php" class="font-medium"> Daftar dulu.</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>