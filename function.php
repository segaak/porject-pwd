<?php
$conn = mysqli_connect ("localhost", "root", "", "charity");
$charity = mysqli_query($conn, "SELECT * FROM donasi");
function query($query) {
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


?>