<?php include 'partials/header.php'; ?>
<?php include 'partials/navbar.php'; ?>

<div class="container py-5">
  <h2 class="text-center mb-5">Direktori SMA Kristen Sunodia</h2>

  <!-- Guru -->
  <h4 class="mb-3">Guru</h4>
  <div class="row row-cols-1 row-cols-md-4 g-4 mb-5">
    <?php
      $guru = [
        ["nama" => "Drs. Johanes Widjaja", "mapel" => "Matematika"],
        ["nama" => "Maria Theresia S.Pd", "mapel" => "Bahasa Indonesia"],
        ["nama" => "Pete Dunham M.Pd", "mapel" => "Sejarah"],
        ["nama" => "Fenny Halim S.Pd", "mapel" => "Kimia"],
        ["nama" => "Oktavianus Situmorang", "mapel" => "Fisika"],
        ["nama" => "Imelda Tumiwa", "mapel" => "Bahasa Inggris"],
        ["nama" => "Stefanus Gultom", "mapel" => "Agama Kristen"],
        ["nama" => "Yohana Sari M.Si", "mapel" => "Biologi"],
        ["nama" => "Clive Bissell", "mapel" => "Penjas (Olahraga)"],
        ["nama" => "Citra Anggreani", "mapel" => "Ekonomi"],
        ["nama" => "Veronika Hutagalung", "mapel" => "Geografi"],
        ["nama" => "Erik Gunawan", "mapel" => "TIK"],
        ["nama" => "Ratna Sari Dewi M.Pd", "mapel" => "BK (Bimbingan Konseling)"],
        ["nama" => "Agus Santosa S.Sos", "mapel" => "Sosiologi"],
        ["nama" => "Sri Mulyani S.Pd", "mapel" => "PPKn"],
        ["nama" => "Anita Widodo", "mapel" => "Seni Budaya"],
        ["nama" => "Daniel Hartanto S.Kom", "mapel" => "Informatika"],
        ["nama" => "Hendra Pratama", "mapel" => "Kewirausahaan"],
        ["nama" => "Rina Marbun", "mapel" => "Musik Rohani & Liturgi"]
      ];

      foreach ($guru as $g) {
        echo "
        <div class='col'>
          <div class='card h-100'>
            <img src='assets/image/direktori.png' class='card-img-top' alt='Foto Guru'>
            <div class='card-body'>
              <h5 class='card-title'>{$g['nama']}</h5>
              <p class='card-text'>{$g['mapel']}</p>
            </div>
          </div>
        </div>";
      }
    ?>
  </div>

  <!-- Staff -->
  <h4 class="mb-3">Staff</h4>
  <div class="row row-cols-1 row-cols-md-4 g-4 mb-5">
    <?php
      $staff = [
        "Michael Yuwono – Kepala TU",
        "Yuliana Liem – Bendahara",
        "Natasya Manik – Administrasi",
        "Steven Pattiradjawane – Perpustakaan",
        "Arietta Frans – Kurikulum",
        "Yosefina Noya – Kesiswaan",
        "Samuel Fernando – IT & Website Sekolah",
        "Felicia Sihombing – Humas & Publikasi",
        "Donny Kristian – Sarpras (Sarana & Prasarana)",
        "Monica Lase – Tata Usaha Akademik",
        "Andreas Gultom – Keamanan & Ketertiban",
        "Ruth Silalahi – Kesehatan Sekolah (UKS)"
      ];

      foreach ($staff as $s) {
        echo "
        <div class='col'>
          <div class='card h-100'>
            <img src='assets/image/direktori.png' class='card-img-top' alt='Foto Staff'>
            <div class='card-body'>
              <p class='card-text'>{$s}</p>
            </div>
          </div>
        </div>";
      }
    ?>
  </div>

  <!-- Murid -->
  <h4 class="mb-3">Murid Angkatan 2025/2026</h4>
  <?php
    $murid = [
      "Kelas 10 IPA" => ["Adrian Kusuma", "Felicia Lim", "David Manik"],
      "Kelas 10 IPS" => ["Kevin Halim", "Stephanie Marpaung", "Arief Latuheru"],
      "Kelas 11 IPA" => ["Melvin Susanto", "Yohana Sihotang", "Daniel Pattipeilohy"],
      "Kelas 11 IPS" => ["William Lie", "Angela Sitorus", "Gracia Ohoiwutun"],
      "Kelas 12 IPA" => ["Nathanael Tendean", "Jessica Liando", "Elvis Hutahaean"],
      "Kelas 12 IPS" => ["Steven Tjahjadi", "Clarissa Pardede", "Ronald Nikijuluw"]
    ];

    foreach ($murid as $kelas => $siswa) {
      echo "<h5 class='mt-4'>{$kelas}</h5><div class='row row-cols-1 row-cols-md-4 g-4'>";
      foreach ($siswa as $m) {
        echo "
        <div class='col'>
          <div class='card h-100'>
            <img src='assets/image/direktori.png' class='card-img-top' alt='Foto Murid'>
            <div class='card-body'>
              <p class='card-text'>{$m}</p>
            </div>
          </div>
        </div>";
      }
      echo "</div>";
    }
  ?>
</div>

<?php include 'partials/footer.php'; ?>
