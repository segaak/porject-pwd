<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Password</title>
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
.mx-auto {
            width: 1160px;
            box-shadow: 0 0 8px darkslategray;
            background-color: #101820;
            border-radius: 10px;
        }

        .card {
            margin-top: 10px;
        }

        h1 {
            width: 800px;
        }

        .form-label {
            margin-bottom: 0;
            padding-right: 5px;
        }
        .form-control {
            background-color: #28353a;
            color: white;
            border: none;
        }
        .custom-card {
            background-color: #101820;
            color: white;
        }

        .center{
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 800px;
            margin-top: 100px;
            color: white;
        }
     
        
        form .txt_field{
            position: relative;
            margin: 20px 0;
        }
        .input{
            border: 1px solid silver;
            border-radius: 5px;
            width: 100%;
            height: 40px;
            outline: 0;
            margin-top: 5px;
            box-sizing: border-box;
        }
        button[type="submit"]{
    width: 100%;
    height: 60px;
    background: #2691d9;
    border: 1px ;
    font-size: 18px;
    border-radius: 5px;
    cursor: pointer;
    color: #e9f4fb;
    font-weight: 700;
    outline: none;
    margin-top: 10px;
}
button[type="submit"]:hover{
    background: #2691d9;
    transition: 5s;
}
a.button {
    display: block;
    width: 100%;
    height: 40px;
    background: black;
    border: 1px solid transparent;
    font-size: 18px;
    border-radius: 5px;
    cursor: pointer;
    color: #e9f4fb;
    font-weight: 700;
    text-align: center;
    text-decoration: none;
    /* line-height: 60px; */
    margin-top: 10px;
    transition: background 0.5s;
}
    </style>
</head>
<body>
<?php if(isset($error)) : ?>
        <script>
            alert('Username / Password salah!');
        </script>
    <?php endif; ?>
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
            <h1 class="text-center" style="padding: 0 0 10px 0; margin-top: 10px;">login</h1>
            <div class="txt_field">
            <label for="username">Username:</label>
            <input type="text" class="input" name="username" id="username" autocomplete="off">
            </div>
            <div class="txt_field">
            <label for="Password">Password:</label>
            <input type="password" class="input" name="password" id="password" autocomplete="off">
            </div>
            
            <a href="registrasi.php" class="button">Registrasi</a>
            <button type="submit" name="login">Perbarui</button>
        </form>
    </div>
</body>
</html>