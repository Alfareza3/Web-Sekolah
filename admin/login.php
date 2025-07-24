<?php
session_start();
include '../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = hash('sha256', $_POST['password']);

  $query = mysqli_query($conn, "SELECT * FROM admin WHERE username='$username' AND password='$password'");
  $admin = mysqli_fetch_assoc($query);

  if ($admin) {
    $_SESSION['admin'] = $admin['username'];
    header("Location: index.php");
    exit;
  } else {
    $error = "Username atau password salah!";
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Login Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f8f9fa;">
  <div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="card shadow p-4" style="width: 350px;">
      <h4 class="mb-3 text-center text-black py-2">Login Admin</h4>
      <?php if (isset($error)): ?>
        <div class="alert alert-danger"><?= $error ?></div>
      <?php endif; ?>
      <form method="POST">
        <div class="mb-3">
          <input type="text" class="form-control" name="username" placeholder="Username" required>
        </div>
        <div class="mb-3">
          <input type="password" class="form-control" name="password" placeholder="Password" required>
        </div>
        <button type="submit" class="btn w-100 text-white" style="background-color: #1E3A8A;">Login</button>
        <a href="../index.php" class="btn btn-secondary w-100 mt-2" style="background-color:  #1E3A8A;">Kembali ke Beranda</a>

      </form>
    </div>
  </div>
</body>
</html>