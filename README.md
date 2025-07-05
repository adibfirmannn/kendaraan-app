# 🚘 Aplikasi Pemesanan Kendaraan - Perusahaan Tambang

Aplikasi ini digunakan untuk mengelola pemesanan dan penggunaan kendaraan perusahaan, termasuk kendaraan milik sendiri dan kendaraan sewaan. Dilengkapi dengan fitur persetujuan berjenjang, dashboard grafik, dan laporan yang dapat di-export ke Excel.

---

## 🛠 Teknologi yang Digunakan

| Komponen        | Versi           |
|-----------------|------------------|
| PHP             | 8.2.x            |
| Laravel         | 10.x             |
| Laravel UI      | (Auth + Bootstrap) |
| MySQL / MariaDB | 8.x       |
| Charts          | Larapex Charts   |
| Excel Export    | Maatwebsite Excel |

---

## 🔐 Daftar Username & Password (Seeder Default)

| Role     | Email              | Password   |
|----------|--------------------|------------|
| Admin    | admin@demo.com     | password   |
| Approver | approver1@demo.com | password   |
| Approver | approver2@demo.com | password   |

---

## 📥 Panduan Instalasi Aplikasi

### 1. Clone Repository

```bash
git clone https://github.com/adibfirmannn/kendaraan-app.git
cd nama-repo

composer install
npm install
npm run dev

cp .env.example .env
php artisan key:generate

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=kendaraan_app
DB_USERNAME=root
DB_PASSWORD=

php artisan migrate --seed

php artisan serve

