<?php
session_start();

if (isset($_POST["tambah"])) {
    session_start();
    require 'function.php';
    if (!isset($_SESSION["login"])) {
      header("Location: login.php");
      exit;
    } if (tambah($_POST) > 0) {
        echo "<script>
        alert('Data berhasil ditambahkan!');
        document.location.href = 'donasi.php';
        </script>";
      } else {
          echo "<script>
          alert('Data gagal ditambahkan!');
          </script>";
      }
  }
require 'function.php';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vatika Yayasan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="style.css">
   

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

    .navigasi {
      display: flex;
      justify-content: space-between;
      align-items: center;
      max-width: 1200px;
      margin-left: 200px;
      margin-top: 60px;
    }
/* General navigation styles */
.navigasi ul {
    list-style-type: none;
    margin: 0;
    padding: 0;
    display: flex;
}

.navigasi li {
    margin-right: 20px;
}

.navigasi a {
    text-decoration: none;
    color: white; /* Default color */
    padding: 10px;
    position: relative;
    transition: color 0.3s;
}

/* Style for active link */
.navigasi a.active::after {
    content: '';
    display: block;
    width: 100%;
    height: 2px;
    background: blue;
    position: absolute;
    left: 0;
    bottom: 0;
}

/* Hover effect */
.navigasi a:hover {
    color: blue;
}

