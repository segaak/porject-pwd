<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vatika Yayasan</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        *{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}
body {
  font-family: Arial, sans-serif;
  background-color: #f4f4f4;
}
header {
  background: url(border.jpeg) center/cover no-repeat; 
  color: white;
  text-align: center;
  padding: 4rem 0;
  position: relative;
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
header h1{
  font-size: 3.5rem;
  margin-bottom: 1rem;
}
nav {
  background-color:deepskyblue;
}
.navbar {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem;
  max-width: 1200px;
  margin: 0 auto;
}
.logo a {
  text-decoration: none;
  color: #ffffff;
  font-size: 1.5rem;
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
  font-weight: bold;
  transition: color 0.3s ease;
}
.menu li a:hover {
  color: #ffcc00;
}
main {
  max-width: 1200px;
  margin: 2rem auto;
  padding: 1rem;
  background-color: white;
  box-shadow: 0 0 10px rgba(0, 0, 0, .3);
}
.destinasi {
  margin-bottom: 2rem;
  display: flex;
  flex-wrap: wrap;
  justify-content: center;
  align-items: flex-start;
  text-align: center;
}
.destinasi h2{
  font-size: 24px;
  margin-bottom: 1rem;
  width: 100%;
}
.destinasi-item {
  background-color: white;
  box-shadow: 0 0 10px rgba(0, 0, 0, .5);
  margin: 0.5rem;
  max-width: 300px;
  margin-right: 5px;
  margin-left: 5px;
  padding: 1rem;
  border-radius: 5px;
  flex: 1;
  text-align: center;
}
.destinasi-item:hover {
  transform: scale(1.1);
}
.destinasi-item img {
  max-width: 100%;
  height: auto;
  border-radius: 5px;
}
.destinasi-item h3 {
  font-size: 1.5rem;
  margin: 0.5rem 0;
}
.paket-wisata{
  margin-bottom: 2rem;
  text-align: center;
}
.paket-wisata h2{
  font-size: 24px;
  margin-bottom: 1rem;
}
.paket-wisata-container {
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
}
.paket-wisata-item {
  background-color: white;
  box-shadow: 0 0 10px rgba(0, 0, 0, .5);
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
.paket-wisata-item h3{
  font-size: 1.2rem;
  margin: 0.5rem 0;
}
.paket-wisata-item p{
  font-size: 0.8rem;
  margin: 0.5rem 0;
}

.pesan{
  margin-bottom: 2rem;
  text-align: center;
}

.card-body {

  background-color: white;
  box-shadow: 0 0 10px rgba(0, 0, 0, .5);
  flex: 1;
  width: 96.5%;
  margin-bottom: 1rem;
  margin-right: 20px;
  margin-left: 20px;
  padding: 1rem;
  text-align: center;
  transition: transform 0.3s ease;
}
    </style>
</head>
<body>
    <header>
        <h1>Vatika Yayasan</h1>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Aperiam iste assumenda quam, animi nostrum earum necessitatibus pariatur dicta ut saepe nulla eveniet, totam hic quas ea? Consectetur reprehenderit sint amet!</p>
        <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. A, quasi.</p>
    </header>
    <nav>
        <div class="navbar">
            <div class="logo">
                <a href="index.php">Vatika Yayasan</a>
            </div>
            <ul class="menu">
                <li><a href="index.php">Beranda</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="donasi.php">Donasi</a></li>
                <li><a href="contact.php">CP</a></li>
            </ul>
        </div>
    </nav>
    <main>
        <selection class="destinasi">
        <h2>Destinasi Wisata</h2>
            <div class="destinasi-item">
                <img src="sleman.jpeg" alt="Destinasi 1">
                <h3>Sleman</h3>
            </div>
            <div class="destinasi-item">
                <img src="jogja.jpeg" alt="Destinasi 1">
                <h3>Yogyakarta</h3>
            </div>
            <div class="destinasi-item">
                <img src="kulonprogo.jpeg" alt="Destinasi 1">
                <h3>Kulon Progo</h3>
            </div>
            <div class="destinasi-item">
                <img src="bantul.jpeg" alt="Destinasi 1">
                <h3>Bantul</h3>
            </div>
            <div class="destinasi-item">
                <img src="gunungkidul.jpeg" alt="Destinasi 1">
                <h3>Gunung Kidul</h3>
            </div>
        </selection>
        <selection class="paket-wisata">
            <h2>Paket Wisata</h2>
            <div class="paket-wisata-container">
                <div class="paket-wisata-item">
                    <img src="1.jpeg" alt="Paket Wisata 1">
                    <h3>Self Discovery Escape</h3>
                    <p>1 Person</p>
                    <p>1 Day</p>
                    <p>Include Consumption</p>
                    <p>All Destination Same Price</p>
                    <p>With Professional Tour Guide</p>
                    <p>Rp.275.000</p>
                </div>
                <div class="paket-wisata-item">
                    <img src="2.jpeg" alt="Paket Wisata 2">
                    <h3>Couple's Paradise</h3>
                    <p>2 People</p>
                    <p>1 Day</p>
                    <p>Include Consumption</p>
                    <p>All Destination Same Price</p>
                    <p>With Professional Tour Guide</p>
                    <p>Rp.520.000</p>
                </div>
                <div class="paket-wisata-item">
                    <img src="5.jpeg" alt="Paket Wisata 3">
                    <h3>Family Fun Adventures</h3>
                    <p>3-5 People</p>
                    <p>1 Day</p>
                    <p>Include Consumption</p>
                    <p>All Destination Same Price</p>
                    <p>With Professional Tour Guide</p>
                    <p>Rp.1.225.000</p>
                </div>
                <div class="paket-wisata-item">
                    <img src="8.jpeg" alt="Paket Wisata 4">
                    <h3>Regular Group</h3>
                    <p>6-10 People</p>
                    <p>1 Day</p>
                    <p>Include Consumption</p>
                    <p>All Destination Same Price</p>
                    <p>With Professional Tour Guide</p>
                    <p>Rp.2.300.000</p>
                </div>
                <div class="paket-wisata-item">
                    <img src="15.jpeg" alt="Paket Wisata 5">
                    <h3>Large Group</h3>
                    <p>11-15 People</p>
                    <p>1 Day</p>
                    <p>Include Consumption</p>
                    <p>All Destination Same Price</p>
                    <p>With Professional Tour Guide</p>
                    <p>Rp.3.300.000</p>
                </div>
            </div>
        </selection>
    </main>
</body>
</html>