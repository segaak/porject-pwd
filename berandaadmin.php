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
    <style>
        .container {
            max-width: 500px;
            display: flex;
            justify-content: center;
            margin: auto;
            align-self: center;
            margin-top: 200px;
        }
    </style>
</head>

<body>

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

    <div class="table">
        <center>
            <table class="table">
                <thead>
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
                <tbody>
                    
                    <tr>
                        <h2 style="justify-content: center;">donasi untuk asrama 1</h2>
                    <?php
                    foreach ($asrama1 as $donasi) {
                        echo "<tr>";
                        echo "<td>" . $donasi['nama'] . "</td>";
                        echo "<td>" . $donasi['telepon'] . "</td>";
                        echo "<td>" . $donasi['alamat'] . "</td>";
                        echo "<td>" . $donasi['kota'] . "</td>";
                        echo "<td>" . $donasi['provinsi'] . "</td>";
                        echo "<td>" . $donasi['pos'] . "</td>";
                        echo "<td>" . $donasi['jumlah'] . "</td>";
                        echo "<td>" . $donasi['metode'] . "</td>";
                        echo "<td>" . $donasi['tujuan'] . "</td>";
                        echo "</tr>";
                    }
                    ?>
                     <a href="">Update</a>
                <a href="">Delete</a>
            
                </tr>
                   
                </tbody>
            </table>
        </center>
    </div>
</body>

</html>