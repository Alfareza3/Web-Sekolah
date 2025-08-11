# 🏫 Web-Sekolah – Website Resmi Sekolah (PHP + Bootstrap)

Website sekolah modern berbasis **PHP Native** dan **Bootstrap 5**.
Memiliki **halaman publik** informatif dan **dashboard admin** untuk mengelola data sekolah secara dinamis.

---

## ✨ Fitur Utama

### 🌐 Halaman Publik

* **Beranda** – Hero, sambutan, dan info singkat sekolah
* **Profil Sekolah** – Sejarah, visi & misi, struktur organisasi
* **Berita Sekolah** – Artikel berita terbaru dari database
* **Galeri Foto & Video** – Dokumentasi kegiatan
* **Direktori** – Daftar guru, staf, dan murid
* **Kontak** – Formulir saran/kritik pengunjung
* **PPDB** – Tautan pendaftaran (dummy link)

### 🔐 Dashboard Admin

* Login & logout admin
* CRUD Berita, Agenda, Direktori, dan Galeri
* Manajemen pesan kontak
* Kelola komentar berita
* SweetAlert2 untuk konfirmasi interaktif

---

## 🛠️ Teknologi yang Digunakan

* **PHP Native** – Backend scripting
* **MySQL** – Database sekolah
* **Bootstrap 5** – CSS framework responsif
* **HTML5 & CSS3** – Struktur & styling
* **SweetAlert2** – Popup interaktif

---

## 🗃️ Struktur Database

* **berita** – Informasi berita sekolah
* **agenda** – Jadwal kegiatan
* **direktori** – Data guru, staf, dan murid
* **galeri** – Foto/video kegiatan
* **kontak** – Pesan dari pengunjung
* **komentar\_berita** – Komentar publik

---

## 🧪 Cara Menjalankan Proyek

1. Pindahkan folder `Web-Sekolah` ke direktori `htdocs` / `www`
2. Buat database `web_sekolah` di **phpMyAdmin**
3. Import file SQL (jika tersedia)
4. Sesuaikan konfigurasi database di:

   ```
   koneksi.php
   ```
5. Jalankan melalui browser:

   ```
   http://localhost/Web-Sekolah/
   ```

---

## 👤 Developer

**Dimas Fahri Alfareza**
SMK – Rekayasa Perangkat Lunak

---

## 📄 Lisensi

Bebas digunakan untuk pembelajaran & pengembangan pribadi.
Tidak untuk dijual atau dikomersialkan.