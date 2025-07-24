<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
include '../koneksi.php';

$id = $_GET['id'];
$data = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM galeri WHERE id=$id"));

// hapus file jika foto
if ($data['jenis'] == 'foto') {
  $filePath = "../assets/image/uploads/" . $data['nama_file'];
  if (file_exists($filePath)) {
    unlink($filePath);
  }
}

mysqli_query($conn, "DELETE FROM galeri WHERE id=$id");
header("Location: index.php");
exit;
