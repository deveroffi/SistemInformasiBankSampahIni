# ♻️ Sistem Optimasi Rute Penjemputan Bank Sampah

Aplikasi web berbasis Laravel untuk memudahkan pengelolaan transaksi penjemputan sampah pada Bank Sampah.  
User (nasabah) dapat mendaftarkan sampah yang akan dijemput, dan admin dapat memverifikasi serta mengoptimalkan rute pengambilan menggunakan algoritma **Travelling Salesman Problem (TSP) – Nearest Neighbor**.

---

## 🚀 Fitur Unggulan

- 👤 Autentikasi user & admin
- 📦 Form pendaftaran penjemputan oleh nasabah
- 📝 Input produk sampah: jenis, jumlah, alamat
- ✅ Konfirmasi & verifikasi transaksi oleh admin
- 🗺️ Generate rute otomatis dengan algoritma **TSP Nearest Neighbor**
- 📍 Rute dioptimalkan dari titik bank sampah agar lebih efisien

---

## 🛠️ Teknologi

- Laravel 10+
- PHP 8.1+
- MySQL / MariaDB
- Blade & Bootstrap
- TSP (Nearest Neighbor Algorithm)
- Google Maps API (opsional)

---

## ⚙️ Instalasi & Konfigurasi

```bash
git clone https://github.com/deveroffi/sistemOptimasiRutePenjemputanBankSampah.git
cd sistemOptimasiRutePenjemputanBankSampah
composer install
cp .env.example .env
php artisan key:generate
