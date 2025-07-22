---

# 📚 Struktur Database `sekolah`

Database ini digunakan untuk mendukung sistem manajemen konten situs web **SMA Kristen Sunodia** (`SUNODIA25`).

---

## 📂 Tabel Utama

| Tabel       | Deskripsi                                 |
| ----------- | ----------------------------------------- |
| `berita`    | Artikel berita sekolah                    |
| `direktori` | Data guru, murid, dan staf sekolah        |
| `kontak`    | Pesan/komentar dari pengunjung            |
| `admin`     | Autentikasi admin untuk halaman dashboard |

---

## 🧩 Struktur Tabel Singkat

### `berita`

* `id` (int, PK, AI)
* `judul` (varchar 255)
* `penulis` (varchar 100)
* `isi` (text)
* `tanggal` (date)

### `direktori`

* `id` (int, PK, AI)
* `nama` (varchar 100)
* `foto` (varchar 255)
* `kategori` (enum: Guru, Murid, Staff)
* `kelas` (varchar 10) — *opsional, jika kategori = Murid*
* `jabatan` (varchar 100)
* `kontak` (varchar 50)

### `kontak`

* `id` (int, PK, AI)
* `nama`, `email` (varchar 100)
* `komentar` (text)
* `url` (varchar 255) — *opsional*
* `waktu_submit` (timestamp, default: CURRENT\_TIMESTAMP)

### `admin`

* `id` (int, PK, AI)
* `username` (varchar 50)
* `password` (varchar 255, hash SHA2-256)

---

## ⚙️ Inisialisasi Akun Admin

```sql
-- Hapus data lama (opsional)
TRUNCATE TABLE admin;

-- Tambahkan admin default
INSERT INTO admin (username, password)
VALUES ('admin', SHA2('admin123', 256));
```