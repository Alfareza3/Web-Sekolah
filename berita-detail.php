<?php
include 'partials/header.php';
include 'partials/navbar.php';
include 'koneksi.php';

if (isset($_GET['id'])) {
  $id = (int) $_GET['id'];
  $result = mysqli_query($conn, "SELECT * FROM berita WHERE id = $id");
  $data = mysqli_fetch_assoc($result);
}
?>

<div class="container py-4">
  <?php if (isset($data)) : ?>
    <h2 class="mb-3"><?= $data['judul']; ?></h2>
    <p><small class="text-muted">Tanggal: <?= $data['tanggal']; ?></small></p>
    <p><small class="text-muted">🖊️ Penulis: <?= $data['penulis']; ?></small></p>
    <p><?= nl2br($data['isi']); ?></p>
    <a href="berita.php" class="btn btn-secondary mt-3">← Kembali ke Berita</a>
  <?php else : ?>
    <div class="alert alert-warning">Berita tidak ditemukan.</div>
  <?php endif; ?>
</div>

<?php include 'partials/footer.php'; ?>
