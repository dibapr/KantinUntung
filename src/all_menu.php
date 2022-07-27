<?php
    require "conn.php";
    session_start();
    $allmenu = fetch("SELECT * FROM menu");
    if(isset($_POST["cari"])) {
        $allmenu = cari($_POST["keyword"]);
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
    <title>Semua Menu</title>
</head>
<body class="dark:bg-slate-800">
    <nav class="bg-mid-green border-gray-200 px-2 sm:px-4 py-2.5 dark:bg-gray-900 sticky top-0 z-50">
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
                    <a href="index.php" class="block py-2 pr-4 pl-3 hover:text-blue-700 dark:hover:bg-gray-7    00 dark:hover:text-white rounded md:bg-transparent md:p-0 dark:text-gray-400">Home</a>
                </li>
                <li>
                    <button aria-current="page" id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex justify-between items-center py-2 pr-4 pl-3 w-full font-medium text-gray-700 border-b border-gray-100 hover:bg-gray-50 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 dark:md:hover:text-white md:p-0 md:w-auto dark:text-gray-400 dark:hover:text-white dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">List Menu <svg class="ml-1 w-4 h-4" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
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
    <div class="container mx-auto mt-10">
        <form method="POST">   
            <div class="relative mx-10">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input type="search" name="keyword" id="default-search" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Cari menu...">
                <button type="submit" name="cari" class="text-white absolute right-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Cari</button>
            </div>
        </form>
        <div class="menu mb-10 mt-10">
            <?php if(isset($_POST["cari"])) : ?>
                <h1 class="dark:text-gray-300 text-3xl font-bold mb-5 text-center md:text-left">Pencarian menu berdasarkan "<?= $_POST["keyword"]; ?>"</h1>
                <?php else : ?>
                    <h1 class="dark:text-gray-300 text-3xl font-bold mb-5 text-center md:text-left">Semua Menu</h1>
            <?php endif ; ?>
            <div class="makanan-card mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5">
                <?php foreach($allmenu as $menu) : ?>
                <div class="max-w-sm bg-white rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <img class="p-8 rounded-t-lg" src="assets/<?= $menu["image"]; ?>" alt="product image">
                    <div class="px-5 pb-5">
                        <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white"><?= $menu["menu_name"]; ?></h5>
                        <div class="flex justify-between items-center">
                            <span class="text-3xl font-bold text-gray-900 dark:text-white">Rp. <?= $menu["price"]; ?></span>
                            <a href="doCart.php?id=<?= $menu["id"]; ?>" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Keranjang</a>
                        </div>
                    </div>
                </div>
            <?php endforeach ; ?>
            </div>    
        </div>
    </div>
    <footer class="p-4 bg-white rounded-lg block fixed bottom-0 md:p-6 dark:bg-gray-800">
        <span class="text-sm text-gray-500 sm:text-center dark:text-gray-400">© 2022 <a href="" class="hover:underline">KantinUntung™</a>. All Rights Reserved.
        </span>
    </footer>
</body>
</html>