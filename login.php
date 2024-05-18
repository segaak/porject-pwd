<?php
session_start();

if (isset($_SESSION["login"])) {
    header("Location: donasi.php");
    exit;
}

require 'function.php';
if (isset($_POST["login"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if ($password === $row["password"] ) {
            $_SESSION["login"] = true;
            header("Location: donasi.php");
            exit;
        }
    }
    $error = true;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>halaman login</title>
</head>
<body>
<?php if(isset($error)) : ?>
        <script>
            alert('Username / Password salah!');
        </script>
    <?php endif; ?>
<form action="" method="post">
           <div>
            <div class="txt_field">
            <input type="text" name="username" id="username" autocomplete="off">
            <span></span>
            <label for="username">Username:</label>
           </div>
            <div class="txt_field">
            <input type="password" name="password" id="password" autocomplete="off">
            <span></span>
            <label for="password">Password:</label>
            </div>
            <div class="checkbox">
            <input type="checkbox" name="remember" id="remember">
            <label for="remember">Remember me</label>
            </div>
            <button type="submit" name="login">Login</button>
            <div class="signup_link">
                tidak mempunyai akun? <a href="registrasi.php">Registrasi</a>
            </div>
        </form>
    </div>
</body>
</html>