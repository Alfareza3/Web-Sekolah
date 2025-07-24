<?php include 'partials/header.php'; ?>
<?php include 'partials/navbar.php'; ?>
<?php include 'koneksi.php'; ?>

<div class="container py-4">
  <h2 class="mb-4 text-center">Berita Sekolah</h2>
  <div class="row">
    <?php
    $result = mysqli_query($conn, "SELECT * FROM berita ORDER BY tanggal DESC");

    if (!$result) {
      echo "<div class='col-12'><div class='alert alert-danger'>Gagal mengambil data berita dari database.</div></div>";
    } elseif (mysqli_num_rows($result) == 0) {
      echo "<div class='col-12'><div class='alert alert-warning'>Belum ada berita yang tersedia.</div></div>";
    } else {
      while ($row = mysqli_fetch_assoc($result)) {
        echo "
        <div class='col-md-4 mb-4'>
          <div class='card h-100 d-flex flex-column'>
            <div class='card-body d-flex flex-column'>
              <h5>
                <a href='berita-detail.php?id={$row['id']}' class='text-decoration-none text-dark'>
                  " . htmlspecialchars($row['judul']) . "
                </a>
              </h5>
              <p class='text-muted mb-1'>🖊️ " . htmlspecialchars($row['penulis']) . "</p>
              <p class='flex-grow-1'>" . htmlspecialchars(substr($row['isi'], 0, 100)) . "...</p>
              <a href='berita-detail.php?id={$row['id']}' class='btn btn-sm text-white mt-2' style='background-color: #1E3A8A; width: fit-content;'>📖 Baca di sini</a>
            </div>
            <div class='card-footer'>
              <small class='text-muted'>Tanggal: {$row['tanggal']}</small>
            </div>
          </div>
        </div>";
      }
    }
    ?>
  </div>
</div>

  <!-- Tombol Akses Cepat -->
  <div class="text-center mt-5">
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

<?php include 'partials/footer.php'; ?>
