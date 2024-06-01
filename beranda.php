<?php
session_start();
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
    .slider{width: 100%}
    .slider input{display: none;}
    .testimonials{
      display: flex;
      align-items: center;
      justify-content: center;
      position: relative;
      min-height: 350px;
      perspective: 1000px;
      overflow: hidden;
    }
    .testimonials .item {
  width: 500px; /* Sesuaikan lebar kotak atau label */
  height: 350px; /* Sesuaikan tinggi kotak atau label */
  /* padding: 30px; */
  border-radius: 5px;
  background-color: #21262d;
  position: absolute;
  border: 3px solid white;
  top: 0;
  box-sizing: border-box;
  text-align: center;
  transition: transform 0.4s;
  box-shadow: 0 0 10px rgba(0,0,0,0.3);
  user-select: none;
  cursor: pointer;
  display: flex;
  justify-content: center;
  align-items: center;
}

.testimonials .item img {
  width: 100%;
  height: 100%; /* Gambar mengisi kotak atau label */
  object-fit: cover; /* Gambar akan memenuhi kotak atau label */
  border-radius: 5px; /* Bordes untuk gambar */
}
    .testimonials .item h1{font-size: 114px; color: white;}
    .dots{display: flex; justify-content: center;align-items: center;}
    .dots label{
      height: 5px;
      width: 5px;
      border-radius: 50%;
      cursor: pointer;
      background-color: #413B52;
      margin: 7px;
      transition-duration: 0.2s;
    }

    #t-1:checked ~ .dots label[for="t-1"],
    #t-2:checked ~ .dots label[for="t-2"],
    #t-3:checked ~ .dots label[for="t-3"],
    #t-4:checked ~ .dots label[for="t-4"],
    #t-5:checked ~ .dots label[for="t-5"],
    #t-6:checked ~ .dots label[for="t-6"],
    #t-7:checked ~ .dots label[for="t-7"],
    #t-8:checked ~ .dots label[for="t-8"],
    #t-9:checked ~ .dots label[for="t-9"] {
      transform: scale(2);
      background-color: #fff;
      box-shadow: 0px 0px 0px 3px #dddddd24;
    }

    #t-1:checked ~ .testimonials label[for="t-3"],
    #t-2:checked ~ .testimonials label[for="t-4"],
    #t-3:checked ~ .testimonials label[for="t-5"],
    #t-4:checked ~ .testimonials label[for="t-6"],
    #t-5:checked ~ .testimonials label[for="t-7"],
    #t-6:checked ~ .testimonials label[for="t-8"],
    #t-7:checked ~ .testimonials label[for="t-9"],
    #t-8:checked ~ .testimonials label[for="t-1"],
    #t-9:checked ~ .testimonials label[for="t-2"] {
      transform: translate3d(600px, 0, -180px) rotateY(-25deg);
      z-index: 2;
    }

    #t-1:checked ~ .testimonials label[for="t-2"],
    #t-2:checked ~ .testimonials label[for="t-3"],
    #t-3:checked ~ .testimonials label[for="t-4"],
    #t-4:checked ~ .testimonials label[for="t-5"],
    #t-5:checked ~ .testimonials label[for="t-6"],
    #t-6:checked ~ .testimonials label[for="t-7"],
    #t-7:checked ~ .testimonials label[for="t-8"],
    #t-8:checked ~ .testimonials label[for="t-9"],
    #t-9:checked ~ .testimonials label[for="t-1"] {
      transform: translate3d(300px, 0, -90px) rotateY(-15deg);
      z-index: 3;
    }

    #t-2:checked ~ .testimonials label[for="t-1"],
    #t-3:checked ~ .testimonials label[for="t-2"],
    #t-4:checked ~ .testimonials label[for="t-3"],
    #t-5:checked ~ .testimonials label[for="t-4"],
    #t-6:checked ~ .testimonials label[for="t-5"],
    #t-7:checked ~ .testimonials label[for="t-6"],
    #t-8:checked ~ .testimonials label[for="t-7"],
    #t-9:checked ~ .testimonials label[for="t-8"],
    #t-1:checked ~ .testimonials label[for="t-9"] {
      transform: translate3d(-300px, 0, -90px) rotateY(15deg);
      z-index: 3;
    }

    #t-3:checked ~ .testimonials label[for="t-1"],
    #t-4:checked ~ .testimonials label[for="t-2"],
    #t-5:checked ~ .testimonials label[for="t-3"],
    #t-6:checked ~ .testimonials label[for="t-4"],
    #t-7:checked ~ .testimonials label[for="t-5"],
    #t-8:checked ~ .testimonials label[for="t-6"],
    #t-9:checked ~ .testimonials label[for="t-7"],
    #t-2:checked ~ .testimonials label[for="t-9"],
    #t-1:checked ~ .testimonials label[for="t-8"] {
      transform: translate3d(-600px, 0, -180px) rotateY(25deg);
    }

    #t-1:checked ~ .testimonials label[for="t-1"],
    #t-2:checked ~ .testimonials label[for="t-2"],
    #t-3:checked ~ .testimonials label[for="t-3"],
    #t-4:checked ~ .testimonials label[for="t-4"],
    #t-5:checked ~ .testimonials label[for="t-5"],
    #t-6:checked ~ .testimonials label[for="t-6"],
    #t-7:checked ~ .testimonials label[for="t-7"],
    #t-8:checked ~ .testimonials label[for="t-8"],
    #t-9:checked ~ .testimonials label[for="t-9"] {
      z-index: 4;
    }

    /* header {
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
} */
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

    .paket-wisata-item h3 {
      font-size: 1.2rem;
      margin: 0.5rem 0;
      color: white;
    }

    .paket-wisata-item p {
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
        <?php
        if (isset($_SESSION['login']) && $_SESSION['login'] == true || isset($_SESSION['admin']) && $_SESSION['admin'] == true) :
        ?>
          <li><a href="logout.php">Logout</a></li>
        <?php else : ?>
          <li><a href="login.php">Login</a></li>
        <?php endif; ?>
      </ul>
    </div>
  </nav>

  <!-- <header class="rounded">
    </header> -->
    <div class="slider">
    <input type="radio" name="slider" id="t-1" checked>
    <input type="radio" name="slider" id="t-2">
    <input type="radio" name="slider" id="t-3">
    <input type="radio" name="slider" id="t-4">
    <input type="radio" name="slider" id="t-5">
    <input type="radio" name="slider" id="t-6">
    <input type="radio" name="slider" id="t-7">
    <input type="radio" name="slider" id="t-8">
    <input type="radio" name="slider" id="t-9">
    <div class="testimonials">
      <label for="t-1" class="item">
        <img src="dapur.jpg" alt="">
      </label>
      <label for="t-2" class="item">
        <img src="fasilitas.jpg" alt="">
      </label>
      <label for="t-3" class="item">
        <img src="parkiran.jpg" alt="">
      </label>
      <label for="t-4" class="item">
        <img src="perpustakaan.jpeg" alt="">
      </label>
      <label for="t-5" class="item">
        <h1>5</h1>
      </label>
      <label for="t-6" class="item">
        <h1>6</h1>
      </label>
      <label for="t-7" class="item">
        <h1>7</h1>
      </label>
      <label for="t-8" class="item">
        <h1>8</h1>
      </label>
      <label for="t-9" class="item">
        <h1>9</h1>
      </label>
    </div>
    <div class="dots">
      <label for="t-1"></label>
      <label for="t-2"></label>
      <label for="t-3"></label>
      <label for="t-4"></label>
      <label for="t-5"></label>
      <label for="t-6"></label>
      <label for="t-7"></label>
      <label for="t-8"></label>
      <label for="t-9"></label>
    </div>
  </div>

    
    <nav>
    <div class="navigasi">
      <ul class="pilih">
        <li><a href="beranda.php">Beranda</a></li>
        <li><a href="informasi.php">Informasi</a></li>
        <li><a href="donasi.php">Donasi</a></li>
        <li><a href="contact.php">CP</a></li>
        <?php
        if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) : ?>
          <li><a href="berandaadmin.php">Admin</a></li>
        <?php endif; ?>
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