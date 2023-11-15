Anda dapat mengunduh file aplikasi Laravel di repositori ini menggunakan Github secara langsung atau dengan menjalankan perintah di terminal.

-Menjalankan di lokal menggunakan framework laravel-

1. Setup framework laravel agar dapat berjalan di lokal dan buat database sesuai yang ada di file.env(buat tabel baru dengan nama 'aplikasi_penghitung_kendaraan'(sesuai .env) menggunakan mysql (XAMPP: nyalakan apache dan mysql) setelah itu lakukan beberapa konfigurasi seperti composer update->composerinstall->php artisan key:generate->php artisan migrate... jika sudah berhasil jalankan terminal php artisan serve untuk menjalankan aplikasi web di lokal server)
2. Jika aplikasi web sudah berjalan silahkan registrasi akun terlebih dahulu, registari akun dengan cara mengisi kolom form yang telah disediakan dengan sesuai kemudian terdapat pilihan role yang tersedia.
3. Buat akun setidaknya 4 akun yakni akun member/driver 1, akun approver 2 (level 1 dan level 2), dan akun admin 1. (Note: Email yang digunakan dapat berupa email acak karena tidak terdapat verifikasi email)
4. Jika akun telah selesai dibuat selanjutnya login menggunakan akun dengan role admin dikarenakan akun yang dapat melakukan order/pemesanan hanya akun admin
5. setelah pemeseanan dibuat order kendaraan dapat dilihat di tabel halaman dashboard
6. Setelah itu silahkan logout dan mengganti ke akun approver dengan urutan sesuai orderan yang dibuat
7. jika sudah approver pertama akan dapat melakukan action approve untuk list order yang dilakukan
8. Jika approver pertama sudah melakukan approve maka silahkan login ke akun approver ke dua, maka approver kedua dapat melakukan approve setelah dilakukan persetujuan dari approver pertama.
9. Jika approver kedua sudah menyetujui maka grafik kendaraan dan jumlah kendaraan tersebut yang terpakai dapat dilihat (artinya pemesanan kendaraan sudah bisa diproses/diberlakukan).
10. Grafik bisa didownload berupa file excell dengan melakukan click pada icon report yang ada di sidebar

```

```
