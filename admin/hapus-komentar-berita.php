<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
include '../koneksi.php';

$id = (int) $_GET['id'];
mysqli_query($conn, "DELETE FROM komentar_berita WHERE id = $id");
header("Location: index.php");
exit;
?>
