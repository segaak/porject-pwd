<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vatika Yayasan</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="style.css">
  <style>
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body {
  font-family: Arial, sans-serif;
  background: url(tampilan.jpg) top no-repeat;
  background-color: #101820;
  background-size: 100%;
 
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
.judul h1 {
  color: white;
  font-size: 50px;
  margin-top: 10rem;
  margin-right: 20px;
  margin-left: 20px;
  text-align: center;
}
.judul p {
  color: white;
  font-size: 25px;
  margin-top: 10px;
  margin-right: 20px;
  margin-left: 20px;
  text-align: center;
}
.login {
  position: absolute;
  top: 5%;
  left: 86%;
  padding: 10px 20px;
  background-color: #212121;
  color: white;
  border: none; 
  text-decoration: none;
  border-radius: 10px;
}
.button {
  margin-top: 10px;
  position: relative;
  text-align: center;
}
.btn-primary {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  left: 43%;
  transform: translateX(-50%);
  padding: 10px 20px;
  background-color: #191919;
  color: white;
  border: none; 
  text-decoration: none;
  border-radius: 5px;
}
.btn-secondary {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  left: 57%;
  transform: translateX(-50%);
  padding: 10px 20px;
  background-color: #212121;
  color: white;
  border: none; 
  text-decoration: none;
  border-radius: 5px;
}
.desc1 {
  color: white;
  font-size: 35px;
  margin-top: 24rem;
  margin-right: 20px;
  margin-left: 20px;
  text-align: center;
}
.header1 {
  background-color: #2B7BFF;
  padding: 2rem;
  position: relative;
  margin-left: 23rem;
  margin-right: 13rem;
  border-radius: 15px;
  margin-top: 2rem;
  width: 850px;
  height: 160px;
}
.header1 h1 {
  color: white;
  font-size: 32px;
  text-align: justify;
}
.header1 p {
  color: white;
  font-size: 18px;
  text-align: justify;
}
.header1 img{
width: 200px;
height: 160px;
margin-top: -131px;
margin-left: 580px;
}
.header2 {
  background-color: #fe5dd7;
  padding: 1.2rem;
  position: relative;
  margin-left: 23rem;
  margin-right: 13rem;
  border-radius: 15px;
  margin-top: 1rem;
  width: 850px;
  height: 160px;
}
.header2 h1 {
  color: white;
  font-size: 32px;
  text-align: justify;
  margin-left: 500px;
}
.header2 p {
  color: white;
  font-size: 18px;
  text-align: justify;
  margin-left: 500px;
}
.header2 img{
width: 214px;
height: 171px;
margin-top: -120px;
margin-left: 10px;
}
.penutup h1 {
  color: white;
  font-size: 33px;
  margin-top: 2rem;
  margin-right: 20px;
  margin-left: 20px;
  text-align: center;
}
.penutup p {
  color: white;
  font-size: 15px;
  margin-top: 5px;
  margin-right: 20px;
  margin-left: 20px;
  text-align: center;
}
.daftar {
  margin-top: 10px;
  position: relative;
  text-align: center;
}
.btn-tersier {
  position: absolute;
  top: 50%;
  transform: translateY(-50%);
  left: 50%;
  transform: translateX(-50%);
  padding: 10px 20px;
  background-color: #2B7BFF;
  color: white;
  border: none; 
  text-decoration: none;
  border-radius: 5px;
}
.batas {
  background-color: #101820;
  padding: 2rem;
  position: relative;
  margin-left: 15.6rem;
  margin-right: 13rem;
  border-radius: 15px;
  margin-top: 5rem;
  width: 850px;
  height: 160px;
}
  </style>
</head>
<body>
  <nav>
    <div class="navbar">
      <div class="logo">
      <img src="logo.png" alt="logo" width="50px" height="50px">
        <a>Vatika Yayasan</a>
      </div>
      <div class="login">
      <a href="login.php" class="btn btn-secondary disabled" tabindex="-1" role="button" aria-disabled="true">Login</a>
      </div>
    </div>
  </nav>
  <div class="judul">
    <h1>Tangan Yang Memberi, Hati Yang Terpenuhi</h1>
    <p>Punya penghasilan lebih dan bingung ingin dikemanakan?</p>
    <p>Langsung aja donasi ke Vatika Yayasan sekarang!</p>
  </div>
  <div class="button">
    <a href="beranda.php" class="btn btn-primary disabled" tabindex="-1" role="button" aria-disabled="true">Donasikan Uangmu Sekarang!</a>
    <a href="registrasi.php" class="btn btn-secondary disabled" tabindex="-1" role="button" aria-disabled="true">Buat Akun</a>
  </div>
  <div class="desc1">
    <p>Lu punya Duit, lu bisa sedekah. Yuk kita cari pahala</p>
    <p>dengan uangmu dan bantu anak-anak yayasan disana</P>
  </div>
  <header class="header1">
    <h1>APA ITU VATIKA YAYASAN?</h1>
    <p>Vatika Yayasan adalah platform penghubung antara donatur</p>
    <p>dan yayasan yang memungkinkan donatur untuk melakukan</p>
    <p>donasi agar menjadi lebih efektif dan efisien.</p>
    <img src="tako3.png">
  </header>
  <header class="header2">
    <h1>CARA KERJANYA</h1>
    <p>1. Daftarkan dan verifikasi akunmu</p>
    <p>2. Pilih tujuan donasimu</p>
    <p>3. Isi seluruh data</p>
    <p>4. Submit data yang kamu isi</p>
    <img src="tako2.png">
  </header>
  <div class="penutup">
    <h1>SIAPA YANG CITA-CITANYA MENJADI ORANG BAIK?</h1>
    <p>Yuk daftar dan berdonasi untuk anak-anak yayasan</p>
  </div>
  <div class="daftar">
    <a href="registrasi.php" class="btn btn-tersier disabled" tabindex="-1" role="button" aria-disabled="true">Buat Akun</a>
  </div>
  <header class="batas">
  </header>

  <footer>
    <div class="footercontainer">

      <div class="footernav">
        <ul>
          <li><a href="informasi.php">Informasi</a></li>
          <?php
                if(isset($_SESSION['login']) && $_SESSION['login'] == true || isset($_SESSION['admin']) && $_SESSION['admin'] == true ) : 
                ?>
                <li><a href="logout.php">Logout</a></li>
              <?php else: ?>
                <li><a href="login.php">Login</a></li>
              <?php endif; ?>
          <li><a href="beranda.php">Beranda</a></li>
        </ul>
      </div>  
      <div class="ikonsosmed">
        <a href=""><i class="fa-brands fa-facebook"></i></a>
        <a href=""><i class="fa-brands fa-twitter"></i></a>
        <a href=""><i class="fa-brands fa-instagram"></i></a>
        <a href=""><i class="fa-brands fa-tiktok"></i></a>
      </div>
    </div>
    <div class="footerbottom">
      <p>Copyright &copy;2024; Designed by <span class="designer">Vatika Yayasan</span></p>
    </div>
    <div style="margin-top: -245px;">
    <img src="tako0.png" width="300px" height="270px" style="margin-left: 200px;">
    </div><div style="margin-top: -275px;">
    <img src="tako1.png" width="300px" height="270px" style="margin-left: 1100px;">
    </div>
    <div style="margin-top: -245px;">
    <img src="tako0.png" width="300px" height="270px" style="margin-left: 200px;">
    </div><div style="margin-top: -275px;">
    <img src="tako1.png" width="300px" height="270px" style="margin-left: 1100px;">
    </div>
    </footer>
</body>
</html>