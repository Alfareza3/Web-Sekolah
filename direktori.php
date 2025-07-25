<?php
include 'partials/header.php';
include 'partials/navbar.php';
include 'koneksi.php';
?>

<div class="container py-5">
  <h2 class="text-center mb-5">📚 Direktori SMA Kristen Sunodia</h2>

  <?php
  $kategori_list = ['Guru', 'Staff', 'Murid'];

  foreach ($kategori_list as $kategori):
    echo "<h4 class='mb-3'>{$kategori}</h4>";

    if ($kategori === 'Murid'):
      $tingkat_list = ['12', '11', '10'];
      foreach ($tingkat_list as $tingkat):
        echo "<h5 class='mt-4'>Kelas {$tingkat}</h5>";

        $murid_query = mysqli_query($conn, "SELECT * FROM direktori WHERE kategori='Murid' AND tingkat='$tingkat' ORDER BY nama ASC");

        if (mysqli_num_rows($murid_query) > 0):
          echo "<div class='row row-cols-1 row-cols-md-4 g-4 mb-4'>";
          while ($m = mysqli_fetch_assoc($murid_query)):
            $foto = htmlspecialchars($m['foto']) ?: 'direktori.png';
            ?>
            <div class="col">
              <div class="card h-100 shadow-sm">
                <img src="assets/image/<?= $foto ?>" class="card-img-top object-fit-cover"
                     style="height: 250px; object-position: center;" alt="Foto <?= htmlspecialchars($m['nama']) ?>">
                <div class="card-body d-flex flex-column">
                  <h5 class="card-title"><?= htmlspecialchars($m['nama']) ?></h5>
                  <?php if (!empty($m['kontak'])): ?>
                    <p class="card-text mt-auto"><small class="text-muted"><?= htmlspecialchars($m['kontak']) ?></small></p>
                  <?php endif; ?>
                </div>
              </div>
            </div>
            <?php
          endwhile;
          echo "</div>";
        else:
          echo "<p class='text-muted'>Belum ada murid untuk kelas {$tingkat}.</p>";
        endif;
      endforeach;

    else:
      $query = mysqli_query($conn, "SELECT * FROM direktori WHERE kategori='$kategori' ORDER BY nama ASC");
      if (mysqli_num_rows($query) > 0):
        echo "<div class='row row-cols-1 row-cols-md-4 g-4 mb-5'>";
        while ($row = mysqli_fetch_assoc($query)):
          $foto = htmlspecialchars($row['foto']) ?: 'direktori.png';
          ?>
          <div class="col">
            <div class="card h-100 shadow-sm">
              <img src="assets/image/<?= $foto ?>" class="card-img-top object-fit-cover"
                   style="height: 250px; object-position: center;" alt="Foto <?= htmlspecialchars($row['nama']) ?>">
              <div class="card-body d-flex flex-column">
                <h5 class="card-title"><?= htmlspecialchars($row['nama']) ?></h5>
                <p class="card-text"><?= htmlspecialchars($row['jabatan']) ?></p>
                <?php if (!empty($row['kontak'])): ?>
                  <p class="card-text mt-auto"><small class="text-muted"><?= htmlspecialchars($row['kontak']) ?></small></p>
                <?php endif; ?>
              </div>
            </div>
          </div>
          <?php
        endwhile;
        echo "</div>";
      else:
        echo "<p class='text-muted'>Belum ada data untuk kategori ini.</p>";
      endif;
    endif;

  endforeach;
  ?>
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

<?php include 'partials/footer.php'; ?>
