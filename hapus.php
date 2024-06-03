<?php
session_start();
if(!isset($_SESSION["admin"])){
    header("Location: login.php");
    exit;
}
require 'function.php';

$id = $_GET["id"];
if (hapus($id) > 0) {
    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'berandaadmin.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'berandaadmin.php';
        </script>
    ";
}
if (delete($id) > 0) {
    echo "
        <script>
            alert('Data berhasil dihapus!');
            document.location.href = 'berandaadmin.php';
        </script>
    ";
} else {
    echo "
        <script>
            alert('Data gagal dihapus!');
            document.location.href = 'berandaadmin.php';
        </script>
    ";
}
?>