.navigasi a:hover::after {
    content: '';
    display: block;
    width: 100%;
    height: 2px;
    background: blue;
    position: absolute;
    left: 0;
    bottom: 0;
}

        header.atas {
            box-shadow: 0 0 8px darkslategray;
            background: url(navbar.jpg) center/cover no-repeat;
            padding: 12rem;
            position: relative;
            margin-left: 13rem;
            margin-right: 13rem;
            border-radius: 10px;
        }

        header.bawah {
            box-shadow: 0 0 8px darkslategray;
            background-color: #101820;
            padding: 4rem;
            position: relative;
            margin-left: 13rem;
            margin-right: 13rem;
            border-radius: 10px;
            margin-top: 20px;
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
            /* background-color: pink; */
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

    
        .container {
            display: flex;
            flex-wrap: wrap;
            background-color: #252525;
            border-radius: 8px;
            overflow: hidden;
            margin-top: 50px;
            max-width: 1170px;
        }

        .sidebar {
            background-color: #2c2c2c;
            padding: 20px;
            display: flex;
            flex-direction: column;
            gap: 10px;
            flex: 1 1 30%;
        }

        .content {
            padding: 20px;
            flex: 1 1 70%;
        }

        .content h2 {
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input,
        .form-group select,
        .form-group textarea {
            width: 100%;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: none;
            background-color: #3a3a3a;
            color: #ffffff;
        }
        .form-group input:focus,
        .form-group select:focus,
        .form-group textarea:focus {
            
            background-color: #3a3a3a;
            color: #ffffff;
        }
        .form-group input:disabled,
        .form-group textarea:disabled {
            background-color: #4d4d4d;
        }

        .btn {
            background-color: #ffcc00;
            color: #101820;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #e6b800;
        }
        .container .sidebar h4{
            /* border-bottom: 1px solid white; */

        }
        .container .sidebar h3 {
              /* border-bottom: 1px solid white; */
        }
        .card {
            /* background-color: #2c2c2c; */
            background-color: #3a3a3a;
            border: none;
            color: white;
            border: 1px solid white;
            border-radius: 5px;
            padding: 1rem;
            margin-bottom: 1rem;
        }
        .pesan {
  box-shadow: 0 0 8px darkslategray;
  /* flex: 1; */
  /* width: 100px; */
  /* height: 500px; */
  margin-bottom: 1rem;
  margin-right: 20px;
  margin-left: 20px;
  padding: 1rem;
  /* text-align: center; */
  transition: transform 0.3s ease;
  border-bottom: 1px solid darkslategray;
}
.pesan h3{
  font-size: 1.2rem;
  margin: 0.5rem 0;
  color: white;
  border-bottom: 1px solid darkslategray;
}
.pesan p{
  font-size: 0.8rem;
  margin: 0.5rem 0;
  text-align: justify;
  color: white;
}

        @media (max-width: 768px) {
            .container {
                flex-direction: column;
            }

            .sidebar,
            .content {
                flex: 1 1 100%;
            }

            .navbar {
                flex-direction: column;
            }

            .menu {
                flex-direction: column;
                align-items: center;
            }

            .menu li {
                margin: 0.5rem 0;
            }
        }
    </style>
</head>

<body>
    <nav>
        <div class="navbar">
            <div class="logo">
            <img src="logo.png" alt="logo" width="50px" height="50px" style="margin-top: -15px;">
                <a href="index.php">Vatika Yayasan</a>
            </div>
            <ul class="menu">
                <li><a href="Beranda.php">Home</a></li>
            </ul>
        </div>
    </nav>
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
            <li><a href="beranda.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'beranda.php' ? 'active' : '' ?>">Beranda</a></li>
            <li><a href="informasi.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'informasi.php' ? 'active' : '' ?>">Informasi</a></li>
            <li><a href="donasi.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'donasi.php' ? 'active' : '' ?>">Donasi</a></li>
            <?php if (isset($_SESSION['admin']) && $_SESSION['admin'] == true) : ?>
                <li><a href="berandaadmin.php" class="nav-link <?= basename($_SERVER['PHP_SELF']) == 'berandaadmin.php' ? 'active' : '' ?>">Admin</a></li>
            <?php endif; ?>
        </ul>
    </div>
</nav>

<div class="container">
   
    
    <div class="content">
        <h2>donasikan sekarang</h2>
        <form action="" method="post">
        <div class="form-group">
                    <label for="nama" class="col-sm-2 col-form-label text-start form-label">Nama Donatur</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    
                </div>
                <div class="form-group">
                    <label for="telepon" class="col-sm-2 col-form-label text-start form-label">No.Telepon</label>
                        <input type="text" class="form-control" id="telepon" name="telepon" required>
                    
                </div>
                <div class="form-group">
                    <label for="alamat" class="col-sm-2 col-form-label text-start form-label">Alamat</label>
                    
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                   
                </div>
                <div class="form-group">
                    <label for="kota" class="col-sm-2 col-form-label text-start form-label">Kota</label>
                    
                        <input type="text" class="form-control" id="kota" name="kota" required>
                    
                </div>
                <div class="form-group">
                    <label for="provinsi" class="col-sm-2 col-form-label text-start form-label">Provinsi</label>
                    
                        <input type="text" class="form-control" id="provinsi" name="provinsi" required>
                    
                </div>
                <div class="form-group">
                    <label for="pos" class="col-sm-2 col-form-label text-start form-label">Kode Pos</label>
                    
                        <input type="text" class="form-control" id="pos" name="pos" required>
                
                </div>
                <div class="form-group">
                    <label for="jumlah" class="col-sm-2 col-form-label text-start form-label">Jumlah</label>
                    
                        <input type="text" class="form-control" id="jumlah" name="jumlah" required>
                    
                </div>
                <div class="form-group">
                    <label for="metode" class="col-sm-2 col-form-label text-start form-label">Metode Pembayaran</label>
                    
                        <select class="form-select form-control" id="metode" name="metode" required>
                            <option value="">- Pilih Metode Pembayaran -</option>
                            <option value="transferbank">Transfer Bank</option>
                            <option value="kartukredit">Kartu Kredit/Debit</option>
                            <option value="paypal">PayPal</option>
                            <option value="dompetdigital">Dompet Digital</option>
                        </select>
                </div>
                <div class="form-group">
                <label for="tujuan" class="col-sm-2 col-form-label text-start form-label">Tujuan</label>
                <select class="form-select form-control" id="tujuan" name="tujuan" required>
                        <option value="">- Pilih Tujuan Pembayaran -</option>
                        <option value="Asrama 1">Asrama1</option>
                        <option value="Asrama 2">Asrama2</option>
                        <option value="Asrama 3">Asrama3</option>
                        <option value="Dapur">Dapur</option>
                        <option value="Fasilitas">Fasilitas</option>
                        <option value="Lantai Dasar">Lantai Dasar</option>
                        <option value="Parkiran">Parkiran</option>
                        <option value="Perpustakaan">Perpustakaan</option>
                        <option value="Taman">Taman</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="catatan" class="col-sm-2 col-form-label text-start form-label">Catatan</label>
                    
                        <input type="text" class="form-control" id="catatan" name="catatan" required>
                    
                </div>
                    <input type="submit" name="tambah" value="Simpan Data" class="btn btn-primary">
                
        </form>
    </div>
</div>

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
    </footer>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>