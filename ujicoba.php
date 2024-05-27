<?php
session_start();

require 'function.php';

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

// Fungsi untuk mengambil total nominal donasi untuk setiap tujuan
function getTotalNominal($tujuan)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT SUM(jumlah) AS total FROM donasi WHERE tujuan = '$tujuan'");
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dynamic Chart</title>
    <!-- Load Chart.js library -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            color: white;
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

        .container {
            max-width: 1000px;
            display: flex;
            justify-content: center;
            margin: auto;
            align-self: center;
            margin-top: 20px;
            color: white;
        }

        .tablee {
            justify-content: center;
            align-items: center;
            margin-top: 10px;
            max-width: 1000px;
            margin: auto;
        }

        .table {
            margin-top: 10px;
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
                <li><a href="beranda.php">Home</a></li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <canvas id="donationChart"></canvas>

        <script>
            // Data donasi dari PHP
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

            // Options for the chart
            var chartOptions = {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true,
                            callback: function(value, index, values) {
                                return 'Rp ' + value.toLocaleString();
                            }
                        }
                    }]
                }
            };

            // Get the canvas element
            var ctx = document.getElementById('donationChart').getContext('2d');

            // Create the chart
            var myChart = new Chart(ctx, {
                type: 'bar',
                data: donasiData,
                options: chartOptions
            });
        </script>
    </div>

    <div class="tablee">
        <center>
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
                echo "<table class='table'>
                <thead>
                    <h2 style='justify-content: center;'>donasi untuk $title</h2>
                    <tr>
                        <th>nama</th>
                        <th>telepon</th>
                        <th>alamat</th>
                        <th>Kota</th>
                        <th>Provinsi</th>
                        <th>Kode Pos</th>
                        <th>Jumlah</th>
                        <th>Metode Pembayaran</th>
                        <th>Tujuan</th>
                        <th>aksi</th>
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
                            <a href='update.php?id={$row['id']}'>Edit</a> |
                            <a href='hapus.php?id={$row['id']}' onclick=\"return confirm('Apakah anda yakin ingin menghapus data ini?')\">Hapus</a>
                        </td>
                    </tr>";
                }

                echo "</tbody>
            </table>";
            }
            ?>
        </center>
    </div>

</body>

</html>
