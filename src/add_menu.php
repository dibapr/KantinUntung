<?php require "conn.php"; ?>
<?php if(isset($_POST["submit"])) : ?>
            <?php if(add($_POST) > 0) : ?>
                <script>
                    confirm("Apakah sudah yakin dengan data menu anda?");
                </script>
            <?php else : ?>
                <script>alert("Menu baru gagal ditambahkan!")</script>
            <?php endif ; ?>
<?php endif ; ?>
     
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Utilities -->
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
    </style>
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="../dist/output.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="js/sidebar.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- End of Utilities -->
    <title>Add Menu - Backend</title>
</head>
<body>
    <div class="back flex items-center">
        <a href="admin.php" class="bg-red-500 hover:bg-red-600 text-white p-3 m-5 inline-block rounded-md"><i class="bi bi-arrow-bar-left"></i></a>
        <h1 class="text-2xl font-medium">Tambahkan Menu Baru</h1>
    </div>
    <div class="wrapper flex justify-center items-center">
        <div class="form">
            <form method="POST" enctype="multipart/form-data">
                <label for="gambar">Gambar:</label><br>
                <input class="pb-5 file:bg-purple-500 file:border-none file:p-3 file:mr-3 file:text-white file:rounded-md file:hover:bg-purple-600" type="file" name="gambar" id="gambar" accept=".jpg, .jpeg, .png"><br>
                <label for="nama">Nama Menu:</label><br>
                <input class="pb-5 form-input" type="text" name="menu_name" id="nama"><br>
                <label for="jenis">Jenis Menu:</label><br>
                <select class="pb-5" name="id_menu_type" id="jenis">
                    <option value="default" disabled selected>=== Pilih Jenis Menu ===</option>
                    <option value="1">1. Makanan</option>
                    <option value="2">2. Minuman</option>
                    <option value="3">3. Snack</option>
                </select><br>
                <label for="price">Harga:</label><br>
                <input class="pb-5 form-input" type="number" name="price" id="price"><br>
                <label for="stock">Stock:</label><br>
                <input class="pb-5 form-input" type="number" name="stock" id="stock"><br>
                <button class="bg-mid-green hover:bg-dark-green hover:text-white p-5 mt-3 rounded-lg font-medium text-slate-800" type="submit" name="submit">Tambah Menu</button>
            </form>
        </div>
    </div>
</body>