<?php
    require 'conn.php';
    if(isset($_POST["submit"])) {
        if(register($_POST) > 0) {
            echo "<script>
                    alert('Akun anda telah berhasil dibuat!');
                </script>";
        } else {
            echo mysqli_error($conn);
        }
    }

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
    <title>Register</title>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" />
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="../dist/output.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="js/sidebar.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
</head>
<body class="dark:bg-slate-800">
    <div class="container mx-auto mt-10 p-20">
        <div class="wrapper">
            <h1 class="font-bold text-3xl mb-5 text-dark-green dark:text-light-green text-center">Registrasi Akun</h1>
            <h3 class="font-medium text-md text-slate-600 mb-2 dark:text-gray-300 text-center">Masukkan informasi anda agar dapat melakukan pemesanan.</h3>
            <form method="POST">
                <div class="gap-6 mb-6 grid-cols-2">
                    <div class="mb-6">
                        <label for="username" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Username</label>
                        <input type="text" name="username" id="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" autocomplete="off" required>
                    </div>
                    <div>
                        <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Phone number</label>
                        <input type="number" name="notelp" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="08xxxxxxxxxx" required>
                    </div>
                </div>
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Password</label>
                        <input type="password" name="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                    <div>
                        <label for="password2" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Konfirmasi Password</label>
                        <input type="password" name="password2" id="password2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>
                </div>
                <div class="button flex flex-col">
                    <button type="submit" class="grow bg-light-green text-slate-800 mt-5 py-2 px-8 rounded-lg" name="submit">Submit</button>
                    <a href="index.php" class="button grow bg-slate-200 mt-2 text-center py-2 px-8 rounded-lg">Lewati Dulu</a>
                </div>
                <div class="already mt-5 dark:text-gray-300">
                    <p class="font-light">Sudah punya akun?<a href="login.php" class="font-medium"> Login disini.</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>