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
</head>
<body>
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