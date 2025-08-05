<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
include '../koneksi.php';

$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM direktori WHERE id=$id");
$data = mysqli_fetch_assoc($query);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $nama = $_POST['nama'];
  $kategori = $_POST['kategori'];
  $kelas = $_POST['kelas'];
  $tingkat = $_POST['tingkat'];
  $jabatan = $_POST['jabatan'];
  $kontak = $_POST['kontak'];

  if ($_FILES['foto']['name']) {
    $foto = $_FILES['foto']['name'];
    $tmp = $_FILES['foto']['tmp_name'];
    move_uploaded_file($tmp, "../assets/image/uploads/$foto");
  } else {
    $foto = $data['foto'];
  }

  $stmt = $conn->prepare("UPDATE direktori SET nama=?, kategori=?, kelas=?, tingkat=?, jabatan=?, kontak=?, foto=? WHERE id=?");
  $stmt->bind_param("sssssssi", $nama, $kategori, $kelas, $tingkat, $jabatan, $kontak, $foto, $id);
  $stmt->execute();

  header("Location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Edit Direktori</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
  <h3 class="mb-4">Edit Data Direktori</h3>

  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label>Nama</label>
      <input type="text" name="nama" class="form-control" value="<?= $data['nama'] ?>" required>
    </div>
    <div class="mb-3">
      <label>Kategori</label>
      <select name="kategori" class="form-select" required>
        <option value="Guru" <?= $data['kategori'] == 'Guru' ? 'selected' : '' ?>>Guru</option>
        <option value="Murid" <?= $data['kategori'] == 'Murid' ? 'selected' : '' ?>>Murid</option>
        <option value="Staff" <?= $data['kategori'] == 'Staff' ? 'selected' : '' ?>>Staff</option>
      </select>
    </div>
    <div class="mb-3">
      <label>Kelas (10 / 11 / 12)</label>
      <select name="tingkat" class="form-select">
        <option value="">— Pilih Tingkat —</option>
        <option value="10" <?= $data['tingkat'] == '10' ? 'selected' : '' ?>>10</option>
        <option value="11" <?= $data['tingkat'] == '11' ? 'selected' : '' ?>>11</option>
        <option value="12" <?= $data['tingkat'] == '12' ? 'selected' : '' ?>>12</option>
      </select>
    </div>
    <div class="mb-3">
      <label>Jabatan</label>
      <input type="text" name="jabatan" class="form-control" value="<?= $data['jabatan'] ?>">
    </div>
    <div class="mb-3">
      <label>Kontak</label>
      <input type="text" name="kontak" class="form-control" value="<?= $data['kontak'] ?>">
    </div>
    <div class="mb-3">
      <label>Foto</label>
      <input type="file" name="foto" class="form-control">
      <small>Biarkan kosong jika tidak diubah</small>
    </div>
    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
    <a href="index.php" class="btn btn-secondary">Batal</a>
  </form>
</body>
</html>
