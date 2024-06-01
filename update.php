<?php
require 'function.php';
$id = $_GET["id"];
$charity = query("SELECT * FROM donasi WHERE id = ?", [$id])[0];

if (isset($_POST["update"])) {
    if (update($_POST) > 0) {
        echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'ujicoba.php';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'ujicoba.php';
            </script>";
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Chart</title>
    <!-- Load Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <style>
        body {
    font-family: Arial, sans-serif;
     background-color: #101820;
    margin: 0;
    padding: 0;
    color: white;
    
}

.sidebar {
    width: 250px;
    height: 100vh;
    background-color: #333;
    position: fixed;
    left: 0;
    top: 0;
    padding: 20px;
    color: #fff;
    transition: width 0.5s;
}

.sidebar .adminlogo h2 {
    margin: 0;
    padding: 20px 0;
    text-align: center;
}

.sidebar-menu {
    margin-top: 20px;
}

.sidebar-menu ul {
    list-style: none;
    padding: 0;
    text-decoration: none;
    align-items: center;
}

.sidebar-menu ul li {
    padding: 10px;
    margin: 10px 0;
    background-color: #444;
    cursor: pointer;
    text-decoration: none;
    align-items: center;

}
.sidebar-menu ul li a{
    color: darkblue;
    text-decoration: none;
    align-items: center;
}

.sidebar-menu ul li:hover {
    background-color: #555;
}

.sidebar-menu ul li:hover {
    background-color: #555;
}

.main-content {
    margin-left: 250px;
    padding: 20px;
    transition: margin-left 0.5s;
}

.toggleMenu {
    width: 70px;
}

.toggleContent {
    margin-left: 70px;
}

header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #333;
    padding: 10px 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    color: white;
}

header .search-box {
    display: flex;
    align-items: center;
}

header .search-box input {
    padding: 5px;
    margin-left: 10px;
    border: 1px solid #ddd;
    border-radius: 5px;
}

.cards {
    display: flex;
    justify-content: space-between;
}

.single-card {
    background-color: #333;
    padding: 20px;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    width: 58%;
    display: flex;
    justify-content: space-between;
    align-items: center;
    
}

main {
            margin: 2rem auto;
            background-color: #2e2e2e;
            padding: 2rem;
            border-radius: 10px;
            color: white;
        }

        .table thead {
            background-color: #333;
        }

        .table tbody tr:hover {
            background-color: #444;
        }

        .chart-container {
            margin-top: 2rem;
        }

        .table-container {
            margin-top: 2rem;
        }


    </style>
</head>

<body>
    <div class="sidebar" id="sidebar">
        <div class="adminlogo">
            <h2>
                <img src="" alt="">Admin
            </h2>
        </div>
        <div class="sidebar-menu">
            <ul>
                <li><a href="#">Dashboard</a></li>
                <li><a href="#">Admin</a></li>
                <li><a href="#"> User </a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
    </div>

    <div class="main-content" id="main-content">
        <header class="flex">
            <h2><i class="uil uil-bars" id="menu-icon"></i>Dashboard</h2>
            <div class="search-box">
                <i class="uil uil-search"></i>
                <input type="text" placeholder="Search Here...">
            </div>
            <div class="admin-box flex">
                <div>
                    <h4>Admin</h4>
                    <small>Admin</small>
                </div>
            </div>
        </header>

  
    <div class="chart">
    <form method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($charity["id"]) ?>">
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" value="<?= htmlspecialchars($charity["nama"]) ?>">
    </div>
    <div class="form-group">
        <label for="telepon">Telepon</label>
        <input type="text" name="telepon" id="telepon" class="form-control" value="<?= htmlspecialchars($charity["telepon"]) ?>">
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat" class="form-control" value="<?= htmlspecialchars($charity["alamat"]) ?>">
    </div>
    <div class="form-group">
        <label for="kota">Kota</label>
        <input type="text" name="kota" id="kota" class="form-control" value="<?= htmlspecialchars($charity["kota"]) ?>">
    </div>
    <div class="form-group">
        <label for="provinsi">Provinsi</label>
        <input type="text" name="provinsi" id="provinsi" class="form-control" value="<?= htmlspecialchars($charity["provinsi"]) ?>">
    </div>
    <div class="form-group">
        <label for="pos">Pos</label>
        <input type="text" name="pos" id="pos" class="form-control" value="<?= htmlspecialchars($charity["pos"]) ?>">
    </div>
    <div class="form-group">
        <label for="jumlah">Jumlah</label>
        <input type="text" name="jumlah" id="jumlah" class="form-control" value="<?= htmlspecialchars($charity["jumlah"]) ?>">
    </div>
    <div class="form-group">
        <label for="metode">Metode</label>
        <select class="form-select form-control" id="metode" name="metode" required>
                            <option value="<?= htmlspecialchars($charity["metode"])?>"><?= htmlspecialchars($charity["metode"])?></option>
                            <option value="transferbank">Transfer Bank</option>
                            <option value="kartukredit">Kartu Kredit/Debit</option>
                            <option value="paypal">PayPal</option>
                            <option value="dompetdigital">Dompet Digital</option>
                        </select>
    </div>
    <div class="form-group">
    <label for="Tujuan" ></label>
                    
                    <select class="form-select form-control" id="tujuan" name="tujuan" required>
                        <option value="<?= htmlspecialchars($charity["tujuan"])?>"><?= htmlspecialchars($charity["tujuan"])?></option>
                        <option value="Asrama 1">Asrama 1</option>
                        <option value="Asrama 2">Asrama 2</option>
                        <option value="Asrama 3">Asrama 3</option>
                        <option value="Dapur">Dapur</option>
                        <option value="Fasilitas">Fasilitas</option>
                        <option value="Lantai Dasar">Lantai Dasar</option>
                        <option value="Parkiran">Parkiran</option>
                        <option value="Perpustakaan">Perpustakaan</option>
                        <option value="Taman">Taman</option>
                    </select>
    </div>
    <div class="form-group">
        <label for="catatan">Catatan</label>
        <input type="text" name="catatan" id="catatan" class="form-control" value="<?= htmlspecialchars($charity["catatan"]) ?>">
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update</button>
</form>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzpeTGUmowFa5dfjl6S1SkpVbrihW7ShuOWBI7b7wtp9" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-ho+pP7hCgK2LLVxK2Rv2A3Gp4aWYkPPgZZ4xmq4XW26L7fY0jqPId1V+GW6PcquM" crossorigin="anonymous"></script>
    
        
           
</div>
</body>

</html>

