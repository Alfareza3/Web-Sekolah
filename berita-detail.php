<?php
include 'partials/header.php';
include 'partials/navbar.php';
include 'koneksi.php';

$pesan = '';
$data = null;
if (isset($_GET['id'])) {
  $id = (int) $_GET['id'];
  $result = mysqli_query($conn, "SELECT * FROM berita WHERE id = $id");
  $data = mysqli_fetch_assoc($result);
  if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nama'], $_POST['komentar'])) {
    $nama = htmlspecialchars(trim($_POST['nama']));
    $komentar = htmlspecialchars(trim($_POST['komentar']));
    if (!empty($nama) && !empty($komentar)) {
      $stmt = $conn->prepare("INSERT INTO komentar_berita (id_berita, nama, komentar) VALUES (?, ?, ?)");
      $stmt->bind_param("iss", $id, $nama, $komentar);
      if ($stmt->execute()) {
        $pesan = '<div class="alert alert-success">Komentar berhasil dikirim!</div>';
      } else {
        $pesan = '<div class="alert alert-danger">Gagal mengirim komentar.</div>';
      }
      $stmt->close();
    } else {
      $pesan = '<div class="alert alert-warning">Nama dan komentar wajib diisi.</div>';
    }
  }
  $komentar_result = mysqli_query($conn, "SELECT * FROM komentar_berita WHERE id_berita = $id ORDER BY tanggal DESC");
}
?>

<div class="container py-4">
  <?php if ($data) : ?>
    <h2 class="mb-3"><?= htmlspecialchars($data['judul']) ?></h2>
    <p><small class="text-muted">🗓️ Tanggal: <?= $data['tanggal'] ?></small></p>
    <p><small class="text-muted">🖊️ Penulis: <?= htmlspecialchars($data['penulis']) ?></small></p>
    <p><?= nl2br(htmlspecialchars($data['isi'])) ?></p>

    <a href="berita.php" class="btn btn-secondary mt-3">← Kembali ke Berita</a>
    <hr class="my-5">
    <h4 class="mb-4">💬 Komentar Pengunjung</h4>
    <?= $pesan ?>
    <form method="POST" class="mb-5">
      <div class="mb-3">
        <label for="nama" class="form-label">Nama</label>
        <input type="text" name="nama" class="form-control" required>
      </div>
      <div class="mb-3">
        <label for="komentar" class="form-label">Komentar</label>
        <textarea name="komentar" rows="3" class="form-control" required></textarea>
      </div>
      <button type="submit" class="btn btn-primary">Kirim Komentar</button>
    </form>
    <?php if (mysqli_num_rows($komentar_result) > 0): ?>
      <?php while ($row = mysqli_fetch_assoc($komentar_result)) : ?>
        <div class="border-bottom pb-2 mb-3">
          <strong><?= htmlspecialchars($row['nama']) ?></strong>
          <small class="text-muted d-block"><?= $row['tanggal'] ?></small>
          <p class="mb-1"><?= nl2br(htmlspecialchars($row['komentar'])) ?></p>
        </div>
      <?php endwhile; ?>
    <?php else : ?>
      <p class="text-muted">Belum ada komentar untuk berita ini.</p>
    <?php endif; ?>

  <?php else : ?>
    <div class="alert alert-warning">Berita tidak ditemukan.</div>
  <?php endif; ?>
</div>
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