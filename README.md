# TPD - TUGAS PRAKTIK DEMONSTRASI (FR.IA.02)
## PENGEMBANGAN SISTEM INFORMASI PORTAL PROFIL SEKOLAH BERBASIS WEB (SMA NEGERI 1 HARAPAN BANGSA)

Sistem Informasi Portal Profil Sekolah SMA Negeri 1 Harapan Bangsa dibangun dan dirancang untuk memenuhi seluruh kriteria unjuk kerja pada Skema Sertifikasi **Junior Web Developer (02/SKM/DID/VII/2024)** — **LSP Entrepreneur Digital Indonesia**.

---

### **Identitas Peserta Uji Kompetensi (Asesi)**
- **Nama Lengkap** : **Zakkya Nur Hadi**
- **NPM** : **23753041**
- **Institusi / Kampus** : Politeknik Negeri Lampung (POLINELA), Bandar Lampung
- **Tempat Uji Kompetensi (TUK)** : Politeknik Negeri Lampung (POLINELA)
- **Lembaga Sertifikasi Profesi (LSP)** : LSP Entrepreneur Digital Indonesia
- **Skema Sertifikasi** : Junior Web Developer (02/SKM/DID/VII/2024)
- **Asesor Penguji** : **Yosep Kurniawan, ST** (No. Reg 000.002992.2021)
- **Tautan Repositori GitHub** : [https://github.com/zakkyanurhadi/BNSP-web-Sekolah](https://github.com/zakkyanurhadi/BNSP-web-Sekolah)

---

## 🛠️ **Spesifikasi Teknologi & Lingkungan Pengembangan**
- **Framework Utama** : Laravel 12.x (Arsitektur Model-View-Controller)
- **Bahasa Pemrograman** : PHP 8.2+
- **Sistem Manajemen Basis Data** : **PostgreSQL 16+** (Koneksi: `pgsql`, Database: `db_sekolah`)
- **Frontend & Styling** : Clean Modern Responsive CSS & Tailwind CSS 4
- **Library Slider** : Swiper.js v11 (Zero Section Hero Slider)
- **Library Peta** : Leaflet Maps & Google Maps Embed API
- **Pengujian Otomatis** : PHPUnit 11 (Automated Feature Tests)

---

## 🚀 **Fitur Utama Aplikasi**

1. **Halaman Beranda (Home):**
   - Zero Section Swiper Hero Slider dengan transisi halus dan indikator slide.
   - Floating Card Sambutan Kepala Sekolah dan Ringkasan Statistik Data Pokok (75 Guru & Tendik, 1238 Siswa, 33 Rombel).
   - Warta Berita & Kegiatan Sekolah Terbaru (3 kolom desktop, 2 kolom mobile).
   - Galeri Kegiatan Dokumentasi Visual (3 kolom desktop, 2 kolom mobile).
   - Ekstrakurikuler Unggulan Siswa (4 kolom desktop, 2 kolom mobile).

2. **Halaman Profil Sekolah (`/profil`):**
   - Visi, Misi, dan Sejarah Sekolah.
   - Sambutan resmi Kepala Sekolah.
   - **Tabel 22 Parameter Legalitas & Identitas Resmi Sekolah** (NPSN: 20108921, Akreditasi A Unggul, SK Izin Operasional, Sarpras, dsb.).
   - Struktur Organisasi dan Kepemimpinan.

3. **Halaman Warta & Berita Sekolah (`/berita`):**
   - Katalog artikel berita lengkap dengan fitur pencarian dan filter per kategori (Prestasi, Kegiatan, Akademik, Fasilitas, Pengumuman).
   - Halaman detail berita (`/berita/{slug}`) dengan artikel terkait.

4. **Halaman Galeri Dokumentasi (`/galeri`):**
   - Dokumentasi foto kegiatan, kejuaraan, dan fasilitas sekolah dengan filter kategori dan modal penampil gambar.

5. **Halaman Ekstrakurikuler (`/ekstrakurikuler`):**
   - Katalog 8 cabang ekstrakurikuler unggulan beserta jadwal latihan, nama pembina, dan prestasi.

6. **Halaman Kontak & Lokasi (`/kontak`):**
   - Formulir pesan interaktif dengan validasi server-side dan proteksi token CSRF.
   - Peta interaktif sematan lokasi kampus sekolah.

7. **Panel CMS Administrator (`/admin`):**
   - Rute terproteksi autentikasi (`admin@sekolah.web.id` / `password`).
   - Manajemen CRUD penuh untuk artikel berita sekolah.
   - Pemantauan pesan kontak masuk dan ringkasan statistik.

8. **Peta Situs SEO (`/sitemap.xml`):**
   - XML Sitemap otomatis untuk optimasi mesin pencari.

---

## ⚙️ **Petunjuk Instalasi & Menjalankan Aplikasi**

### 1. Kloning Repositori
```bash
git clone https://github.com/zakkyanurhadi/BNSP-web-Sekolah.git
cd BNSP-web-Sekolah
```

### 2. Pasang Dependensi
```bash
composer install
npm install && npm run build
```

### 3. Konfigurasi Lingkungan Basis Data (PostgreSQL)
Salin file `.env.example` menjadi `.env`:
```bash
cp .env.example .env
php artisan key:generate
```
Pastikan pengaturan koneksi database pada file `.env` menggunakan PostgreSQL:
```env
DB_CONNECTION=pgsql
DB_HOST=localhost
DB_PORT=5432
DB_DATABASE=db_sekolah
DB_USERNAME=postgres
DB_PASSWORD=12345678
```

### 4. Migrasi & Seeder Database
```bash
php artisan migrate:fresh --seed
```

### 5. Buat Tautan Simbolik Storage
```bash
php artisan storage:link
```

### 6. Jalankan Server Lokal
```bash
php artisan serve
```
Akses aplikasi melalui peramban: `http://127.0.0.1:8000`

---

## 🧪 **Pengujian Mutu Perangkat Lunak (Automated Testing)**
Jalankan pengujian otomatis untuk memverifikasi seluruh unit kompetensi:
```bash
php artisan test
```

---

## 📄 **Dokumentasi Laporan Uji Kompetensi**
Dokumentasi laporan resmi praktik demonstrasi (FR.IA.02) dapat dibuka langsung di:
- **Dokumen Web / Cetak PDF** : [`docs/index.html`](docs/index.html)
- **Laporan Markdown** : [`Laporan_TPD_Zakkya_Nur_Hadi.md`](Laporan_TPD_Zakkya_Nur_Hadi.md)

---
*© 2026 Zakkya Nur Hadi (NPM 23753041) — Politeknik Negeri Lampung (POLINELA)*
