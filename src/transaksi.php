<?php
    session_start();
    require "conn.php";

    $checkAntrian = mysqli_query($conn, "SELECT * FROM antrian");
    if($checkAntrian) {
        mysqli_num_rows($checkAntrian);
        if(mysqli_num_rows($checkAntrian) > 0) {
            header("Location: cart.php?success=false");
            die;
        }
    }
    
    $totalHarga = $_GET["totalharga"];
    
    date_default_timezone_set("Asia/Jakarta");
    $date = date("Y-m-d");
    $dateTime = date("H:i:s");
    
    $sql = "INSERT INTO header_transaksi VALUES ('', '$date')";
    $query = mysqli_query($conn, $sql);
    $id_transaksi = mysqli_insert_id($conn);

    foreach($_SESSION["cart"] as $cart => $val) {
        $sql2 =  mysqli_query($conn, "INSERT INTO detail_transaksi VALUES ('', '$id_transaksi', '$date', '$dateTime', '".$_SESSION['user']."', $cart, '".$_SESSION['telp']."', $totalHarga)");

        $sql2 .= mysqli_query($conn, "INSERT INTO antrian VALUES ('', '".$_SESSION['user']."', '".$_SESSION['telp']."', $totalHarga)");
    
    }

    unset($_SESSION["cart"]);
    
    header("Location: cart.php?success=true");

?>