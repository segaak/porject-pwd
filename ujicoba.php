<?php
session_start();

require 'function.php';

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

// Fungsi untuk mengambil total nominal donasi untuk setiap tujuan
function getTotalNominal($tujuan) {
    global $conn;
    $result = mysqli_query($conn, "SELECT SUM(jumlah) AS total FROM donasi WHERE tujuan = '$tujuan'");
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}

// Fungsi untuk mengambil total user dari database
function getTotalUser()
{
    global $conn;
    $result = mysqli_query($conn, "SELECT COUNT(*) AS total FROM user");
    if (!$result) {
        die("Query Error: " . mysqli_error($conn));
    }
    $row = mysqli_fetch_assoc($result);
    return $row['total'];
}

// Mendapatkan total nominal donasi untuk setiap tujuan
$asrama1Total = getTotalNominal('asrama1');
$asrama2Total = getTotalNominal('asrama2');
$asrama3Total = getTotalNominal('asrama3');
$dapurTotal = getTotalNominal('dapur');
$fasilitasTotal = getTotalNominal('fasilitas');
$lantaidasarTotal = getTotalNominal('lantai dasar');
$parkiranTotal = getTotalNominal('parkiran');
$perpustakaanTotal = getTotalNominal('perpustakaan');
$tamanTotal = getTotalNominal('taman');

// Mendapatkan total donasi
$totalDonasi = $asrama1Total + $asrama2Total + $asrama3Total + $dapurTotal + $fasilitasTotal + $lantaidasarTotal + $parkiranTotal + $perpustakaanTotal + $tamanTotal;

// Mendapatkan total user
$totalUser = getTotalUser();

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
    color: white;
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
        <script>
            // Sidebar Toggle
            // let sideBar = document.getElementById('sidebar');
            // let menuIcon = document.getElementById('menu-icon');
            // let mainContent = document.getElementById('main-content');
            
            // menuIcon.onclick = () => {
            //     sideBar.classList.toggle('toggleMenu');
            //     mainContent.classList.toggle('toggleContent');
            // };
            
            // Data donasi dari PHP
            var donasiData = {
                labels: ['Asrama1', 'Asrama2', 'Asrama3', 'Dapur', 'Fasilitas', 'Lantai Dasar', 'Parkiran', 'Perpustakaan', 'Taman'],
            datasets: [{
                label: 'Total Nominal Donasi (Rupiah)',
                data: [
                    <?php echo $asrama1Total; ?>,
                    <?php echo $asrama2Total; ?>,
                    <?php echo $asrama3Total; ?>,
                    <?php echo $dapurTotal; ?>,
                    <?php echo $fasilitasTotal; ?>,
                    <?php echo $lantaidasarTotal; ?>,
                    <?php echo $parkiranTotal; ?>,
                    <?php echo $perpustakaanTotal; ?>,
                    <?php echo $tamanTotal; ?>
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(99, 255, 132, 0.2)',
                    'rgba(162, 54, 235, 0.2)',
                    'rgba(206, 86, 255, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(99, 255, 132, 1)',
                    'rgba(162, 54, 235, 1)',
                    'rgba(206, 86, 255, 1)'
                ],
                borderWidth: 1
            }]
        };

        // Inisialisasi Chart
        var ctx = document.getElementById('donationChart').getContext('2d');
        var donationChart = new Chart(ctx, {
            type: 'bar',
            data: donasiData,
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        
        function showDashboard() {
            // Implementasi untuk menampilkan konten dashboard
        }
        
        function showAdmin() {
            // Implementasi untuk menampilkan konten admin
        }

        function showUser() {
            // Implementasi untuk menampilkan konten user
        }
        </script> -->
        
        <main class="container">
        <div class="cards">
                <div class="single-card">
                    <div><span>TOTAL DONASI</span><h2>Rp<?php echo number_format($totalDonasi, 0, ',', '.'); ?></h2></div>
                    <i class="uil uil-calender"></i>
                </div>
                <div class="single-card">
                    <div><span>TOTAL USER</span><h2><?php echo $totalUser; ?></h2></div>
                    <i class="uil uil-users-alt"></i>
                </div>
            </div>
        <div class="chart-container">
            <canvas id="donationChart"></canvas>
        </div>

        <div class="table-container">
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
    </main>

    <script>
        var donasiData = {
            labels: ['Asrama1', 'Asrama2', 'Asrama3', 'Dapur', 'Fasilitas', 'Lantai Dasar', 'Parkiran', 'Perpustakaan', 'Taman'],
            datasets: [{
                label: 'Total Nominal Donasi (Rupiah)',
                data: [
                    <?php
                    echo $asrama1Total . ", ";
                    echo $asrama2Total . ", ";
                    echo $asrama3Total . ", ";
                    echo $dapurTotal . ", ";
                    echo $fasilitasTotal . ", ";
                    echo $lantaidasarTotal . ", ";
                    echo $parkiranTotal . ", ";
                    echo $perpustakaanTotal . ", ";
                    echo $tamanTotal;
                    ?>
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

</div>
</body>

</html>
