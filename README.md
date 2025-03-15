# 🍔 Restaurant App Laravel 🍕

[![Laravel](https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![PWA](https://img.shields.io/badge/PWA-Ready-5A0FC8?style=for-the-badge&logo=pwa&logoColor=white)](https://web.dev/progressive-web-apps/)
[![License](https://img.shields.io/badge/License-MIT-blue?style=for-the-badge)](LICENSE)

## 📝 Deskripsi

Aplikasi Restaurant App adalah sebuah Progressive Web App (PWA) yang dibuat menggunakan framework Laravel. Aplikasi ini dikembangkan selama mengikuti program kelas industri di sekolah sebagai project pembelajaran untuk penerapan teknologi web modern.

Aplikasi ini memungkinkan pengguna untuk:

-   Melihat menu makanan dan minuman dari restoran
-   Memfilter menu berdasarkan kategori
-   Melihat detail produk
-   Menambahkan produk ke keranjang belanja
-   Proses checkout melalui WhatsApp

Dengan penggunaan teknologi PWA, aplikasi dapat diakses secara offline dan diinstal di perangkat mobile maupun desktop untuk pengalaman yang lebih baik.

## ✨ Fitur

-   📱 **Progressive Web App (PWA)** - Dapat diinstal di perangkat dan diakses offline
-   🔍 **Filter Menu** - Pencarian menu berdasarkan kategori
-   🛒 **Keranjang Belanja** - Menambahkan dan mengelola item pesanan
-   💾 **Penyimpanan Lokal** - Menggunakan IndexedDB untuk menyimpan data pesanan
-   📲 **Integrasi WhatsApp** - Proses checkout melalui WhatsApp
-   📱 **Responsif** - Tampilan yang responsif untuk berbagai ukuran layar
-   ☁️ **Google Sheets API** - Penggunaan Google Sheets sebagai sumber data menu

## 🛠️ Teknologi

-   **Frontend**: HTML, TailwindCSS, JavaScript
-   **Backend**: Laravel 11
-   **Database**: SQLite
-   **Storage**: IndexedDB
-   **Data Source**: Google Sheets + Google Apps Script
-   **Deployment**: PWA

## 📋 Prasyarat

-   PHP 8.2 atau lebih tinggi
-   Composer
-   Node.js & NPM
-   Akun Google (untuk Google Sheets dan Apps Script)

## 🚀 Instalasi

### 1. Menyiapkan Project Laravel

1. Clone repositori ini

```bash
git clone https://github.com/faiz-hidayat/restaurant-app-laravel.git
cd restaurant-app-laravel
```

2. Install dependensi PHP

```bash
composer install
```

3. Copy file .env.example ke .env

```bash
cp .env.example .env
```

4. Generate app key

```bash
php artisan key:generate
```

5. Buat database SQLite

```bash
touch database/database.sqlite
```

6. Jalankan migrasi

```bash
php artisan migrate
```

7. Jalankan seeder (opsional)

```bash
php artisan db:seed
```

### 2. Menyiapkan Google Sheets dan Apps Script

1. Buka file `konfigurasi/Restaurant App.xlsx` dan upload ke Google Drive Anda

2. Buka file tersebut dengan Google Sheets dan pastikan ada sheet bernama "Product" dengan kolom-kolom berikut:

    - id
    - name
    - price
    - description
    - image
    - category
    - tag
    - slug

3. Buat Google Apps Script baru:

    - Di Google Sheets, klik **Extensions** > **Apps Script**
    - Salin kode dari file `konfigurasi/app-script.js` ke editor Apps Script
    - Simpan project dengan nama "Restaurant App API"
    - Klik **Deploy** > **New Deployment**
    - Pilih Type: **Web app**
    - Atur:
        - Execute as: **Me**
        - Who has access: **Anyone**
    - Klik **Deploy** dan salin URL yang dihasilkan

4. Tambahkan URL Apps Script ke file .env:

```
GOOGLE_APPS_SCRIPT_URL=https://script.google.com/macros/s/YOUR_SCRIPT_ID/exec
```

5. Bersihkan cache konfigurasi:

```bash
php artisan config:clear
```

### 3. Menjalankan Aplikasi

1. Jalankan server lokal

```bash
php artisan serve
```

2. Buka browser dan akses `http://localhost:8000`

## 👨‍💻 Penggunaan

1. Buka halaman utama untuk melihat daftar menu
2. Gunakan filter untuk mencari menu berdasarkan kategori
3. Klik pada menu untuk melihat detail
4. Tambahkan menu ke keranjang belanja dengan menekan tombol "Add to Cart"
5. Akses keranjang belanja untuk melihat semua item yang dipilih
6. Klik tombol "Checkout" untuk mengirimkan pesanan melalui WhatsApp

## 📸 Screenshot

_Tambahkan screenshot aplikasi di sini_

## 🔮 Pengembangan Selanjutnya

Aplikasi ini masih dalam tahap pengembangan. Beberapa fitur yang direncanakan untuk ditambahkan:

-   Sistem checkout dengan payment gateway
-   Sistem autentikasi pengguna
-   Sistem pengelolaan pesanan
-   Sistem notifikasi
-   Sistem rating dan ulasan

## 📄 Lisensi

Aplikasi ini dilisensikan di bawah [MIT License](LICENSE).

## 👥 Kontak

-   GitHub: [@faiz-hidayat](https://github.com/faiz-hidayat)
-   Proyek ini dikembangkan sebagai bagian dari kelas industri
