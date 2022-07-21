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
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="../dist/output.css">
</head>
<body>
    <div class="container mx-auto flex justify-center items-center mt-10 p-20">
        <div class="wrapper">
            <h1 class="font-bold text-3xl mb-5 text-dark-green">Registrasi Akun</h1>
            <h3 class="font-medium text-md text-slate-600 w-80 mb-2">Masukkan informasi anda agar dapat melakukan pemesanan.</h3>
            <form method="POST">
                <input type="text" class="form-input w-80 h-auto rounded-tl-lg rounded-tr-lg" name="username" id="username" placeholder="Username" autocomplete="off">
                <br>
                <input type="password" class="form-input w-80 h-auto" name="password" id="password" placeholder="Password" autocomplete="off">
                <br>
                <input type="password" class="form-input w-80 h-auto" name="password2" id="password2" placeholder="Konfirmasi Password" autocomplete="off">
                <br>
                <input type="number" class="form-input w-80 h-auto rounded-bl-lg rounded-br-lg" name="notelp" id="notelp" placeholder="Nomor Telepon" autocomplete="off">
                <p class="w-80 mt-5 text-slate-500">Nomor telepon anda akan kami gunakan untuk memanggil anda ketika pesanan anda sudah siap.</p>
                <div class="button flex">
                    <button type="submit" class="grow bg-light-green text-slate-800 mt-5 py-2 px-8 rounded-lg" name="submit">Submit</button>
                </div>
                <div class="already mt-5">
                    <p class="font-light">Sudah punya akun?<a href="login.php" class="font-medium"> Login disini.</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>