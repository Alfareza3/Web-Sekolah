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

    // Untuk murid: dikelompokkan berdasarkan tingkat (10, 11, 12)
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

    // Untuk Guru & Staff: langsung ditampilkan
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

<?php include 'partials/footer.php'; ?>
