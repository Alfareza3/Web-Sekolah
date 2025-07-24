<?php
session_start();
if (!isset($_SESSION['admin'])) {
  header("Location: login.php");
  exit;
}
include '../koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color: #f5f5f5;">
  <!-- Navbar -->
  <nav class="navbar navbar-dark" style="background-color: #1E3A8A;">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1">Dashboard Admin</span>
      <div>
        <a href="logout.php" class="btn btn-danger">Logout</a>
      </div>
    </div>
  </nav>

  <div class="container py-4">
    <!-- BERITA -->
    <div class="mb-5">
      <h4 class="mb-3">📰 Berita</h4>
      <a href="tambah-berita.php" class="btn text-white mb-3" style="background-color: #1E3A8A;">➕ Tambah Berita</a>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead class="table-dark text-center">
            <tr>
              <th>Judul</th>
              <th>Penulis</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM berita ORDER BY tanggal DESC");
            while ($row = mysqli_fetch_assoc($result)) {
              echo "<tr>
                <td>{$row['judul']}</td>
                <td>{$row['penulis']}</td>
                <td>{$row['tanggal']}</td>
                <td class='text-center'>
                  <a href='edit-berita.php?id={$row['id']}' class='btn btn-sm btn-warning'>Edit</a>
                  <a href='hapus-berita.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Hapus berita ini?')\">Hapus</a>
                </td>
              </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- AGENDA -->
    <div class="mb-5">
      <h4 class="mb-3">📅 Agenda Sekolah</h4>
      <a href="tambah-agenda.php" class="btn text-white mb-3" style="background-color: #1E3A8A;">➕ Tambah Agenda</a>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead class="table-info text-center">
            <tr>
              <th>Judul</th>
              <th>Deskripsi</th>
              <th>Tanggal</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $agenda = mysqli_query($conn, "SELECT * FROM agenda ORDER BY tanggal ASC");
            while ($row = mysqli_fetch_assoc($agenda)) {
              echo "<tr>
                <td>".htmlspecialchars($row['judul'])."</td>
                <td>".htmlspecialchars($row['deskripsi'])."</td>
                <td>{$row['tanggal']}</td>
                <td class='text-center'>
                  <a href='edit-agenda.php?id={$row['id']}' class='btn btn-sm btn-warning'>Edit</a>
                  <a href='hapus-agenda.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Hapus agenda ini?')\">Hapus</a>
                </td>
              </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- DIREKTORI -->
    <div class="mb-5">
      <h4 class="mb-3">👨‍🏫 Direktori Sekolah</h4>
      <a href="tambah-direktori.php" class="btn btn-success mb-3">➕ Tambah Data</a>
      <div class="table-responsive">
        <table class="table table-bordered align-middle text-center">
          <thead class="table-success">
            <tr>
              <th>Nama</th>
              <th>Kategori</th>
              <th>Tingkat / Kelas</th>
              <th>Jabatan</th>
              <th>Kontak</th>
              <th>Foto</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $result = mysqli_query($conn, "SELECT * FROM direktori 
              ORDER BY 
                FIELD(kategori, 'Guru', 'Staff', 'Murid'),
                FIELD(tingkat, '12', '11', '10'),
                nama ASC");

            while ($row = mysqli_fetch_assoc($result)) {
              $foto = htmlspecialchars($row['foto']) ?: 'direktori.png';
              $kelasAtauTingkat = ($row['kategori'] === 'Murid') ? "Kelas {$row['tingkat']}" : "-";

              echo "<tr>
                <td>" . htmlspecialchars($row['nama']) . "</td>
                <td>{$row['kategori']}</td>
                <td>{$kelasAtauTingkat}</td>
                <td>" . ($row['jabatan'] ?: '-') . "</td>
                <td>" . ($row['kontak'] ?: '-') . "</td>
                <td>
                  <img src='../assets/image/uploads/{$foto}' width='60' height='60' class='rounded-circle border border-2' alt='Foto {$row['nama']}'>
                </td>
                <td>
                  <a href='edit-direktori.php?id={$row['id']}' class='btn btn-sm btn-warning'>Edit</a>
                  <a href='hapus-direktori.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Hapus data ini?')\">Hapus</a>
                </td>
              </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

    <!-- GALERI -->
    <div class="mb-5">
      <h4 class="mb-3">🖼️ Galeri</h4>
      <a href="tambah-galeri.php" class="btn btn-primary mb-3">➕ Tambah Galeri</a>
      <div class="table-responsive">
        <table class="table table-bordered text-center align-middle">
          <thead class="table-primary">
            <tr>
              <th>Judul</th>
              <th>Jenis</th>
              <th>Tanggal</th>
              <th>Preview</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $galeri = mysqli_query($conn, "SELECT * FROM galeri ORDER BY tanggal_upload DESC");
            while ($g = mysqli_fetch_assoc($galeri)):
              ?>
              <tr>
                <td><?= htmlspecialchars($g['judul']) ?></td>
                <td><?= $g['jenis'] ?></td>
                <td><?= $g['tanggal_upload'] ?></td>
                <td>
                  <?php if ($g['jenis'] == 'foto'): ?>
                    <img src="../assets/image/uploads/<?= $g['nama_file'] ?>" width="80">
                  <?php else: ?>
                    <a href="<?= $g['nama_file'] ?>" target="_blank">Lihat Video</a>
                  <?php endif; ?>
                </td>
                <td>
                  <a href="edit-galeri.php?id=<?= $g['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                  <a href="hapus-galeri.php?id=<?= $g['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Hapus item ini?')">Hapus</a>
                </td>
              </tr>
            <?php endwhile; ?>
          </tbody>
        </table>
      </div>
    </div>


    <!-- KOMENTAR -->
    <div class="mb-5">
      <h4 class="mb-3">💬 Komentar Pengunjung</h4>
      <div class="table-responsive">
        <table class="table table-bordered">
          <thead class="table-secondary text-center">
            <tr>
              <th>Nama</th>
              <th>Email</th>
              <th>Komentar</th>
              <th>URL</th>
              <th>Waktu</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $komentar = mysqli_query($conn, "SELECT * FROM kontak ORDER BY waktu_submit DESC");
            while ($row = mysqli_fetch_assoc($komentar)) {
              echo "<tr>
                <td>".htmlspecialchars($row['nama'])."</td>
                <td>".htmlspecialchars($row['email'])."</td>
                <td>".nl2br(htmlspecialchars($row['komentar']))."</td>
                <td><a href='".htmlspecialchars($row['url'])."' target='_blank'>".htmlspecialchars($row['url'])."</a></td>
                <td>{$row['waktu_submit']}</td>
                <td class='text-center'>
                  <a href='hapus-komentar.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick=\"return confirm('Hapus komentar ini?')\">Hapus</a>
                </td>
              </tr>";
            }
            ?>
          </tbody>
        </table>
      </div>
    </div>

  </div>
</body>
</html>
