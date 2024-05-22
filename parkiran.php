<?php
require 'function.php';
if (isset($_POST["tambah"])) {
    if (tambah($_POST) > 0) {
        echo "<script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'parkiran.php';
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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #101820;
        }

        header.atas {
            box-shadow: 0 0 8px darkslategray;
            background: url(parkiran.jpg) center/cover no-repeat;
            padding: 12rem;
            position: relative;
            margin-left: 13rem;
            margin-right: 13rem;
            border-radius: 10px;
        }

        header.bawah {
            box-shadow: 0 0 8px darkslategray;
            background-color: #101820;
            padding: 1rem;
            position: relative;
            margin-left: 13rem;
            margin-right: 13rem;
            border-radius: 10px;
            margin-top: 20px;
            color: white;
            font-size: 20px;
        }

        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 3rem;
            max-width: 1200px;
            margin: 0 auto;

        }

        .navbar a {
            font-size: 25px;
        }

        .logo a {
            text-decoration: none;
            color: #ffffff;
            font-size: 35px;
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
            transition: color 0.3s ease;
        }

        .menu li a:hover {
            color: #ffcc00;
        }

        main {
            max-width: 1160px;
            border-radius: 10px;
            margin: 2rem auto;
            background-color: pink;
        }

        .paket-wisata {
            margin-bottom: 2rem;
            text-align: center;
        }

        .paket-wisata-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .paket-wisata-item {
            box-shadow: 0 0 8px darkslategray;
            flex: 1;
            width: calc(33.33% - 1rem);
            margin-bottom: 1rem;
            margin-right: 20px;
            margin-left: 20px;
            padding: 1rem;
            text-align: center;
            transition: transform 0.3s ease;
        }

        .paket-wisata-item:hover {
            transform: scale(1.1);
        }

        .paket-wisata-item img {
            max-width: 100%;
            height: auto;
            border-radius: 5px;
        }

        .paket-wisata-item h3 {
            font-size: 1.2rem;
            margin: 0.5rem 0;
        }

        .paket-wisata-item p {
            font-size: 0.8rem;
            margin: 0.5rem 0;
            text-align: justify;
        }

        .mx-auto {
            width: 1160px;
            box-shadow: 0 0 8px darkslategray;
            background-color: #101820;
            border-radius: 10px;
        }

        .card {
            margin-top: 10px;
        }

        h1 {
            width: 800px;
        }

        .form-label {
            margin-bottom: 0;
            padding-right: 5px;
        }
        .form-control {
            background-color: #28353a;
            color: white;
            border: none;
        }
        .custom-card {
            background-color: #101820;
            color: white;
        }
    </style>
</head>

<body>
    <nav>
        <div class="navbar">
            <div class="logo">
                <a href="beranda.php">Vatika Yayasan</a>
            </div>
            <ul class="menu">
                <li><a href="login.php">Login</a></li>
            </ul>
        </div>
    </nav>
    <header class="atas">
    </header>
    <header class="bawah">
        <p>Charity untuk Parkiran Yayasan adalah inisiatif sosial yang bertujuan menyediakan fasilitas parkir yang aman dan nyaman bagi yayasan-yayasan amal. Program ini menerima kontribusi dalam bentuk donasi finansial, sumbangan material, dan tenaga atau keahlian untuk pembangunan dan renovasi area parkir.</p>
        <p>Manfaat program ini meliputi:</p>
        <ul>
            <li>Peningkatan Aksesibilitas: Memudahkan akses bagi donatur, sukarelawan, dan peserta kegiatan yayasan.</li>
            <li>Keamanan Kendaraan: Mengurangi risiko pencurian dan kerusakan kendaraan.</li>
            <li>Dukungan Operasional Yayasan: Membantu yayasan fokus pada kegiatan inti tanpa khawatir tentang logistik parkir.</li>
        </ul>
        <p>Dengan kontribusi dari berbagai pihak, Charity untuk Parkiran Yayasan membantu yayasan menyelenggarakan lebih banyak acara dan menjangkau lebih banyak orang, meningkatkan dampak sosial yang diberikan kepada masyarakat.</p>
    </header>
    <div class="text-center" style="text-decoration: none;">


        <main>
        <div class="mx-auto">
    <div class="card custom-card">
        <div class="card-header text-start" style="padding: 15px">
            Input Data Donasi
        </div>
        <div class="card-body">
            <form action="" method="post">
                <div class="mb-3 row">
                    <label for="nama" class="col-sm-2 col-form-label text-start form-label">Nama Donatur</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="telepon" class="col-sm-2 col-form-label text-start form-label">No.Telepon</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="telepon" name="telepon" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamat" class="col-sm-2 col-form-label text-start form-label">Alamat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kota" class="col-sm-2 col-form-label text-start form-label">Kota</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="kota" name="kota" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="provinsi" class="col-sm-2 col-form-label text-start form-label">Provinsi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="provinsi" name="provinsi" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="pos" class="col-sm-2 col-form-label text-start form-label">Kode Pos</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="pos" name="pos" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="jumlah" class="col-sm-2 col-form-label text-start form-label">Jumlah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="jumlah" name="jumlah" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="metode" class="col-sm-2 col-form-label text-start form-label">Metode Pembayaran</label>
                    <div class="col-sm-10">
                        <select class="form-select form-control" id="metode" name="metode" required>
                            <option value="">- Pilih Metode Pembayaran -</option>
                            <option value="transferbank">Transfer Bank</option>
                            <option value="kartukredit">Kartu Kredit/Debit</option>
                            <option value="paypal">PayPal</option>
                            <option value="dompetdigital">Dompet Digital</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="tujuan" class="col-sm-2 col-form-label text-start form-label">Tujuan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="tujuan" name="tujuan" value="Parkiran" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="catatan" class="col-sm-2 col-form-label text-start form-label">Catatan</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="catatan" name="catatan" required>
                    </div>
                </div>
                <div class="col-12">
                    <input type="submit" name="tambah" value="Simpan Data" class="btn btn-primary">
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </main>
</body>

</html>