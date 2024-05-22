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
        <!-- untuk memasukkan data -->
        <div class="card">
            <div class="card-header">
                Donasi Masuk
            </div>
            <div class="card-body">
                <!-- <?php
                if ($error) {
                ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error ?>
                    </div>
                <?php
                    header("refresh:5;url=index.php");//5 : detik
                }
                ?> -->
                <!-- <?php
                if ($sukses) {
                ?>
                    <div class="alert alert-success" role="alert">
                        <?php echo $sukses ?>
                    </div>
                <?php
                    header("refresh:5;url=index.php");
                }
                ?> -->
                <!-- <form action="" method="POST">
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama Donatur</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="telepon" class="col-sm-2 col-form-label">Nomor Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="telepon" name="telepon" value="<?php echo $telepon ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $alamat ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="kota" class="col-sm-2 col-form-label">Kota</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kota" name="kota" value="<?php echo $kota ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="provinsi" class="col-sm-2 col-form-label">Provinsi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="provinsi" name="provinsi" value="<?php echo $provinsi ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="pos" class="col-sm-2 col-form-label">Kode POS</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="pos" name="pos" value="<?php echo $pos ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jumlah" class="col-sm-2 col-form-label">Jumlah</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jumlah" name="jumlah" value="<?php echo $jumlah ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="metode" class="col-sm-2 col-form-label">Metode Pembayaran</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="metode" id="metode">
                                <option value="">- Pilih Metode Pembayaran-</option>
                                <option value="transferbank" <?php if ($metode == "transferbank") echo "selected" ?>>Transfer Bank</option>
                                <option value="kartukredit" <?php if ($metode == "kartukredit") echo "selected" ?>>Kartu Kredit/Debit</option>
                                <option value="paypal" <?php if ($metode == "paypal") echo "selected" ?>>PayPal</option>
                                <option value="dompetdigital" <?php if ($metode == "dompetdigital") echo "selected" ?>>Dompet Digital</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="informasi" class="col-sm-2 col-form-label">Informasi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="informasi" name="informasi" value="<?php echo $informasi ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="catatan" class="col-sm-2 col-form-label">Catatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="catatan" name="catatan" value="<?php echo $catatan ?>">
                        </div>
                    </div>
                    <button type="submit" name="tambah" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div> -->
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

        <!-- untuk mengeluarkan data -->
        <!-- <div class="card">
            <div class="card-header text-white bg-secondary">
                Data Pemessanan
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nama</th>
                            <th scope="col">telepon</th>
                            <th scope="col">alamat</th>
                            <th scope="col">kota</th>
                            <th scope="col">provinsi</th>
                            <th scope="col">pos</th>
                            <th scope="col">jumlah</th>
                            <th scope="col">metode</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql2   = "select * from donasi order by id desc";
                        $q2     = mysqli_query($koneksi, $sql2);
                        $urut   = 1;
                        while ($r2 = mysqli_fetch_array($q2)) {
                            $id         = $r2['id'];
                            $nama       = $r2['nama'];
                            $telepon   = $r2['telepon'];
                            $alamat  = $r2['alamat'];
                            $kota      = $r2['kota'];
                            $provinsi      = $r2['provinsi'];
                            $pos       = $r2['pos'];
                            $jumlah       = $r2['jumlah'];
                            $metode = $r2['metode'];

                        ?>
                            <tr>
                                <th scope="row"><?php echo $urut++ ?></th>
                                <td scope="row"><?php echo $nama ?></td>
                                <td scope="row"><?php echo $telepon ?></td>
                                <td scope="row"><?php echo $alamat ?></td>
                                <td scope="row"><?php echo $kota ?></td>
                                <td scope="row"><?php echo $provinsi ?></td>
                                <td scope="row"><?php echo $pos ?></td>
                                <td scope="row"><?php echo $jumlah ?></td>
                                <td scope="row"><?php echo $metode ?></td>
                                <td scope="row">
                                    <a href="index.php?op=edit&id=<?php echo $id ?>"><button type="button" class="btn btn-warning">Edit</button></a>
                                    <a href="index.php?op=delete&id=<?php echo $id?>" onclick="return confirm('Yakin mau delete data?')"><button type="button" class="btn btn-danger">Delete</button></a>            
                                </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                    
                </table>
            </div>
        </div> -->
    </div>
</body>

</html>
