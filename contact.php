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
                if(isset($_SESSION['login']) && $_SESSION['login'] == true || isset($_SESSION['admin']) && $_SESSION['admin'] == true ) : 
                ?>
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
                <?php
                if(isset($_SESSION['admin']) && $_SESSION['admin'] == true): ?>
                <li><a href="berandaadmin.php">Admin</a></li>
              <?php endif; ?>
            </ul>
        </div>
    </nav>
</body>