<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $judul = $_POST['judul'];
  $penulis = $_POST['penulis'];
  $isi = $_POST['isi'];
  $tanggal = $_POST['tanggal'];

  mysqli_query($conn, "INSERT INTO berita (judul, penulis, isi, tanggal)
                       VALUES ('$judul', '$penulis', '$isi', '$tanggal')");
  header("Location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Tambah Berita</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h3>Tambah Berita</h3>
    <form method="POST">
      <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Penulis</label>
        <input type="text" name="penulis" class="form-control" required>
      </div>
      <div class="mb-3">
        <label>Isi</label>
        <textarea name="isi" class="form-control" rows="5" required></textarea>
      </div>
      <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" required>
      </div>
      <button type="submit" class="btn text-white" style="background-color: #1E3A8A;">Simpan</button>
      <a href="index.php" class="btn btn-secondary">Kembali</a>
    </form>
  </div>
</body>
</html>
