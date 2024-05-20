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
  text-align: justify;
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
                <li><a href="login.php">Login</a></li>
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
                    <img src="2.jpeg" alt="Paket Wisata 2">
                    <h3>Parkiran</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab consequatur ipsam aspernatur consequuntur libero quaerat modi molestiae temporibus tempore sequi. Voluptatibus aliquid excepturi amet alias expedita sapiente doloremque consequuntur eum!</p>
                    <a href="parkiran.php" class="btn btn-primary">Go somewhere</a>
                </div>
                <div class="paket-wisata-item">
                    <img src="8.jpeg" alt="Paket Wisata 4">
                    <h3>Taman</h3>
                    <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magni, iste consequuntur ut aut assumenda repudiandae fugiat laborum nam voluptas facilis veniam ullam soluta excepturi consequatur reiciendis, blanditiis accusantium distinctio eos.</p>
                    <a href="taman.php" class="btn btn-primary">Go somewhere</a>
                </div>
                <div class="paket-wisata-item">
                    <img src="15.jpeg" alt="Paket Wisata 5">
                    <h3>Dapur</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam voluptatum eveniet eos impedit. Natus neque, velit est eaque commodi saepe iure odit ea cupiditate! Labore nam alias obcaecati minima assumenda?</p>
                    <a href="dapur.php" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>
            </selection>
            <selection class="paket-wisata">
              <div class="paket-wisata-container">
                <div class="paket-wisata-item">
                    <img src="15.jpeg" alt="Paket Wisata 5">
                    <h3>Perpustakaan</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam voluptatum eveniet eos impedit. Natus neque, velit est eaque commodi saepe iure odit ea cupiditate! Labore nam alias obcaecati minima assumenda?</p>
                    <a href="perpustakaan.php" class="btn btn-primary">Go somewhere</a>
                </div>
                <div class="paket-wisata-item">
                    <img src="15.jpeg" alt="Paket Wisata 5">
                    <h3>Fasilitas</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam voluptatum eveniet eos impedit. Natus neque, velit est eaque commodi saepe iure odit ea cupiditate! Labore nam alias obcaecati minima assumenda?</p>
                    <a href="fasilitas.php" class="btn btn-primary">Go somewhere</a>
                </div>
                <div class="paket-wisata-item">
                    <img src="15.jpeg" alt="Paket Wisata 5">
                    <h3>Lantai Dasar</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam voluptatum eveniet eos impedit. Natus neque, velit est eaque commodi saepe iure odit ea cupiditate! Labore nam alias obcaecati minima assumenda?</p>
                    <a href="lantaidasar.php" class="btn btn-primary">Go somewhere</a>
                </div>
                </div>
            </selection>
            <selection class="paket-wisata">
              <div class="paket-wisata-container">
                <div class="paket-wisata-item">
                    <img src="15.jpeg" alt="Paket Wisata 5">
                    <h3>Asrama 1</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam voluptatum eveniet eos impedit. Natus neque, velit est eaque commodi saepe iure odit ea cupiditate! Labore nam alias obcaecati minima assumenda?</p>
                    <a href="asrama1.php" class="btn btn-primary">Go somewhere</a>
                </div>
                <div class="paket-wisata-item">
                    <img src="15.jpeg" alt="Paket Wisata 5">
                    <h3>Asrama 2</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam voluptatum eveniet eos impedit. Natus neque, velit est eaque commodi saepe iure odit ea cupiditate! Labore nam alias obcaecati minima assumenda?</p>
                    <a href="asrama2.php" class="btn btn-primary">Go somewhere</a>
                </div>
                <div class="paket-wisata-item">
                    <img src="15.jpeg" alt="Paket Wisata 5">
                    <h3>Asrama 3</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam voluptatum eveniet eos impedit. Natus neque, velit est eaque commodi saepe iure odit ea cupiditate! Labore nam alias obcaecati minima assumenda?</p>
                    <a href="asrama3.php" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </selection>
        </main>
</body>
</html>