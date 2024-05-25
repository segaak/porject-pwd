<?php
session_start();
require 'function.php';

//cek cookie
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    //ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    //cek cookie dan username
    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: donasi.php");
    exit;
}
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    // Tambahkan pengecekan apakah kedua bidang input diisi
    if (!empty($username) && !empty($password)) {
        $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");
        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            if ($password === $row["password"]) {
                //set session
                $_SESSION["login"] = true;
                // cek remember me
                if (isset($_POST["remember"])) {
                    //buat cookie
                    setcookie('id', $row['id'], time() + 3600); // 1 jam
                    setcookie('key', hash('sha256', $row['username']), time() + 3600); // 1 jam
                }
                echo "<script>
                alert('Login Berhasil sebagai $username');
                window.location.href = 'donasi.php';
            </script>";
                exit;
            }
        }
        $error = true;
    } else {
        $error = true; // Atau tambahkan pesan kesalahan khusus
    }
}



// Jika sudah login, langsung redirect ke halaman donasi
if (isset($_SESSION["login"])) {
    header("Location: donasi.php");
    exit;
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #101820;
            color: white;
        }

        .center {
            position: absolute;
            top: 40%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 800px;
            margin-top: 50px;
        }

        .center nav {
            border-bottom: 1px solid rgba(192, 192, 192, 0.1);
            position: relative;
            margin: 100px auto 0;
            height: 40px;
            box-shadow: 0 3px 4px 0 rgba(0, 0, 0, 0.1);
            color: white;
        }

        .center nav a {
            font-size: 15px;
            text-transform: uppercase;
            color: white;
            position: relative;
            text-decoration: none;
            z-index: 1;
            display: inline-block;
            text-align: center;
            padding: 8px;
        }

        .center nav .animation {
            position: absolute;
            /* height: 5px;
            bottom: 0;
            z-index: 0;
            background: blue;
            border-radius: 8px;
            transition: all .5 ease 0s; */
        }

        a:nth-child(1) {
            width: 100px;
        }

        .center nav .start-login,
        a:nth-child(1):hover~.animation {
            left: 0;
            width: 100px;
            border-bottom: 2px solid blue;
        }

        a:nth-child(2) {
            width: 100px;
        }

        .center nav .start-registrasi {
            left: 100px;
            width: 100px;
        }

        a:nth-child(3) {
            width: 100px;
        }

        .center nav .start-admin {
            left: 200px;
            width: 100px;
        }

        form .txt_field {
            position: relative;
            margin: 20px 0;
        }

        .input {
            border: 1px solid silver;
            border-radius: 5px;
            width: 100%;
            height: 40px;
            outline: 0;
            margin-top: 5px;
            box-sizing: border-box;
        }

        button[type="submit"] {
            width: 100%;
            height: 60px;
            background: #2691d9;
            border: 1px;
            font-size: 18px;
            border-radius: 5px;
            cursor: pointer;
            color: #e9f4fb;
            font-weight: 700;
            outline: none;
            margin-top: 10px;
        }

        button[type="submit"]:hover {
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
    <div class="navigasi">
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
    </div>
    <?php if (isset($error)) : ?>
        <script>
            alert('Username / Password salah!');
        </script>
    <?php endif; ?>

    <div class="center">
        <nav>
            <a href="login.php">Login</a>
            <a href="registrasi.php">registrasi</a>
            <a href="admin.php">admin</a>
            <div class="animation start-login"></div>
        </nav>
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
            <div class="checkbox">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </div>
            <a href="editpassword.php" class="button">Lupa Password?</a>
            <button type="submit" name="login">Login</button>
        </form>
    </div>
</body>

</html>