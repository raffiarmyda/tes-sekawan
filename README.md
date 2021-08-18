PHP VERSION : PHP 8

Framework : Laravel 8.54

DataBase Version : 10.4.20-MariaDB

---

Panduan Penggunaan : 

1. Salin contoh file env dan buat perubahan konfigurasi yang diperlukan di file .env `composer install` untuk menginstall seluruh dependency
2. Jalankan migrasi database (** Jangan lupa setel koneksi database di .env sebelum bermigrasi**) `php artisan migrate --seed`
3. Buat kunci aplikasi baru `php artisan key:generate` 
4. Mulai Jalankan lokal development server `php artisan serve` di command

```
=====================
AKUN MASTERADMIN :
Username : ali
Password : ali
=====================
AKUN ADMIN :
Username : mulekjurisek
Password : mulekjurisek
=====================
AKUN MASTERADMIN :
Username : ina
Password : ina
=====================
```

___

Tugas Setiap Rolenya

Tugas Masteradmin :
Dapat mengelola user, order, driver, vehicle

Tugas Admin :
Membuat sebuah permohonan perizinan kendaraan dan mencetak cetak laporan

Tugas Manager :
Memberikan persetujuan pada permohonan perizinan
___
