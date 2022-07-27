<?php
    session_start();
    require "conn.php";
    if(!isset($_SESSION["user"])) {
        echo "<script>
                alert('Login terlebih dahulu');
                document.location.href = 'login.php';
                </script>";
    }

    if(isset($_GET["success"])) {
        $alert = $_GET["success"]; 
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
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" />
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="../dist/output.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="js/sidebar.js"></script>
    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
    <title>Keranjang Anda</title>
</head>
<body class="dark:bg-slate-800">
    <nav class="bg-mid-green border-gray-200 px-2 sm:px-4 py-2.5 dark:bg-gray-900 sticky top-0">
        <div class="container flex flex-wrap justify-between items-center mx-auto">
            <a href="index.php" class="flex items-center">
                <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">KantinUntung</span>
            </a>
            <div class="flex items-center md:order-2">
                <?php if(isset($_SESSION["login"])) : ?>
                <a href="logout.php"><button type="button" class="text-white bg-logout hover:bg-red-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-logout dark:hover:bg-red-600 dark:focus:ring-blue-800">Logout</button></a>
                <?php else : ?>
                <a href="login.php"><button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-3 md:mr-0 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Login</button></a>
                <?php endif ; ?>
                <?php if(isset($_SESSION["user"])) : ?>
                <h1 class="dark:text-white ml-2 mr-2"><?= $_SESSION["user"]; ?></h1>
                <?php endif ; ?>
                <button data-collapse-toggle="navbar-cta" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-cta" aria-expanded="false">
                    <span class="sr-only">Open main menu</span>
                    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
                </button>
            </div>
            <div class="hidden justify-between items-center w-full md:flex md:w-auto md:order-1" id="navbar-cta">
                <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                <li>
                    <a href="index.php" class="block py-2 pr-4 pl-3 hover:bg-gray-50 md:bg-transparent md:hover:bg-transparent md:dark:hover:text-white dark:hover:bg-gray-700 md:text-gray-700 md:dark:text-gray-400 md:hover:text-blue-700 rounded md:p-0 dark:text-gray-400 dark:hover:text-white">Home</a>
                </li>
                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex justify-between items-center py-2 pr-4 pl-3 w-full font-medium text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:dark:hover:text-white md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">List Menu <svg class="ml-1 w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
                    <!-- Dropdown menu -->
                    <div id="dropdownNavbar" class="hidden z-10 w-44 font-normal bg-white rounded divide-y divide-gray-100 shadow dark:bg-gray-700 dark:divide-gray-600">
                        <ul class="py-1 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="all_menu.php" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Semua Menu</a>
                            </li>
                            <li>
                                <a href="menu.php?idtype=1" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Makanan</a>
                            </li>
                            <li>
                                <a href="menu.php?idtype=2" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Minuman</a>
                            </li>
                            <li>
                                <a href="menu.php?idtype=3" class="block py-2 px-4 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Snack</a>
                            </li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="cart.php" class="block py-2 pr-4 pl-3 bg-blue-700 md:bg-transparent text-white md:text-blue-700 border-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white dark:hover:bg-gray-700 md:dark:hover:bg-transparent dark:border-gray-700" aria-current="page">Keranjang</a>
                </li>
                <li>
                    <a href="antrian.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Antrian</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>
        <h1 class="dark:text-white text-center text-3xl font-bold m-5">Menampilkan keranjang untuk <?= $_SESSION["user"]; ?> </h1>
        <h1 class="dark:text-white text-center text-md font-reguler italic m-5">Maksimal pembelian 1 untuk setiap menu.</h1>
            <div class="overflow-x-auto relative sm:rounded-lg pt-7 px-5 md:px-52">
                <?php if(isset($alert)) : ?>
                    <?php if($alert === "true") : ?>
                    <div id="alert-2" class="flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200" role="alert">
                        <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Info</span>
                        <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
                            Pembayaran telah berhasil dilakukan.
                        </div>
                        <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-green-100 text-green-500 rounded-lg focus:ring-2 focus:ring-green-400 p-1.5 hover:bg-green-200 inline-flex h-8 w-8 dark:bg-green-200 dark:text-green-600 dark:hover:bg-green-300" data-dismiss-target="#alert-2" aria-label="Close">
                            <span class="sr-only">Close</span>
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        </button>
                    </div>
                    <?php elseif($alert === "false") : ?>
                        <div id="alert-2" class="flex p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200" role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Info</span>
                            <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
                                Pembayaran gagal, silahkan menyelesaikan antrian anda terlebih dahulu.
                            </div>
                            <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300" data-dismiss-target="#alert-2" aria-label="Close">
                                <span class="sr-only">Close</span>
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                            </button>
                        </div>
                        <?php endif ; ?>
                <?php endif ; ?>   
                <?php if(!empty($_SESSION["cart"])) : ?>
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="py-3 px-6">
                                No.
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Nama Menu
                            </th>
                            <th scope="col" class="py-3 px-6">
                                Harga Satuan
                            </th>
                            <th scope="col" class="py-3 px-6">
                                <span class="sr-only">Edit</span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            $no = 1;
                            $totalHarga = 0;
                        ?>
                        
                        <?php foreach($_SESSION["cart"] as $cart => $val) : ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="py-4 px-6">
                                <?= $no++ ?>
                            </td>
                            <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $val["menu"]; ?>
                            </th>
                            <td class="py-4 px-6">
                                <?= $val["harga"]; ?>
                            </td>
                            <td class="py-4 px-6 text-right">
                                <a href="deleteCart.php?id=<?= $cart; ?>" class="font-medium text-logout dark:text-logout hover:underline">Hapus</a>
                            </td>
                        </tr>
                        <?php 
                            $totalHarga += $val["harga"];
                        ?>
                        <?php endforeach ; ?>
                        <tr class="border-b  dark:border-gray-700 bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <th colspan="2" scope="row" class="py-4 px-6 font-medium text-right text-gray-900 whitespace-nowrap dark:text-white">
                                Total Harga
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-right text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $totalHarga;  ?>
                            </th>
                            <th scope="row" class="py-4 px-6 font-medium text-right text-green-500 whitespace-nowrap">
                                <a href="transaksi.php?totalharga=<?= $totalHarga; ?>">Pembayaran</a>
                            </th>
                        </tr>
                    </tbody>
                </table>
                <?php else : ?>
                    <h1 class="dark:text-white text-3xl ml-5">Belum ada menu yang ditambahkan.</h1>
                <?php endif ; ?>
            </div>
            <footer class="p-4 bg-white rounded-lg block fixed bottom-0 md:p-6 dark:bg-gray-800">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="" class="hover:underline">KantinUntung™</a>. All Rights Reserved.
        </span>
    </footer>
    </body>
</html>