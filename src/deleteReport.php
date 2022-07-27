<?php
    require "conn.php";
    $sql = "TRUNCATE TABLE detail_transaksi";
    mysqli_query($conn, $sql);

    header("Location: report.php?delete=true");

?>