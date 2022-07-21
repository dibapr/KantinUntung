<?php
    //Database connect
    $conn = mysqli_connect("localhost", "root", "", "kantin");

    //Fungsi Register
    function register($data) {
        global $conn;
        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);
        $no_telp = $data["notelp"];

        //Check apakah Username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
        if(mysqli_fetch_assoc($result)) {
            echo "<script>
                    alert('Username sudah ada!');
                    </script>";
            return false;
        }
        //Check konfirmasi password
        if($password !== $password2) {
            echo "<script>
                    alert('Konfirmasi Password gagal!');
                    </script>";
            return false;
        }
        //Enkripsi Password
        $password = password_hash($password, PASSWORD_DEFAULT);
        //Tambahkan ke Database
        mysqli_query($conn, "INSERT INTO user VALUES('', 2, '$username', '$password', $no_telp)");
        return mysqli_affected_rows($conn);
    }

    //Menampilkan data
    function fetch($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    //Tambah Menu
    function add($data) {
        global $conn;
        $id_type = (int)$data["id_menu_type"];
        $gambar = upload();
        if(!$gambar) {
            return false;
        }
        $nama = $data["menu_name"];
        $harga = (int)$data["price"];
        $stock = (int)$data["stock"];
        $query = "INSERT INTO menu VALUES('', $id_type, '$gambar', '$nama', '$harga', '$stock')";

        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    //Edit menu
    function edit($data) {
        global $conn;
        $id = $data["id"];
        $id_type = $data["id_menu_type"];
        $gambarlama = $data["gambarlama"];
        $nama = $data["menu_name"];
        $harga = (int)$data["price"];
        $stock = (int)$data["stock"];

        if(!isset($id_type)) {
            echo "<script>alert('Anda belum pilih jenis menu');</script>";
            return false;
        }

        if($_FILES["gambar"]["error"] === 4) {
            $gambar = $gambarlama;
        } else {
            $gambar = upload();
        }

        $query = "UPDATE menu SET image = '$gambar', menu_name = '$nama', id_menu_type = $id_type, price = $harga, stock = $stock WHERE id = $id";
        mysqli_query($conn, $query);
        return mysqli_affected_rows($conn);
    }

    //Upload gambar
    function upload() {
        $imgName = $_FILES["gambar"]["name"];
        $imgSize = $_FILES["gambar"]["size"];
        $imgError = $_FILES["gambar"]["error"];
        $imgTMP = $_FILES["gambar"]["tmp_name"];

        if($imgError === 4) {
            echo "<script>alert('Masukkan gambar terlebih dahulu');</script>";
            return false;
        }

        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $imgName);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        
        if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>alert('File yang diupload bukanlah gambar');</script>";
            return false;
        }

        if($imgSize > 1000000) {
            echo "<script>alert('Ukuran gambar terlalu besar');</script>";
            return false;
        }

        $newImg = uniqid();
        $newImg .= '.';
        $newImg .= $ekstensiGambar;

        move_uploaded_file($imgTMP, 'assets/' . $newImg);

        return $newImg;
    }

    //Hapus Menu
    function hapus($id) {
        global $conn;
        mysqli_query($conn, "DELETE FROM menu WHERE id = $id");
        return mysqli_affected_rows($conn);
    }
?>