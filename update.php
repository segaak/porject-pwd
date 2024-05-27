<?php
require 'function.php';
$id = $_GET["id"];
$charity = query("SELECT * FROM donasi WHERE id = ?", [$id])[0];

if (isset($_POST["update"])) {
    if (update($_POST) > 0) {
        echo "<script>
                alert('Data berhasil diubah!');
                document.location.href = 'ujicoba.php';
            </script>";
    } else {
        echo "<script>
                alert('Data gagal diubah!');
                document.location.href = 'ujicoba.php';
            </script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Donation</title>
    <!-- Add Bootstrap CSS if needed -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<form method="POST">
    <input type="hidden" name="id" value="<?= htmlspecialchars($charity["id"]) ?>">
    <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" name="nama" id="nama" class="form-control" value="<?= htmlspecialchars($charity["nama"]) ?>">
    </div>
    <div class="form-group">
        <label for="telepon">Telepon</label>
        <input type="text" name="telepon" id="telepon" class="form-control" value="<?= htmlspecialchars($charity["telepon"]) ?>">
    </div>
    <div class="form-group">
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" id="alamat" class="form-control" value="<?= htmlspecialchars($charity["alamat"]) ?>">
    </div>
    <div class="form-group">
        <label for="kota">Kota</label>
        <input type="text" name="kota" id="kota" class="form-control" value="<?= htmlspecialchars($charity["kota"]) ?>">
    </div>
    <div class="form-group">
        <label for="provinsi">Provinsi</label>
        <input type="text" name="provinsi" id="provinsi" class="form-control" value="<?= htmlspecialchars($charity["provinsi"]) ?>">
    </div>
    <div class="form-group">
        <label for="pos">Pos</label>
        <input type="text" name="pos" id="pos" class="form-control" value="<?= htmlspecialchars($charity["pos"]) ?>">
    </div>
    <div class="form-group">
        <label for="jumlah">Jumlah</label>
        <input type="text" name="jumlah" id="jumlah" class="form-control" value="<?= htmlspecialchars($charity["jumlah"]) ?>">
    </div>
    <div class="form-group">
        <label for="metode">Metode</label>
        <input type="text" name="metode" id="metode" class="form-control" value="<?= htmlspecialchars($charity["metode"]) ?>">
    </div>
    <div class="form-group">
        <label for="tujuan">Tujuan</label>
        <input type="text" name="tujuan" id="tujuan" class="form-control" value="<?= htmlspecialchars($charity["tujuan"]) ?>">
    </div>
    <div class="form-group">
        <label for="catatan">Catatan</label>
        <input type="text" name="catatan" id="catatan" class="form-control" value="<?= htmlspecialchars($charity["catatan"]) ?>">
    </div>
    <button type="submit" name="update" class="btn btn-primary">Update</button>
</form>

<!-- Add Bootstrap JS if needed -->
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9gybBogGzpeTGUmowFa5dfjl6S1SkpVbrihW7ShuOWBI7b7wtp9" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-ho+pP7hCgK2LLVxK2Rv2A3Gp4aWYkPPgZZ4xmq4XW26L7fY0jqPId1V+GW6PcquM" crossorigin="anonymous"></script>
</body>
</html>
