<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
include '../koneksi.php';

$pesan = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $_POST['nama'];
  $kategori = $_POST['kategori'];
  $kelas = $_POST['kelas'];
  $jabatan = $_POST['jabatan'];
  $kontak = $_POST['kontak'];
  $tingkat = $_POST['tingkat'];

  $foto = $_FILES['foto']['name'];
  $tmp = $_FILES['foto']['tmp_name'];
  $path = '../assets/image/uploads/' . $foto;
  move_uploaded_file($tmp, $path);

  $query = "INSERT INTO direktori (nama, kategori, kelas, jabatan, kontak, tingkat, foto)
            VALUES (?, ?, ?, ?, ?, ?, ?)";
  $stmt = $conn->prepare($query);
  $stmt->bind_param("sssssss", $nama, $kategori, $kelas, $jabatan, $kontak, $tingkat, $foto);

  if ($stmt->execute()) {
    header("Location: index.php");
    exit;
  } else {
    $pesan = "Gagal menambah data.";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tambah Direktori</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
  <h3 class="mb-4">Tambah Data Direktori</h3>

  <?php if ($pesan): ?>
    <div class="alert alert-danger"><?= $pesan ?></div>
  <?php endif; ?>

  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Kategori</label>
      <select name="kategori" class="form-select" required>
        <option value="Guru">Guru</option>
        <option value="Murid">Murid</option>
        <option value="Staff">Staff</option>
      </select>
    </div>
    <div class="mb-3">
      <label>Kelas 10 / 11 / 12 (jika murid)</label>
      <select name="tingkat" class="form-select">
        <option value="">— Pilih Tingkat —</option>
        <option value="10">10</option>
        <option value="11">11</option>
        <option value="12">12</option>
      </select>
    </div>
    <div class="mb-3">
      <label>Jabatan (jika guru/staff)</label>
      <input type="text" name="jabatan" class="form-control">
    </div>
    <div class="mb-3">
      <label>Kontak</label>
      <input type="text" name="kontak" class="form-control">
    </div>
    <div class="mb-3">
      <label>Foto</label>
      <input type="file" name="foto" class="form-control" required>
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Batal</a>
  </form>
</body>
</html>
