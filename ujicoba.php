<?php
session_start();
require 'function.php';

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

function getTotalNominal($tujuan)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT SUM(jumlah) AS total FROM donasi WHERE tujuan = '$tujuan'");
    if (!$result) {
        die("Query Error: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}

function getTotalUsers()
{
    global $conn;
    $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM user");
    if (!$result) {
        die("Query Error: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}

$asrama1Total = getTotalNominal('asrama1');
$asrama2Total = getTotalNominal('asrama2');
$asrama3Total = getTotalNominal('asrama3');
$dapurTotal = getTotalNominal('dapur');
$fasilitasTotal = getTotalNominal('fasilitas');
$lantaidasarTotal = getTotalNominal('lantai dasar');
$parkiranTotal = getTotalNominal('parkiran');
$perpustakaanTotal = getTotalNominal('perpustakaan');
$tamanTotal = getTotalNominal('taman');

$totalDonations = $asrama1Total + $asrama2Total + $asrama3Total + $dapurTotal + $fasilitasTotal + $lantaidasarTotal + $parkiranTotal + $perpustakaanTotal + $tamanTotal;
$totalUsers = getTotalUsers();

$asrama1 = query("SELECT * FROM donasi WHERE tujuan = 'asrama1'");
$asrama2 = query("SELECT * FROM donasi WHERE tujuan = 'asrama2'");
$asrama3 = query("SELECT * FROM donasi WHERE tujuan = 'asrama3'");
$dapur = query("SELECT * FROM donasi WHERE tujuan = 'dapur'");
$fasilitas = query("SELECT * FROM donasi WHERE tujuan = 'fasilitas'");
$lantaidasar = query("SELECT * FROM donasi WHERE tujuan = 'lantai dasar'");
$parkiran = query("SELECT * FROM donasi WHERE tujuan = 'parkiran'");
$perpustakaan = query("SELECT * FROM donasi WHERE tujuan = 'perpustakaan'");
$taman = query("SELECT * FROM donasi WHERE tujuan = 'taman'");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  background-color: #2e2e2e;
}
        /* Gaya untuk tautan 'a' pada navbar */
        .navbar .menu li a {
            font-size: 25px;
            text-decoration: none;
            color: #ffffff;
        }

        /* Gaya untuk logo pada navbar */
        .navbar .logo a {
            font-size: 35px;
            font-weight: bold;
        }

        /* Gaya untuk elemen 'li' dalam menu navbar */
        .navbar .menu li {
            margin: 0 1rem;
        }

        /* Efek hover pada tautan menu navbar */
        .navbar .menu li a:hover {
            color: #ffcc00;
        }

        /* Gaya untuk konten admin utama */
        .admin-main {
            margin: 2rem auto;
            background-color: #2e2e2e;
            padding: 2rem;
            border-radius: 10px;
            color: white;
        }

        /* Gaya untuk kepala tabel */
        .table thead {
            background-color: #333;
        }

        /* Efek hover pada baris tbody tabel */
        .table tbody tr:hover {
            background-color: #444;
        }

        /* Margin atas untuk kontainer grafik */
        .chart-container {
            margin-top: 2rem;
        }

        /* Margin atas untuk kontainer tabel admin */
        .admin-table-container {
            margin-top: 2rem;
        }

        /* Gaya untuk card */
        .card {
            margin-bottom: 1rem;
            border-radius: 10px;
            background-color: #2e2e2e;
            color: white;
            padding: 1rem;
        }

        .card h3 {
            margin-bottom: 0.5rem;
        }

        .card p {
            margin: 0;
            font-size: 1.2rem;
        }
    </style>
</head>

<body>
    <div class="admin-side-menu">
        <div class="brand-name">
            <h1>Vatika Yayasan</h1>
        </div>
        <ul>
            <li>Dashboard</li>
            <li id="user-menu">User</li>
            <li>Admin</li>
        </ul>
    </div>

    <div class="admin-container">
        <div class="header">
            <div class="nav">
                <div class="logo">
                    <a href="beranda.php">Vatika Yayasan</a>
                </div>
                <ul class="menu">
                    <li><a href="beranda.php">Home</a></li>
                </ul>
            </div>
        </div>

        <div class="content container">
            <div class="row">
                <div class="col-md-6">
                    <div class="card total-donations-card">
                        <h3>Total Donasi Masuk</h3>
                        <p>Rp <?= number_format($totalDonations, 0, ',', '.'); ?></p>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card total-users-card" onclick="document.getElementById('user-menu').scrollIntoView()">
                        <h3>Total User</h3>
                        <p><?= $totalUsers; ?></p>
                    </div>
                </div>
            </div>

            <div class="chart-container">
                <canvas id="donationChart"></canvas>
            </div>

            <div class="admin-table-container">
                <?php
                $tables = [
                    'asrama1' => $asrama1,
                    'asrama2' => $asrama2,
                    'asrama3' => $asrama3,
                    'dapur' => $dapur,
                    'fasilitas' => $fasilitas,
                    'lantai dasar' => $lantaidasar,
                    'parkiran' => $parkiran,
                    'perpustakaan' => $perpustakaan,
                    'taman' => $taman
                    ];
                    foreach ($tables as $title => $table) {
                        echo "<div class='table-responsive'>
                        <h2 class='text-center'>Donasi untuk $title</h2>
                        <table class='table table-dark table-striped'>
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                    <th>Kota</th>
                                    <th>Provinsi</th>
                                    <th>Kode Pos</th>
                                    <th>Jumlah</th>
                                    <th>Metode Pembayaran</th>
                                    <th>Tujuan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>";
        
                        foreach ($table as $row) {
                            echo "<tr>
                                <td>{$row['nama']}</td>
                                <td>{$row['telepon']}</td>
                                <td>{$row['alamat']}</td>
                                <td>{$row['kota']}</td>
                                <td>{$row['provinsi']}</td>
                                <td>{$row['pos']}</td>
                                <td>{$row['jumlah']}</td>
                                <td>{$row['metode']}</td>
                                <td>{$row['tujuan']}</td>
                                <td>
                                    <a href='update.php?id={$row['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                    <a href='hapus.php?id={$row['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Apakah anda yakin ingin menghapus data ini?')\">Hapus</a>
                                </td>
                            </tr>";
                        }
        
                        echo "</tbody>
                        </table>
                        </div>";
                    }
                    ?>
                </div>
            </div>
        </div>
        
        <script>
            var donasiData = {
                labels: ['Asrama1', 'Asrama2', 'Asrama3', 'Dapur', 'Fasilitas', 'Lantai Dasar', 'Parkiran', 'Perpustakaan', 'Taman'],
                datasets: [{
                    label: 'Total Nominal Donasi (Rupiah)',
                    data: [
                        <?= $asrama1Total; ?>, <?= $asrama2Total; ?>, <?= $asrama3Total; ?>, <?= $dapurTotal; ?>, <?= $fasilitasTotal; ?>,
                        <?= $lantaidasarTotal; ?>, <?= $parkiranTotal; ?>, <?= $perpustakaanTotal; ?>, <?= $tamanTotal; ?>
                    ],
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            };
        
            var chartOptions = {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString();
                            }
                        }
                    }
                }
            };
        
            var ctx = document.getElementById('donationChart').getContext('2d');
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: donasiData,
                options: chartOptions
            });
        </script>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>        
