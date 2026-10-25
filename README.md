# UTS Web Programming - Nilai Mahasiswa

Proyek ini menampilkan data nilai mahasiswa dengan fitur foto, pencarian, pengurutan, dan paginasi sesuai tugas UTS.

## Fitur yang sudah diterapkan

- Pembacaan data foto mahasiswa melalui kolom `file_path` pada tabel database.
- Thumbnail foto ditampilkan di sebelah nama mahasiswa dalam kolom yang sama, yaitu kolom Nama Mahasiswa.
- Search input dengan opsi:
  - Search by name
  - Search by predicate
- Sorting berdasarkan Nilai Akhir dengan ikon panah kecil di judul kolom.
- Pagination dengan opsi 5, 10, 15 record per page.
- Tombol navigasi: First Page, Previous, Next, Last Page.
- Data dummy berjumlah 15 baris agar semua fitur demonstrasi dapat dijalankan.

## Struktur database

- Database: `db5a`
- Tabel utama: `nilaimahasiswa`
- Tabel pendukung: `nilaimhsw`
- Kolom penting: `file_path`

## File utama

- `datatable.php` — halaman utama tabel dan fitur interaktif
- `formnilai.php` — form tambah data mahasiswa
- `create_db.php` — skrip pembuatan tabel database
- `db5a.sql` — export database lengkap

## Menjalankan aplikasi

1. Aktifkan Apache dan MySQL di XAMPP.
2. Pastikan database `db5a` sudah dibuat atau import file SQL berikut:
   `mysql -u root db5a < db5a.sql`
3. Buka browser dan akses:
   `http://localhost/utspemrogramanweb/datatable.php`

## Catatan penting

Project ini telah dibuat dan diekspor ke file SQL di repository lokal. Karena lingkungan saat ini tidak memiliki akses ke akun GitHub atau remote repository pengguna, proses `git push` ke GitHub tidak dapat dijalankan dari sini.

Jika Anda ingin mempublikasikan ke GitHub, jalankan perintah berikut di folder proyek:

```bash
git init
git add .
git commit -m "UTS Web Programming"
git branch -M main
git remote add origin <URL_REPOSITORY_GITHUB>
git push -u origin main
```

Pastikan repository GitHub Anda dibuat sebagai Public agar dapat diakses publik.
