<?php
    session_start();
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
    <title>Main</title>
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.1/dist/flowbite.min.css" />
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="../dist/output.css">
    <script src="https://unpkg.com/flowbite@1.5.1/dist/flowbite.js"></script>
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
                    <a href="index.php" class="block py-2 pr-4 pl-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white" aria-current="page">Home</a>
                </li>
                <li>
                    <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex justify-between items-center py-2 pr-4 pl-3 w-full font-medium text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:md:hover:text-white md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">List Menu <svg class="ml-1 w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
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
                    <a href="cart.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Keranjang</a>
                </li>
                <li>
                    <a href="antrian.php" class="block py-2 pr-4 pl-3 text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-gray-700">Antrian</a>
                </li>
                </ul>
            </div>
        </div>
    </nav>
    <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28 flex flex-col-reverse lg:flex-row mb-24">
        <div class="sm:text-center lg:text-left">
          <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
            <span class="block dark:text-slate-200 xl:inline">Selamat Datang di</span>
            <span class="block text-mid-green xl:inline">KantinUntung</span>
          </h1>
          <p class="mt-3 text-base dark:text-slate-300 text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
            Tempat kalian untuk menikmati segala jajanan dengan berbagai makanan, minuman, hingga snack dengan harga terjangkau. Dilengkapi dengan fasilitas yang lengkap, membuat jajan anda menjadi lebih nyaman dan nikmat.
          </p>
          <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
            <div class="rounded-md shadow">
              <a href="all_menu.php" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-green-600 hover:bg-green-700 md:py-4 md:text-lg md:px-10"> Lihat Semua Menu </a>
            </div>
            <?php if(!isset($_SESSION["user"])) : ?>
            <div class="mt-3 sm:mt-0 sm:ml-3">
              <a href="register.php" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-green-700 bg-indigo-100 hover:bg-green-200 md:py-4 md:text-lg md:px-10"> Registrasi Akun </a>
            </div>
            <?php endif ; ?>
          </div>
        </div>
        <div class="lg:inset-y-0 lg:right-0 lg:w-1/2 mb-7 lg:mb-0">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full rounded-xl" src="assets/img/kantin.jpg" alt="">
        </div>
    </main>
      
    <footer class="p-4 bg-white rounded-lg block fixed bottom-0 md:p-6 dark:bg-gray-800">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="" class="hover:underline">KantinUntung™</a>. All Rights Reserved.
        </span>
    </footer>
</body>
</html>