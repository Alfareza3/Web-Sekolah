<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
include '../koneksi.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM berita WHERE id=$id");
header("Location: index.php");
exit;
