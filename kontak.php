<?php
require_once 'partials/header.php';
require_once 'partials/navbar.php';
require_once 'koneksi.php';

$pesan = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST["nama"];
    $email = $_POST["email"];
    $komentar = $_POST["komentar"];
    $url = $_POST["url"];

    $query = "INSERT INTO kontak (nama, email, komentar, url) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssss", $nama, $email, $komentar, $url);

    if ($stmt->execute()) {
        $pesan = '<div class="alert alert-success">Terima kasih! Pesan Anda telah dikirim.</div>';
    } else {
        $pesan = '<div class="alert alert-danger">Gagal mengirim pesan. Silakan coba lagi.</div>';
    }

    $stmt->close();
}

$komentar_query = "SELECT nama, komentar, url, waktu_submit FROM kontak ORDER BY waktu_submit DESC";
$hasil_komentar = $conn->query($komentar_query);
?>

<div class="container my-5">
  <h2 class="mb-4 text-center">Kontak</h2>
  <p class="text-center mb-4 text-muted">
    Kirimkan pertanyaan, kritik, saran, atau masukan untuk SMA Kristen Sunodia melalui formulir berikut.
  </p>

  <?= $pesan ?>

  <div class="row">
    <div class="col-md-6 mb-4">
      <form method="POST" action="">
        <div class="mb-3">
          <label for="nama" class="form-label">Nama</label>
          <input type="text" class="form-control" name="nama" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" name="email" required>
        </div>
        <div class="mb-3">
          <label for="komentar" class="form-label">Kritik & Saran</label>
          <textarea class="form-control" name="komentar" rows="4" required></textarea>
        </div>
        <div class="mb-3">
          <label for="url" class="form-label">URL (opsional)</label>
          <input type="url" class="form-control" name="url">
        </div>
        <button type="submit" class="btn btn-primary">Kirim Pesan</button>
      </form>
    </div>

    <div class="col-md-6">
      <h5 class="mb-3">Lokasi Sekolah:</h5>
      <div class="ratio ratio-4x3">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3768.7924049266744!2d117.15563047805712!3d-0.49335466492492003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2df67f71dcfb455b%3A0xfe0b488bf34b64a2!2sSekolah%20Kristen%20Sunodia%20Samarinda!5e1!3m2!1sid!2sid!4v1753069266535!5m2!1sid!2sid"
          style="border:0;" allowfullscreen="" loading="lazy"
          referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>
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
</div>
<?php require_once 'partials/footer.php'; ?>
