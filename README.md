# Lumen: API Penjualan

Ikuti step-step berikut ini dengan benar untuk menjalankan projek.

1. Copy file ```.env.example```, kemudian rename menjadi ```.env```.
> Note: Semua konfigurasi di dalam file tersebut sudah siap pakai, baik APP_KEY, konfigurasi database maupun untuk mengirim email.
2. Jalankan ```npm i```, kemudian jalankan ```composer i```.
3. Jalankan ```php artisan migrate --seed```.
> Note: Di projek ini tidak ada file sql. Cukup jalankan perintah di atas untuk membuat database beserta tabel users, dan seedernya.
4. Jalankan ```php -S localhost:8000 -t public``` untuk mengaktifkan server Lumen.
5. Untuk melihat-lihat API yang tersedia, silakan kunjungi link ini [dokumentasi-api-belajar-lumen](https://documenter.getpostman.com/view/16454761/2s9YJbzMqT)
