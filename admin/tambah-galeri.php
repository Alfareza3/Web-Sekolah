<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $judul = $_POST['judul'];
  $jenis = $_POST['jenis'];
  $tanggal = date('Y-m-d');

  if ($jenis == 'foto') {
    $foto = $_FILES['nama_file']['name'];
    $tmp = $_FILES['nama_file']['tmp_name'];
    $target = "../assets/image/uploads/" . $foto;

    if (!is_dir("../assets/image/uploads")) {
      mkdir("../assets/image/uploads", 0777, true);
    }

    if (move_uploaded_file($tmp, $target)) {
      $nama_file = $foto;
    } else {
      die("Gagal upload foto.");
    }
  } else {
    $nama_file = $_POST['nama_file'];
  }

  $stmt = $conn->prepare("INSERT INTO galeri (nama_file, judul, jenis, tanggal_upload) VALUES (?, ?, ?, ?)");
  $stmt->bind_param("ssss", $nama_file, $judul, $jenis, $tanggal);
  $stmt->execute();

  header("Location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <title>Tambah Galeri</title>
  <meta charset="UTF-8">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
  <h3 class="mb-4">Tambah Galeri</h3>

  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="judul" class="form-label">Judul</label>
      <input type="text" name="judul" class="form-control" required>
    </div>

    <div class="mb-3">
      <label for="jenis" class="form-label">Jenis</label>
      <select name="jenis" class="form-select" required onchange="toggleInput(this.value)">
        <option value="foto">Foto</option>
        <option value="video">Video</option>
      </select>
    </div>

    <div class="mb-3" id="foto-input">
      <label for="nama_file" class="form-label">Upload Foto</label>
      <input type="file" name="nama_file" class="form-control">
    </div>

    <div class="mb-3 d-none" id="video-input">
      <label for="nama_file_video" class="form-label">Link YouTube</label>
      <input type="url" name="nama_file" class="form-control" placeholder="Sertakan Embed" >
    </div>

    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Batal</a>
  </form>

  <script>
    function toggleInput(value) {
      document.getElementById('foto-input').classList.toggle('d-none', value !== 'foto');
      document.getElementById('video-input').classList.toggle('d-none', value !== 'video');
    }
  </script>
</body>
</html>
