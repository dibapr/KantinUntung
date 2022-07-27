<?php
    //Database connect menggunakan mysqli
    $conn = mysqli_connect("localhost", "root", "", "kantin");
    // "global" berfungsi agar variabel koneksi bisa berfungsi dan digunakan kedalam function-function yang dibuat 
    //Fungsi Register
    function register($data) {
        global $conn;
        // Ambil data dari form register
        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);
        $no_telp = (string)$data["notelp"];

        //Check apakah Username sudah ada atau belum
        $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
        if(mysqli_fetch_assoc($result)) {
            echo "<script>
                    alert('Username sudah ada!');
                    </script>";
            return false;
        }
        //Check apakah nomor telepon sudah ada atau belum
        $resulttelp = mysqli_query($conn, "SELECT notelp FROM user WHERE notelp = '$no_telp'");
        if(mysqli_fetch_assoc($resulttelp)) {
            echo "<script>
                    alert('Nomor telepon sudah terdaftar!');
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
        // Mengembalikan nilai 0 atau 1 (Kalo 0 berarti tidak ada perubahan dalam tabel <gagal>, kalo 1 berarti ada perubahan dalam tabel <berhasil>)
        return mysqli_affected_rows($conn);
    }

    //Menampilkan data
    function fetch($query) {
        global $conn;
        $result = mysqli_query($conn, $query);
        // Membuat array kosongan
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            // Push data dari database ke array kosongan
            $rows[] = $row;
        }
        // Mengembalikan sebuah array yang sudah berisi data dari database
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

        if($id_type == 0) {
            echo "<script>alert('Anda belum pilih jenis menu');</script>";
            return false;
        }
        
        $query = "INSERT INTO menu VALUES('', $id_type, '$gambar', '$nama', '$harga')";
        // Tambah ke Database
        mysqli_query($conn, $query);
        // Mengembalikan nilai 0 atau 1 (Kalo 0 berarti tidak ada perubahan dalam tabel <gagal>, kalo 1 berarti ada perubahan dalam tabel <berhasil>)
        return mysqli_affected_rows($conn);
    }

    //Edit menu
    function edit($data) {
        global $conn;
        //Ambil data
        $id = $data["id"];
        $id_type = $data["id_menu_type"];
        $gambarlama = $data["gambarlama"];
        $nama = $data["menu_name"];
        $harga = (int)$data["price"];
        
        //Kalo Jenis Menu nya belom dipilih
        if($id_type == 0) {
            echo "<script>alert('Anda belum pilih jenis menu');</script>";
            return false;
        }
        // Kalo edit menu tapi gambarnya tidak diubah
        if($_FILES["gambar"]["error"] === 4) {
            $gambar = $gambarlama;
        // Kalo edit menu lalu menggunakan gambar yang baru
        } else {
            // Hapus gambar lama di lokal
            $result = mysqli_query($conn, "SELECT image FROM menu WHERE id = $id");
            $file = mysqli_fetch_assoc($result);
            $fileName = implode('.', $file);
            unlink('assets/' . $fileName);
            // Ganti dengan gambar yang baru
            $gambar = upload();
        }

        // Query update menu
        $query = "UPDATE menu SET image = '$gambar', menu_name = '$nama', id_menu_type = $id_type, price = $harga WHERE id = $id";
        mysqli_query($conn, $query);
        // Mengembalikan nilai 0 atau 1 (Kalo 0 berarti tidak ada perubahan dalam tabel <gagal>, kalo 1 berarti ada perubahan dalam tabel <berhasil>)
        return mysqli_affected_rows($conn);
    }

    //Upload gambar
    function upload() {
        // Upload file mengirim array berisi nama file, ukuran file, kode error file, dan tempat penyimpanan sementara file
        $imgName = $_FILES["gambar"]["name"];
        $imgSize = $_FILES["gambar"]["size"];
        $imgError = $_FILES["gambar"]["error"];
        $imgTMP = $_FILES["gambar"]["tmp_name"];

        // Kalo gambarnya belom diupload
        if($imgError === 4) {
            echo "<script>alert('Masukkan gambar terlebih dahulu');</script>";
            return false;
        }

        // Mengambil ekstensi gambar
        $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
        $ekstensiGambar = explode('.', $imgName);
        $ekstensiGambar = strtolower(end($ekstensiGambar));
        
        // Kalo yang diupload bukan gambar
        if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
            echo "<script>alert('File yang diupload bukanlah gambar');</script>";
            return false;
        }

        // Kalo gambar yang diupload melebihi 10 MB
        if($imgSize > 10000000) {
            echo "<script>alert('Ukuran gambar terlalu besar');</script>";
            return false;
        }

        // Generate nama file gambar baru biar tidak ada kesamaan antar tiap gambar
        $newImg = uniqid();
        $newImg .= '.';
        $newImg .= $ekstensiGambar;

        // Memindahkan gambar yang diupload dari tempat penyimpanan sementara ke dalam database
        move_uploaded_file($imgTMP, 'assets/' . $newImg);

        // Mengembalikan nama file gambar yang akan dipakai didalam function tambah data atau edit data
        return $newImg;
    }

    //Hapus Menu
    function hapus($id) {
        global $conn;
        // Fetch File Gambar
        $carifoto = mysqli_query($conn, "SELECT image FROM menu WHERE id = $id");
        $file = mysqli_fetch_assoc($carifoto);
        // Hapus Gambar dari Lokal
        $fileName = implode('.', $file);
        $location = "assets/$fileName";
        if(file_exists($location)) {
            unlink('assets/' . $fileName);
        }
        // Jalankan perintah hapus
        mysqli_query($conn, "DELETE FROM menu WHERE id = $id");
        // Mengembalikan nilai 0 atau 1 (Kalo 0 berarti tidak ada perubahan dalam tabel <gagal>, kalo 1 berarti ada perubahan dalam tabel <berhasil>)
        return mysqli_affected_rows($conn);
    }

    // Fungsi cari menu di halaman "semua menu"
    function cari($keyword) {
        $query = "SELECT * FROM menu WHERE menu_name LIKE '%$keyword%' OR price LIKE '%$keyword%'";
        return fetch($query);
    }
?>