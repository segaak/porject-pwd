<?php
require 'function.php';
if (isset($_POST["register"])) {
    if (registrasi($_POST) > 0) {
        echo "<script>
                alert('Registrasi berhasil!');
            </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>registrasi</title>
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
<div class="center">
        <form action="" method="post">
            <h1>Registrasi</h1>
            <div class="txt_field">
                <input type="text" name="username" id="username" required autocomplete="off">
                <span></span>
                <label for="username">Username:</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password" id="password" required autocomplete="off">
                <span></span>
                <label for="password">Password:</label>
            </div>
            <div class="txt_field">
                <input type="password" name="password2" id="password2" required autocomplete="off">
                <span></span>
                <label for="password2">Konfirmasi Password:</label>
            </div>
            <button type="submit" name="register">Registrasi</button>
        </form>
    </div>
</body>
</html>