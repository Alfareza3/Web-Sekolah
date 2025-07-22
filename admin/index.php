<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
include '../koneksi.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-dark" style="background-color: #1E3A8A;">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1">Dashboard Admin</span>
      <a href="logout.php" class="btn btn-danger">Logout</a>
    </div>
  </nav>

  <div class="container mt-4">
    <a href="tambah-berita.php" class="btn text-white mb-3" style="background-color: #1E3A8A;">➕ Tambah Berita</a>
    <table class="table table-bordered">
      <thead class="table-dark">
        <tr>
          <th>Judul</th>
          <th>Penulis</th>
          <th>Tanggal</th>
          <th>Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $result = mysqli_query($conn, "SELECT * FROM berita ORDER BY tanggal DESC");
        while ($row = mysqli_fetch_assoc($result)) {
          echo "<tr>
            <td>{$row['judul']}</td>
            <td>{$row['penulis']}</td>
            <td>{$row['tanggal']}</td>
            <td>
              <a href='edit-berita.php?id={$row['id']}' class='btn btn-sm btn-warning'>Edit</a>
              <a href='hapus-berita.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Hapus berita ini?')\">Hapus</a>
            </td>
          </tr>";
        }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
