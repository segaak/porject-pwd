<?php
// Establishing the database connection
$conn = mysqli_connect("localhost", "root", "", "charity");

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}


if (!function_exists('query')) {
    function query($query, $params = []) {
        global $conn;
   
        $stmt = mysqli_prepare($conn, $query);
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars(mysqli_error($conn)));
        }
        
       
        if (!empty($params)) {
            $types = str_repeat("s", count($params));
            mysqli_stmt_bind_param($stmt, $types, ...$params);
        }
        
     
        if (!mysqli_stmt_execute($stmt)) {
            die('Execute failed: ' . htmlspecialchars(mysqli_stmt_error($stmt)));
        }
      
        $result = mysqli_stmt_get_result($stmt);
        if ($result === false) {
            die('Get result failed: ' . htmlspecialchars(mysqli_stmt_error($stmt)));
        }
        
     
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
}

if (!function_exists('tambah')) {
    function tambah($data) {
        global $conn;
        
        $nama = htmlspecialchars($data["nama"]);
        $telepon = htmlspecialchars($data["telepon"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $kota = htmlspecialchars($data["kota"]);
        $provinsi = htmlspecialchars($data["provinsi"]);
        $pos = htmlspecialchars($data["pos"]);
        $jumlah = htmlspecialchars($data["jumlah"]);
        $metode = htmlspecialchars($data["metode"]);
        $tujuan = htmlspecialchars($data["tujuan"]);
        $catatan = htmlspecialchars($data["catatan"]);
        
        $query = "INSERT INTO donasi (nama, telepon, alamat, kota, provinsi, pos, jumlah, metode, tujuan, catatan)
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssssssssss", $nama, $telepon, $alamat, $kota, $provinsi, $pos, $jumlah, $metode, $tujuan, $catatan);
        
        if (mysqli_stmt_execute($stmt)) {
            return mysqli_affected_rows($conn);
        } else {
            return -1;
        }
    }
}

if (!function_exists('update')) {
    function update($data) {
        global $conn;
        
        $id = $data["id"];
        $nama = htmlspecialchars($data["nama"]);
        $telepon = htmlspecialchars($data["telepon"]);
        $alamat = htmlspecialchars($data["alamat"]);
        $kota = htmlspecialchars($data["kota"]);
        $provinsi = htmlspecialchars($data["provinsi"]);
        $pos = htmlspecialchars($data["pos"]);
        $jumlah = htmlspecialchars($data["jumlah"]);
        $metode = htmlspecialchars($data["metode"]);
        $tujuan = htmlspecialchars($data["tujuan"]);
        $catatan = htmlspecialchars($data["catatan"]);
        
        $query = "UPDATE donasi SET
                  nama = ?, telepon = ?, alamat = ?, kota = ?, provinsi = ?, pos = ?, jumlah = ?, metode = ?, tujuan = ?, catatan = ?
                  WHERE id = ?";
        
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssssssssssi", $nama, $telepon, $alamat, $kota, $provinsi, $pos, $jumlah, $metode, $tujuan, $catatan, $id);
        
        if (mysqli_stmt_execute($stmt)) {
            return mysqli_affected_rows($conn);
        } else {
            return -1;
        }
    }
}
if (!function_exists('hapus')) {
    function hapus($id) {
        global $conn;
        
        $query = "DELETE FROM donasi WHERE id = ?";
        
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        
        if (mysqli_stmt_execute($stmt)) {
            return mysqli_affected_rows($conn);
        } else {
            return -1;
        }
    }
}
if (!function_exists('delete')){
    function delete($id){
        global $conn;
        $query = "DELETE FROM user WHERE id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "i", $id);
        if (mysqli_stmt_execute($stmt)) {
            return mysqli_affected_rows($conn);
        } else {
            return -1;
        }
    }
}

if (!function_exists('registrasi')) {
    function registrasi($data) {
        global $conn;
        
        $username = strtolower(stripslashes($data["username"]));
        $password = mysqli_real_escape_string($conn, $data["password"]);
        $password2 = mysqli_real_escape_string($conn, $data["password2"]);
   
        $result = query("SELECT username FROM user WHERE username = ?", [$username]);
        if ($result) {
            echo "<script>
                    alert('Username sudah terdaftar!');
                  </script>";
            return false;
        }
        
        
        if ($password !== $password2) {
            echo "<script>
                    alert('Konfirmasi password tidak sesuai!');
                  </script>";
            return false;
        }
        
    
        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        
        $query = "INSERT INTO user (username, password) VALUES (?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ss", $username, $passwordHash);
        
        if (mysqli_stmt_execute($stmt)) {
            return mysqli_affected_rows($conn);
        } else {
            return -1;
        }
    }
}
?>
