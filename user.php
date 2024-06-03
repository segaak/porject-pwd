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
    text-decoration: none;
    list-style: none;
    
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
        
        .sidebar .sidebar-menu a {
    text-decoration: none; /* Remove underline from links */
    color: inherit; /* Inherit color from parent */
    display: block; /* Make the links fill the list item */
  
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
                <a href="beranda.php"><li>Beranda</li></a>
                <a href="berandaadmin.php"><li>Total Donasi</li></a>
                <a href="user.php"><li>Daftar Pengguna</li></a>
                <a href="logout.php"><li>Logout</li></a>
            </ul>
        </div>
    </div>

    <div class="main-content" id="main-content">
        <header class="flex">
            <h2><i class="uil uil-bars" id="menu-icon"></i>Daftar Pengguna</h2>
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
        <main class="container">
        <div class="table-container">
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>username</th>
                    <th>Password</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $users = query("SELECT * FROM user");
                $no = 1;
                foreach ($users as $user) {
                    echo "<tr>";
                    echo "<td>" . $no++ . "</td>";
                    echo "<td>" . $user['username'] . "</td>";
                    echo "<td>" . $user['password'] . "</td>";
                    echo "<td>
                    <a href='hapus.php?id={$user['id']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Apakah anda yakin ingin menghapus data ini?')\">Hapus</a>
                      </td>
                     </tr>";
                }

                ?>

            </tbody>
        </table>
        </div>
    </main>

        
</div>
</body>

</html>
