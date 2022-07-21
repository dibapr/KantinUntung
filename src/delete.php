<?php
    require "conn.php";
    $id = $_GET["id"];

    if(hapus($id) > 0) {
        echo "<script>
                alert('Menu berhasil dihapus');
                document.location.href = 'admin.php';
                </script>";
    } else {
        echo "<script>
                alert('Menu gagal dihapus');
                document.location.href = 'admin.php';
                </script>";
    }
?>