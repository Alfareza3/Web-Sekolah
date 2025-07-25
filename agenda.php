<?php
require_once 'partials/header.php';
require_once 'partials/navbar.php';
require_once 'koneksi.php';

$result = $conn->query("SELECT * FROM agenda ORDER BY tanggal ASC");
?>

<div class="container my-5">
  <h2 class="text-center mb-4">Agenda Sekolah</h2>
  
  <?php if ($result->num_rows > 0): ?>
    <div class="list-group">
      <?php while ($row = $result->fetch_assoc()): ?>
        <div class="list-group-item">
          <div class="d-flex justify-content-between">
            <h5><?= htmlspecialchars($row['judul']) ?></h5>
            <span style="font-size: 20px; color: #000; font-weight: bold;"><?= $row['tanggal'] ?></span>
          </div>
          <?php if (!empty($row['deskripsi'])): ?>
            <p class="mb-0"><?= nl2br(htmlspecialchars($row['deskripsi'])) ?></p>
          <?php endif; ?>
        </div>
      <?php endwhile; ?>
    </div>
  <?php else: ?>
    <p class="text-muted text-center">Belum ada agenda tersedia.</p>
  <?php endif; ?>
</div>

  <!-- Tombol Akses Lainnya -->
  <div class="text-center mt-5 mb-5">
    <h4 class="mb-3">🔗 Akses Lainnya</h4>
    <div class="d-flex flex-wrap justify-content-center gap-3">
      <a href="index.php" class="btn btn-dark px-4 py-2 rounded-pill shadow-sm">🏠 Beranda</a>
      <a href="berita.php" class="btn btn-primary px-4 py-2 rounded-pill shadow-sm">📰 Lihat Berita</a>
      <a href="galeri.php" class="btn btn-success px-4 py-2 rounded-pill shadow-sm">📷 Galeri Sekolah</a>
      <a href="direktori.php" class="btn btn-warning px-4 py-2 rounded-pill shadow-sm">🧑‍🏫 Direktori</a>
      <a href="kontak.php" class="btn btn-info px-4 py-2 rounded-pill shadow-sm">📬 Kontak</a>
      <a href="hhh.php" class="btn btn-danger px-4 py-2 rounded-pill shadow-sm" target="_blank">📝 Daftar PPDB</a>
    </div>
  </div>
  
<?php require_once 'partials/footer.php'; ?>
