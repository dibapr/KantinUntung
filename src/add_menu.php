<?php require "conn.php"; ?>
<?php if(isset($_POST["submit"])) : ?>
            <?php if(add($_POST) > 0) : ?>
                <script>
                    confirm("Apakah sudah yakin dengan data menu anda?");
                    window.location = "admin.php";
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
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" />
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="../dist/output.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
    <script src="js/sidebar.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- End of Utilities -->
    <title>Add Menu - Backend</title>
</head>
<body class="dark:bg-slate-800">
    <div class="back flex items-center">
        <a href="admin.php" class="bg-red-500 hover:bg-red-600 text-white p-3 m-5 inline-block rounded-md"><i class="bi bi-arrow-bar-left"></i></a>
        <h1 class="text-2xl font-medium dark:text-gray-300">Tambahkan Menu Baru</h1>
    </div>
    <div class="container mx-auto px-10">
        <div class="form">
            <form method="POST" enctype="multipart/form-data">             
                
                <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300" for="user_avatar">Upload file</label>
                <input name="gambar" class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="user_avatar_help" id="user_avatar" type="file">
                <div class="mt-1 text-sm text-gray-500 dark:text-gray-300 italic font-light mb-6" id="user_avatar_help">Ukuran maksimal gambar adalah 10 MB</div>
                
                <div class="mb-6">
                    <label for="base-input" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Nama Menu</label>
                    <input name="menu_name" type="text" id="base-input" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required autocomplete="off">
                </div>
                
                
                <label for="jenis" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Jenis Menu</label>
                <select name="id_menu_type" id="jenis" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 mb-6" required>
                    <option value="0" selected>=== Pilih Jenis Menu ===</option>
                    <option value="1">Makanan</option>
                    <option value="2">Minuman</option>
                    <option value="3">Snack</option>
                </select>
                
                <div class="mb-6">
                    <label for="harga" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Harga</label>
                    <input type="number" name="price" id="harga" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                </div>
                
                <button class="bg-mid-green hover:bg-dark-green hover:text-white p-5 mt-3 rounded-lg font-medium text-slate-800" type="submit" name="submit">Tambah Menu</button>
            
            </form>
        </div>
    </div>
</body>