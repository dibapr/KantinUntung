<?php
    require "conn.php";
    session_start();

    $nama = $_SESSION['user'];
    mysqli_query($conn, "DELETE FROM antrian WHERE nama = '$nama'");

    header("Location: antrian.php?success=true");
?>