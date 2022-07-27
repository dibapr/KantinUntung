<?php
    session_start();
    require "conn.php";

    if(!isset($_SESSION["admin"])) {
        echo "<script>
                    alert('Anda tidak login sebagai admin');
                    window.location = 'login.php';
                </script>";
    }

    if(isset($_GET["delete"])) {
        $notif = $_GET["delete"];
    }

    $sql = "SELECT DISTINCT id_header, total_harga, waktu_pembelian, tanggal_pemesanan FROM detail_transaksi";
    $report = fetch($sql);
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
    <link rel="stylesheet" href="css/font.css">
    <link rel="stylesheet" href="../dist/output.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <script src="js/sidebar.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- End of Utilities -->
    <title>Report</title>
</head>
<body class="dark:bg-slate-800">
    <div class="back flex items-center">
        <a href="admin.php" class="bg-red-500 hover:bg-red-600 text-white p-3 m-5 inline-block rounded-md"><i class="bi bi-arrow-bar-left"></i></a>
        <h1 class="text-2xl font-medium dark:text-gray-300">Report</h1>
    </div>
    <div class="container mx-auto">
        <?php if(isset($notif)) : ?>
            <?php if($notif === "true") : ?>
                <div id="alert-2" class="flex p-4 mb-4 bg-red-100 rounded-lg dark:bg-red-200" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-red-700 dark:text-red-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div class="ml-3 text-sm font-medium text-red-700 dark:text-red-800">
                        Report telah dihapus.
                    </div>
                    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-red-100 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex h-8 w-8 dark:bg-red-200 dark:text-red-600 dark:hover:bg-red-300" data-dismiss-target="#alert-2" aria-label="Close">
                        <span class="sr-only">Close</span>
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    </button>
                    </div>
            <?php endif ; ?>
        <?php endif ; ?>
        <?php if(!empty($report)) : ?>
        <div class="overflow-x-auto relative shadow-md sm:rounded-lg mb-24">
            <button onclick="window.print()" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer inline-block" viewBox="0 0 16 16">
            <path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1z"/>
            <path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2H5zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4V3zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2H5zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1z"/>
            </svg>
            Print
            </button>
            <a type="button" href="deleteReport.php" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash inline-block" viewBox="0 0 16 16">
            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
            <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
            </svg>
            Hapus Report
            </a>
            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="py-3 px-6">
                            No.
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Tanggal Pembelian
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Waktu Pembelian
                        </th>
                        <th scope="col" class="py-3 px-6">
                            Pendapatan
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <?php $totalpendapatan = 0 ?>
                    <?php foreach($report as $lapor) : ?>
                    <tr class="bg-white dark:bg-gray-800 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $no++; ?>
                        </th>
                        <td class="py-4 px-6">
                            <?= $lapor["tanggal_pemesanan"]; ?>
                        </td>
                        <td class="py-4 px-6">
                            <?= $lapor["waktu_pembelian"]; ?>
                        </td>
                        <td class="py-4 px-6">
                            <?= $lapor["total_harga"]; ?>
                        </td>
                    </tr>
                    <?php 
                        $totalpendapatan += $lapor["total_harga"];
                        endforeach ; 
                    ?>
                </tbody>
                <tfoot class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" colspan="3" class="py-3 px-6 text-right">
                            Total Pendapatan
                        </th>
                        <th scope="col" colspan="2" class="py-3 px-6">
                            <?= $totalpendapatan ?>
                        </th>
                    </tr>
                </tfoot>
            </table>
            <?php else : ?>
                <h1 class="dark:text-white text-3xl ml-5">Tidak ada Report</h1>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>