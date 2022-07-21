<?php
    session_start();
    if(!isset($_SESSION["admin"])) {
        echo "<script>alert('Anda bukan admin');</script>";
        header("Location: login.php");
    }
    require "conn.php";
    $snacks = fetch("SELECT * FROM menu WHERE id_menu_type = 3");
    $no = 1;
?>

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
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="../dist/output.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="js/sidebar.js"></script>
    <!-- End of Utilities -->
    <title>Snack - Backend</title>
</head>
<body class="bg-gray-200">
    <!-- Sidebar (Copas dari sini) -->
    <div class="button">
        <button class="m-5 lg:hidden z-10 fixed bg-light-green p-4 rounded-lg" onclick="Open()"><i class="bi bi-menu-app text-3xl"></i></button>
    </div>
    <div class="flex flex-row items-start">
        <aside class="w-64 sidebar" id="sidebar" aria-label="Sidebar">
            <div class="overflow-y-auto lg:fixed bg-mid-green h-screen py-4 px-3 w-64">
                <a href="https://flowbite.com/" class="flex items-center pl-2.5 mb-5">
                    <span class="self-center text-xl font-semibold whitespace-nowrap text-slate-700">KantinUntung</span>
                </a>
                <ul class="space-y-2">
                    <li>
                        <a href="admin.php" class="flex items-center p-2 text-base font-normal text-slate-700 rounded-lg hover:bg-gray-100">
                        <svg aria-hidden="true" class="w-6 h-6 text-slate-700 transition duration-75 dark:group-hover:text-white" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
                        <span class="ml-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="makanan_admin.php" class="flex items-center p-2 text-base font-normal text-slate-700 rounded-lg hover:bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="currentColor" class="bi bi-egg-fried" viewBox="0 0 16 16">
                        <path d="M8 11a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        <path d="M13.997 5.17a5 5 0 0 0-8.101-4.09A5 5 0 0 0 1.28 9.342a5 5 0 0 0 8.336 5.109 3.5 3.5 0 0 0 5.201-4.065 3.001 3.001 0 0 0-.822-5.216zm-1-.034a1 1 0 0 0 .668.977 2.001 2.001 0 0 1 .547 3.478 1 1 0 0 0-.341 1.113 2.5 2.5 0 0 1-3.715 2.905 1 1 0 0 0-1.262.152 4 4 0 0 1-6.67-4.087 1 1 0 0 0-.2-1 4 4 0 0 1 3.693-6.61 1 1 0 0 0 .8-.2 4 4 0 0 1 6.48 3.273z"/>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Makanan</span>
                        </a>
                    <li>
                        <a href="minuman_admin.php" class="flex items-center p-2 text-base font-normal text-slate-700 rounded hover:bg-gray-100 dar">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-cup-straw w-6 h-6" viewBox="0 0 16 16">
                        <path d="M13.902.334a.5.5 0 0 1-.28.65l-2.254.902-.4 1.927c.376.095.715.215.972.367.228.135.56.396.56.82 0 .046-.004.09-.011.132l-.962 9.068a1.28 1.28 0 0 1-.524.93c-.488.34-1.494.87-3.01.87-1.516 0-2.522-.53-3.01-.87a1.28 1.28 0 0 1-.524-.93L3.51 5.132A.78.78 0 0 1 3.5 5c0-.424.332-.685.56-.82.262-.154.607-.276.99-.372C5.824 3.614 6.867 3.5 8 3.5c.712 0 1.389.045 1.985.127l.464-2.215a.5.5 0 0 1 .303-.356l2.5-1a.5.5 0 0 1 .65.278zM9.768 4.607A13.991 13.991 0 0 0 8 4.5c-1.076 0-2.033.11-2.707.278A3.284 3.284 0 0 0 4.645 5c.146.073.362.15.648.222C5.967 5.39 6.924 5.5 8 5.5c.571 0 1.109-.03 1.588-.085l.18-.808zm.292 1.756C9.445 6.45 8.742 6.5 8 6.5c-1.133 0-2.176-.114-2.95-.308a5.514 5.514 0 0 1-.435-.127l.838 8.03c.013.121.06.186.102.215.357.249 1.168.69 2.438.69 1.27 0 2.081-.441 2.438-.69.042-.029.09-.094.102-.215l.852-8.03a5.517 5.517 0 0 1-.435.127 8.88 8.88 0 0 1-.89.17zM4.467 4.884s.003.002.005.006l-.005-.006zm7.066 0-.005.006c.002-.004.005-.006.005-.006zM11.354 5a3.174 3.174 0 0 0-.604-.21l-.099.445.055-.013c.286-.072.502-.149.648-.222z"/>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Minuman</span>
                        </a>
                    </li>
                    <li>
                        <a href="snack_admin.php" class="flex items-center p-2 text-base font-normal text-slate-700 rounded bg-gray-100">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-egg w-6 h-6" viewBox="0 0 16 16">
                        <path d="M8 15a5 5 0 0 1-5-5c0-1.956.69-4.286 1.742-6.12.524-.913 1.112-1.658 1.704-2.164C7.044 1.206 7.572 1 8 1c.428 0 .956.206 1.554.716.592.506 1.18 1.251 1.704 2.164C12.31 5.714 13 8.044 13 10a5 5 0 0 1-5 5zm0 1a6 6 0 0 0 6-6c0-4.314-3-10-6-10S2 5.686 2 10a6 6 0 0 0 6 6z"/>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Snack</span>
                        </a>
                    </li>
                    <li>
                        <a href="logout.php" class="flex items-center p-2 text-base font-normal text-red-500 rounded hover:text-white hover:bg-red-500">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" class="bi bi-door-open w-6 h-6" viewBox="0 0 16 16">
                        <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z"/>
                        <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117zM11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5zM4 1.934V15h6V1.077l-6 .857z"/>
                        </svg>
                        <span class="flex-1 ml-3 whitespace-nowrap">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </aside>
        <!-- End of Sidebar -->
        <div class="panel lg:m-12 m-6 mt-24 self-center">
            <h1 class="text-3xl font-semibold mb-5">Snack</h1>
            <div class="add font-medium">
                <a class="text-white p-2 rounded bg-blue-500 hover:bg-blue-600 ease-in-out duration-300" href="add_menu.php"><i class="bi bi-plus"></i> Tambah Menu Baru</a>
            </div>
            <div class="snack-wrapper mt-5 grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-4 gap-5">
                <?php foreach($snacks as $snack) : ?>
                <div class="card rounded-lg bg-white grid py-5 px-10 divide-y-2 gap-3">
                    <img class="rounded-md" width="100px" height="100px" src="assets/img/<?= $snack["image"]; ?>" alt="">
                    <h1><b>Nama Menu:</b>  <?= $snack["menu_name"]; ?></h1>
                    <h1><b>Harga:</b> <?= $snack["price"]; ?></h1>
                    <h1><b>Stock:</b> <?= $snack["stock"]; ?></h1>
                    <h1><b>Action:</b></h1>
                    <div class="btn inline-block">
                        <a class="text-white block mb-1 px-3 py-2 rounded-md bg-blue-500 hover:bg-blue-600 ease-in-out duration-150" href="edit.php?id=<?= $snack["id"]; ?>"><i class="bi bi-pencil-square"></i> Edit</a>
                        <a class="text-white block px-3 py-2 rounded-md bg-red-500 hover:bg-red-600 ease-in-out duration-150" href="delete.php?id=<?= $snack["id"]; ?>"><i class="bi bi-trash"></i> Delete</a>
                    </div>
                </div>
                <?php endforeach ; ?>     
            </div>
        </div>
    </div>
</body>
</html>