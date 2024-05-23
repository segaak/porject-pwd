<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vatika Yayasan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body {
  font-family: Arial, sans-serif;
  background-color: #101820;
}
header {
  box-shadow: 0 0 10px rgba(0, 0, 0, .5);
  background: url(navbar.jpg) center/cover no-repeat; 
  padding: 12rem;
  position: relative;
  margin-left: 13rem;
  margin-right: 13rem;
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

.navigasi {
  display: flex;
  justify-content: space-between;
  align-items: center;
  max-width: 1200px;
  margin-left: 200px;
  margin-top: 60px;
}
.pilih {
  list-style-type: none;
  display: flex;
}
.pilih li {
  margin: 0 1rem;
}
.pilih li a {
  text-decoration: none;
  color: #ffffff;
  transition: color 0.3s ease;
}
.pilih li a:hover {
  color: #ffcc00;
}

main {
      max-width: 1200px;
      margin: 2rem auto;
} 
.paket-wisata{
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
  width: 100px;
  height: 500px;
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
  width: 330px;
  height: 200px;
  border-radius: 5px;
}
.paket-wisata-item h3{
  font-size: 1.2rem;
  margin: 0.5rem 0;
  color: white;
}
.paket-wisata-item p{
  font-size: 0.8rem;
  margin: 0.5rem 0;
  text-align: justify;
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
              <?php session_start();
                if(isset($_SESSION['login']) && $_SESSION['login'] == true): ?>
                <li><a href="logout.php">Logout</a></li>
              <?php else: ?>
                <li><a href="login.php">Login</a></li>
              <?php endif; ?>
            </ul>
        </div>
    </nav>
    <header class="rounded">
    </header>
    <nav>
        <div class="navigasi">
            <ul class="pilih">
                <li><a href="beranda.php">Beranda</a></li>
                <li><a href="informasi.php">Informasi</a></li>
                <li><a href="donasi.php">Donasi</a></li>
                <li><a href="contact.php">CP</a></li>
            </ul>
        </div>
    </nav>
    <main>
      <selection class="paket-wisata">
            <div class="paket-wisata-container">
                <div class="paket-wisata-item">
                    <img src="parkiran.jpg" alt="Paket Wisata 2">
                    <h3>Parkiran</h3>
                    <p>Charity untuk Parkiran Yayasan adalah inisiatif yang menyediakan fasilitas parkir aman dan nyaman bagi yayasan amal. Dengan menerima donasi dan sumbangan material, program ini meningkatkan aksesibilitas, keamanan kendaraan, dan mendukung operasional yayasan, sehingga memperluas dampak sosialnya.</p>
                    <a href="parkiran.php" class="btn btn-primary">Donasi Sekarang</a>
                </div>
                <div class="paket-wisata-item">
                    <img src="navbar.jpg" alt="Paket Wisata 4">
                    <h3>Taman</h3>
                    <p>Charity untuk Taman Yayasan adalah inisiatif yang menciptakan dan merawat taman di yayasan amal. Program ini menerima donasi uang, tanaman, dan material taman, serta sukarelawan untuk membantu penanaman dan pemeliharaan, menyediakan ruang hijau sehat dan tempat rekreasi bagi komunitas yayasan.</p>
                    <a href="taman.php" class="btn btn-primary">Donasi Sekarang</a>
                </div>
                <div class="paket-wisata-item">
                    <img src="dapur.jpg" alt="Paket Wisata 5">
                    <h3>Dapur</h3>
                    <p>Charity untuk Dapur Yayasan mendukung pembangunan dan perawatan dapur di yayasan amal melalui donasi uang, peralatan dapur, bahan makanan, dan bantuan sukarelawan. Tujuannya adalah menyediakan makanan sehat bagi penerima manfaat, meningkatkan kesejahteraan mereka, dan mendukung operasional yayasan dalam melayani komunitas.</p>
                    <a href="dapur.php" class="btn btn-primary">Donasi Sekarang</a>
                </div>
                </div>
            </selection>
            <selection class="paket-wisata">
              <div class="paket-wisata-container">
                <div class="paket-wisata-item">
                    <img src="perpustakaan.jpeg" alt="Paket Wisata 5">
                    <h3>Perpustakaan</h3>
                    <p>Charity untuk Perpustakaan Yayasan mendukung akses literasi dan pengetahuan dengan menerima donasi uang, buku, peralatan perpustakaan, dan bantuan sukarelawan. Tujuannya adalah meningkatkan literasi, pendidikan, dan pengetahuan anggota komunitas yang dilayani oleh yayasan, serta memberikan sumber daya yang diperlukan untuk pertumbuhan intelektual dan pribadi mereka.</p>
                    <a href="perpustakaan.php" class="btn btn-primary">Donasi Sekarang</a>
                </div>
                <div class="paket-wisata-item">
                    <img src="fasilitas.jpg" alt="Paket Wisata 5">
                    <h3>Fasilitas</h3>
                    <p>Charity untuk Fasilitas Yayasan adalah inisiatif untuk meningkatkan infrastruktur dan fasilitas yayasan amal melalui donasi uang, peralatan, dan bantuan sukarelawan. Tujuannya adalah memperbaiki layanan, meningkatkan keselamatan, memudahkan akses, mengembangkan kapasitas yayasan, dan mendorong keterlibatan komunitas dalam pembangunan dan pemeliharaan fasilitas.</p>
                    <a href="fasilitas.php" class="btn btn-primary">Donasi Sekarang</a>
                </div>
                <div class="paket-wisata-item">
                    <img src="gudang.jpg" alt="Paket Wisata 5">
                    <h3>Lantai Dasar</h3>
                    <p>Charity untuk lantai dasar yayasan bertujuan memperkuat fondasi fisik dan operasional lembaga, meningkatkan fasilitas, dan menyediakan aksesibilitas yang lebih baik. Dukungan ini menciptakan lingkungan yang nyaman, meningkatkan kepercayaan donatur, dan memfasilitasi kegiatan sosial serta edukatif. Dengan memastikan keberlanjutan yayasan dan mendorong partisipasi masyarakat, inisiatif ini menjadi investasi jangka panjang bagi kesejahteraan komunitas.</p>
                    <a href="lantaidasar.php" class="btn btn-primary">Donasi Sekarang</a>
                </div>
                </div>
            </selection>
            <selection class="paket-wisata">
              <div class="paket-wisata-container">
                <div class="paket-wisata-item">
                    <img src="gudang.jpg" alt="Paket Wisata 5">
                    <h3>Asrama 1</h3>
                    <p>Charity untuk asrama yayasan menyediakan tempat tinggal aman dan nyaman bagi yang membutuhkan, dengan donasi uang, peralatan, dan bantuan sukarelawan. Tujuannya adalah memperluas kapasitas asrama, meningkatkan kualitas hidup penghuni, dan memberikan lingkungan yang mendukung pertumbuhan pribadi. Ini memberikan harapan dan kesempatan untuk memulai kembali dengan lebih baik.</p>
                    <a href="asrama1.php" class="btn btn-primary">Donasi Sekarang</a>
                </div>
                <div class="paket-wisata-item">
                    <img src="gudang.jpg" alt="Paket Wisata 5">
                    <h3>Asrama 2</h3>
                    <p>Charity untuk asrama yayasan menyediakan tempat tinggal aman dan nyaman bagi yang membutuhkan, dengan donasi uang, peralatan, dan bantuan sukarelawan. Tujuannya adalah memperluas kapasitas asrama, meningkatkan kualitas hidup penghuni, dan memberikan lingkungan yang mendukung pertumbuhan pribadi. Ini memberikan harapan dan kesempatan untuk memulai kembali dengan lebih baik.</p>
                    <a href="asrama2.php" class="btn btn-primary">Donasi Sekarang</a>
                </div>
                <div class="paket-wisata-item">
                    <img src="gudang.jpg" alt="Paket Wisata 5">
                    <h3>Asrama 3</h3>
                    <p>Charity untuk asrama yayasan menyediakan tempat tinggal aman dan nyaman bagi yang membutuhkan, dengan donasi uang, peralatan, dan bantuan sukarelawan. Tujuannya adalah memperluas kapasitas asrama, meningkatkan kualitas hidup penghuni, dan memberikan lingkungan yang mendukung pertumbuhan pribadi. Ini memberikan harapan dan kesempatan untuk memulai kembali dengan lebih baik.</p>
                    <a href="asrama3.php" class="btn btn-primary">Donasi Sekarang</a>
                </div>
            </div>
        </selection>
        </main>
</body>
</html>