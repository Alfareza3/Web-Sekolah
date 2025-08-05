# 🏫 Web-Sekolah - Website Resmi Sekolah (PHP + Bootstrap)

**Web-Sekolah** adalah proyek website sekolah modern yang dibangun menggunakan **PHP Native** dan **Bootstrap 5**, dirancang untuk memberikan tampilan informatif kepada publik serta menyediakan dashboard admin untuk mengelola data sekolah secara dinamis.

---

## 📌 Fitur Utama

### 🌐 Halaman Publik
- **Beranda**: Tampilan utama dengan hero, sambutan, dan info sekolah.
- **Profil Sekolah**: Sejarah singkat, visi & misi, serta struktur.
- **Berita Sekolah**: Menampilkan berita terbaru dari database.
- **Galeri Foto & Video**: Dokumentasi kegiatan sekolah.
- **Direktori**: Daftar guru, staf, dan murid.
- **Kontak**: Formulir saran/kritik dari pengunjung.
- **PPDB**: Tautan eksternal pendaftaran (dummy link).

### 🔐 Dashboard Admin
- Sistem **login & logout** untuk admin.
- **CRUD Berita**: Tambah, edit, dan hapus berita.
- **CRUD Agenda**: Kelola jadwal/kegiatan sekolah.
- **CRUD Direktori**: Kelola data guru, staf, dan murid.
- **CRUD Galeri**: Upload foto/video kegiatan sekolah.
- **Manajemen Kontak**: Lihat dan hapus pesan dari pengunjung.
- **Manajemen Komentar Berita**: Kelola komentar publik dari halaman berita.

---

## 🧩 Teknologi yang Digunakan

| Teknologi     | Keterangan                             |
|---------------|----------------------------------------|
| PHP           | Backend scripting                      |
| MySQL         | Database sekolah                       |
| Bootstrap 5   | CSS framework responsif                |
| HTML5 & CSS3  | Struktur dan styling halaman           |
| SweetAlert2   | Konfirmasi interaktif untuk hapus data |

---

## 🗃️ Struktur Database (MySQL)

### `berita`
| Kolom     | Tipe     |
|-----------|----------|
| id        | INT      |
| judul     | VARCHAR  |
| isi       | TEXT     |
| penulis   | VARCHAR  |
| tanggal   | DATETIME |

### `agenda`
| Kolom     | Tipe     |
|-----------|----------|
| id        | INT      |
| judul     | VARCHAR  |
| deskripsi | TEXT     |
| tanggal   | DATE     |

### `direktori`
| Kolom    | Tipe      |
|----------|-----------|
| id       | INT       |
| nama     | VARCHAR   |
| kategori | ENUM      |
| tingkat  | VARCHAR   |
| jabatan  | VARCHAR   |
| kontak   | VARCHAR   |
| foto     | TEXT      |

### `galeri`
| Kolom          | Tipe     |
|----------------|----------|
| id             | INT      |
| judul          | VARCHAR  |
| nama_file      | TEXT     |
| jenis          | ENUM     |
| tanggal_upload | DATETIME |

### `kontak`
| Kolom         | Tipe     |
|---------------|----------|
| id            | INT      |
| nama          | VARCHAR  |
| email         | VARCHAR  |
| komentar      | TEXT     |
| url           | TEXT     |
| waktu_submit  | DATETIME |

### `komentar_berita`
| Kolom      | Tipe     |
|------------|----------|
| id         | INT      |
| id_berita  | INT      |
| nama       | VARCHAR  |
| komentar   | TEXT     |
| tanggal    | DATETIME |

---

## 🚀 Cara Menjalankan Proyek

1. Clone atau download repo ini ke dalam folder web server lokal (`htdocs` atau `www`).
2. Buat database baru, contoh: `web_sekolah`.
3. Import struktur dan data dari file `web_sekolah.sql` (jika tersedia).
4. Pastikan file `koneksi.php` telah disesuaikan:
   ```php
   $conn = mysqli_connect("localhost", "root", "", "web_sekolah");
````

5. Jalankan di browser:

   ```
   http://localhost/Web-Sekolah/
   ```

---

## 🙋‍♂️ Pengembang

Website ini dikembangkan oleh:

**Dimas Fahri Alfareza**
SMK - Rekayasa Perangkat Lunak

---

## 📄 Lisensi

Proyek ini bebas digunakan untuk pembelajaran dan pengembangan pribadi. Tidak untuk dijual atau dikomersialkan.

---