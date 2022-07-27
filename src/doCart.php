<?php
    require "conn.php";
    session_start();
    $id = $_GET["id"];
    $sql = "SELECT * FROM menu WHERE id = $id";
    $query = mysqli_query($conn, $sql);
    $result = mysqli_fetch_assoc($query);

    $_SESSION["cart"][$id] = [
        "nama" => $nama = $_SESSION["user"],
        "menu" => $result["menu_name"],
        "harga" => $result["price"]
    ];

    header("Location: cart.php");
?>