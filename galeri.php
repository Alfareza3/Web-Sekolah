<?php include 'partials/header.php'; ?>
<?php include 'partials/navbar.php'; ?>
<?php include 'koneksi.php'; ?>

<div class="container mt-4">
  <h2 class="text-center mb-4">Galeri Kegiatan SMA Kristen Sunodia</h2>

  <?php
  $result = mysqli_query($conn, "SELECT * FROM galeri ORDER BY tanggal_upload DESC");

  if (mysqli_num_rows($result) > 0): ?>
    <div class="row row-cols-1 row-cols-md-3 g-4">
      <?php while ($row = mysqli_fetch_assoc($result)): ?>
        <div class="col">
          <div class="card h-100 shadow-sm">
            <?php if ($row['jenis'] == 'foto'): ?>
              <img src="assets/image/uploads/<?= htmlspecialchars($row['nama_file']) ?>" class="card-img-top object-fit-cover" style="height: 250px;" alt="<?= htmlspecialchars($row['judul']) ?>">
            <?php else: ?>
              <div class="ratio ratio-16x9">
                <iframe src="<?= htmlspecialchars($row['nama_file']) ?>" allowfullscreen></iframe>
              </div>
            <?php endif; ?>
            <div class="card-body text-center">
              <p class="card-text"><?= htmlspecialchars($row['judul']) ?></p>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  <?php else: ?>
    <div class="alert alert-warning text-center">
      Belum ada data galeri yang ditambahkan.
    </div>
  <?php endif; ?>
</div>

<?php include 'partials/footer.php'; ?>
