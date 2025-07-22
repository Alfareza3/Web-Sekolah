<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
include '../koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM berita WHERE id=$id"));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $judul = $_POST['judul'];
  $penulis = $_POST['penulis'];
  $isi = $_POST['isi'];
  $tanggal = $_POST['tanggal'];

  mysqli_query($conn, "UPDATE berita SET judul='$judul', penulis='$penulis', isi='$isi', tanggal='$tanggal' WHERE id=$id");
  header("Location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Edit Berita</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <h3>Edit Berita</h3>
    <form method="POST">
      <div class="mb-3">
        <label>Judul</label>
        <input type="text" name="judul" class="form-control" value="<?= $data['judul'] ?>" required>
      </div>
      <div class="mb-3">
        <label>Penulis</label>
        <input type="text" name="penulis" class="form-control" value="<?= $data['penulis'] ?>" required>
      </div>
      <div class="mb-3">
        <label>Isi</label>
        <textarea name="isi" class="form-control" rows="5" required><?= $data['isi'] ?></textarea>
      </div>
      <div class="mb-3">
        <label>Tanggal</label>
        <input type="date" name="tanggal" class="form-control" value="<?= $data['tanggal'] ?>" required>
      </div>
      <button type="submit" class="btn text-white" style="background-color: #1E3A8A;">Update</button>
      <a href="index.php" class="btn btn-secondary">Batal</a>
    </form>
  </div>
</body>
</html>
