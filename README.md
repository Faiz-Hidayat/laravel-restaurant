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

## 🛠️ Teknologi

-   **Frontend**: HTML, TailwindCSS, JavaScript
-   **Backend**: Laravel 11
-   **Database**: SQLite
-   **Storage**: IndexedDB
-   **Deployment**: PWA

## 📋 Prasyarat

-   PHP 8.2 atau lebih tinggi
-   Composer
-   Node.js & NPM

## 🚀 Instalasi

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

8. Jalankan server lokal

```bash
php artisan serve
```

9. Buka browser dan akses `http://localhost:8000`

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
