<?php
session_start();
require 'function.php';
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

// $host       = "localhost";
// $user       = "root";
// $pass       = "";
// $db         = "charity";

// $koneksi    = mysqli_connect($host, $user, $pass, $db);
// if (!$koneksi) { //cek koneksi
//     die("Tidak bisa terkoneksi ke database");
// }
// $nama       = "";
// $telepon   = "";
// $alamat  = "";
// $kota      = "";
// $provinsi      = "";
// $pos       = "";
// $jumlah       = "";
// $metode = "";
// $informasi = "";
// $catatan = "";
// $sukses     = "";
// $error      = "";

if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}
if($op == 'delete'){
    $id         = $_GET['id'];
    $sql1       = "delete from donasi where id = '$id'";
    $q1         = mysqli_query($koneksi,$sql1);
    if($q1){
        $sukses = "Berhasil hapus data";
    }else{
        $error  = "Gagal melakukan delete data";
    }
}
if ($op == 'edit') {
    $id         = $_GET['id'];
    $sql1       = "select * from donasi where id = '$id'";
    $q1         = mysqli_query($koneksi, $sql1);
    $r1         = mysqli_fetch_array($q1);
    $nama       = $r1['nama'];
    $telepon   = $r1['telepon'];
    $alamat  = $r1['alamat'];
    $kota      = $r1['kota'];
    $provinsi      = $r1['provinsi'];
    $pos       = $r1['pos'];
    $jumlah       = $r1['jumlah'];
    $metode = $r1['metode'];
    $infromasi = $r1['informasi'];
    $catatan = $r1['catatan'];
    if ($nama == '') {
        $error = "Data tidak ditemukan";
    }
}

if (isset($_POST["tambah"])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Data gagal ditambahkan!');
              </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vatika Yayasan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
}
header {
  background: url(border.jpeg) center/cover no-repeat; 
  color: white;
  text-align: center;
  padding: 4rem 0;
  position: relative;
}
header::before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  background: rgba(0, 0, 0, .5);
}
header h1{
  font-size: 3.5rem;
  margin-bottom: 1rem;
}
nav {
  background-color:deepskyblue;
}
.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem;
  max-width: 1200px;
  margin: 0 auto;
}
.logo a {
  text-decoration: none;
  color: #ffffff;
  font-size: 1.5rem;
  font-weight: bold;
}
.menu {
  list-style-type: none;
  display: flex;
}
.menu li {
  margin: 0 1rem;
}
.menu li a {
  text-decoration: none;
  color: #ffffff;
  font-weight: bold;
  transition: color 0.3s ease;
}
.menu li a:hover {
  color: #ffcc00;
}
main {
  max-width: 1200px;
  margin: 2rem auto;
  padding: 1rem;
  background-color: white;
  box-shadow: 0 0 10px rgba(0, 0, 0, .3);
}
.destinasi {
  margin-bottom: 2rem;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: flex-start;
  text-align: center;
}
.destinasi h2{
  font-size: 24px;
  margin-bottom: 1rem;
  width: 100%;
}
.paket-wisata{
  margin-bottom: 2rem;
  text-align: center;
}
.paket-wisata h2{
  font-size: 24px;
  margin-bottom: 1rem;
}
.mx-auto {
    width: 800px
}
.card {
    margin-top: 10px;
}
    </style>
</head>

<body>
  
    <header>
        <h1>Vatika Yayasan</h1>
    </header>
    <nav>
        <div class="navbar">
            <div class="logo">
                <a href="index.php">Vatika Yayasan</a>
            </div>
            <ul class="menu">
                <li><a href="index.php">Beranda</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="donasi.php">Donasi</a></li>
                <li><a href="contact.php">CP</a></li>
            </ul>
        </div>
    </nav>
    <a href="logout.php">logout</a>
    <div class="mx-auto">
      
        <div class="container">
            <h1 class="my-4 text-center">Donasi</h1>
            <form action="" method="post">
               <ul>
                    <li>
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" id="nama" required>
                    </li>
                    <li>
                        <label for="telepon">Telepon</label>
                        <input type="text" name="telepon" id="telepon" required>
                    </li>
                    <li>
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" id="alamat" required>
                    </li>
                    <li>
                        <label for="kota">Kota</label>
                        <input type="text" name="kota" id="kota" required>
                    </li>
                    <li>
                        <label for="provinsi">Provinsi</label>
                        <input type="text" name="provinsi" id="provinsi" required>
                    </li>
                    <li>
                        <label for="pos">Kode Pos</label>
                        <input type="text" name="pos" id="pos" required>
                    </li>
                    <li>
                        <label for="jumlah">Jumlah</label>
                        <input type="text" name="jumlah" id="jumlah" required>
                    </li>
                    <li>
                        <label for="metode">Metode Pembayaran</label>
                        <select name="metode" id="metode" required>
                            <option value="">- Pilih Metode Pembayaran -</option>
                            <option value="transferbank">Transfer Bank</option>
                            <option value="kartukredit">Kartu Kredit/Debit</option>
                            <option value="paypal">PayPal</option>
                            <option value="dompetdigital">Dompet Digital</option>
                        </select>
                    </li>
                    <li>
                        <label for="informasi">Informasi</label>
                        <input type="text" name="informasi" id="informasi" required>
                    </li>
                    <li>
                        <label for="catatan">Catatan</label>
                        <input type="text" name="catatan" id="catatan" required>
                    </li>
                    <li>
                        <button type="submit" name="tambah">Tambah Data</button>
                    </li>
               </ul>
            </form>
        </div>

    
    </div>
</body>

</html>
