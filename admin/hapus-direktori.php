<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
include '../koneksi.php';

$id = $_GET['id'];

// Hapus data
mysqli_query($conn, "DELETE FROM direktori WHERE id=$id");

header("Location: index.php");
exit;
?>
