<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
include '../koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM galeri WHERE id = $id"));

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $judul = $_POST['judul'];
  $jenis = $_POST['jenis'];
  $tanggal = date('Y-m-d');

  if ($jenis == 'foto') {
    if ($_FILES['nama_file']['name']) {
      $foto = $_FILES['nama_file']['name'];
      move_uploaded_file($_FILES['nama_file']['tmp_name'], "../assets/image/uploads/$foto");
    } else {
      $foto = $data['nama_file'];
    }
    $nama_file = $foto;
  } else {
    $nama_file = $_POST['nama_file'];
  }

  $stmt = $conn->prepare("UPDATE galeri SET nama_file=?, judul=?, jenis=?, tanggal_upload=? WHERE id=?");
  $stmt->bind_param("ssssi", $nama_file, $judul, $jenis, $tanggal, $id);
  $stmt->execute();

  header("Location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <title>Edit Galeri</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container py-5">
  <h3 class="mb-4">Edit Galeri</h3>
  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label>Judul</label>
      <input type="text" name="judul" class="form-control" value="<?= htmlspecialchars($data['judul']) ?>" required>
    </div>
    <div class="mb-3">
      <label>Jenis</label>
      <select name="jenis" class="form-select" required onchange="toggleInput(this.value)">
        <option value="foto" <?= $data['jenis'] == 'foto' ? 'selected' : '' ?>>Foto</option>
        <option value="video" <?= $data['jenis'] == 'video' ? 'selected' : '' ?>>Video</option>
      </select>
    </div>
    <div class="mb-3" id="foto-input">
      <label>Upload Foto</label>
      <input type="file" name="nama_file" class="form-control">
      <small>Kosongkan jika tidak mengubah foto</small>
    </div>
    <div class="mb-3 d-none" id="video-input">
      <label>Link YouTube</label>
      <input type="url" name="nama_file" class="form-control" value="<?= $data['jenis'] == 'video' ? htmlspecialchars($data['nama_file']) : '' ?>">
    </div>
    <button type="submit" class="btn btn-primary">Simpan</button>
    <a href="index.php" class="btn btn-secondary">Batal</a>
  </form>

  <script>
    function toggleInput(val) {
      document.getElementById('foto-input').classList.toggle('d-none', val !== 'foto');
      document.getElementById('video-input').classList.toggle('d-none', val !== 'video');
    }
    // Set input visibility on page load
    window.onload = function () {
      toggleInput("<?= $data['jenis'] ?>");
    };
  </script>
</body>
</html>
