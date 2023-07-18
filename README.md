# SIMA - Sistem Arsip File menggunakan CodeIgniter 3 HMVC

SIMA (Sistem Arsip File) adalah sebuah aplikasi berbasis web yang dibangun menggunakan framework CodeIgniter 3 dengan pendekatan HMVC (Hierarchical Model View Controller). Aplikasi ini dirancang untuk membantu mengelola dan mengarsipkan file-file digital secara efisien.

## Fitur

Aplikasi SIMA memiliki beberapa fitur utama, antara lain:

1. Autentikasi Pengguna:
   - Registrasi pengguna baru.
   - Login pengguna dengan keamanan sesi.
   - Proteksi halaman dengan autentikasi.
   - Pengaturan dan pengelolaan hak akses pengguna.

2. Manajemen File:
   - Mengunggah file ke sistem.
   - Mengatur struktur folder untuk pengorganisasian file.
   - Melihat daftar file dan folder.
   - Menghapus file dan folder.
   - Pencarian file berdasarkan nama.

3. Manajemen Kategori:
   - Membuat dan mengelola kategori file.
   - Mengassign kategori pada file.

4. Manajemen Pengguna:
   - Mengelola pengguna: menambah, mengubah, dan menghapus pengguna.
   - Mengatur hak akses pengguna.

## Instalasi

Berikut adalah langkah-langkah untuk menginstal dan menjalankan aplikasi SIMA:

1. Unduh repositori SIMA dari GitHub:

   ```bash
   git clone https://github.com/latifismail53/sima.git
   
2. Buat database kosong di server MySQL.

3. Import file SQL `database.sql` ke dalam database yang telah dibuat.

4. Konfigurasi basis data dan pengaturan lainnya di file `application/config/database.php` dan `application/config/config.php`.

5. Jalankan aplikasi di browser dengan mengakses URL sesuai dengan konfigurasi server Anda.

## Struktur Direktori

Berikut adalah struktur direktori utama dari aplikasi SIMA:
- **application**: Berisi kode utama aplikasi SIMA.
- **assets**: Berisi file-file statis seperti CSS, JavaScript, dan gambar.
- **system**: Direktori inti CodeIgniter 3.
- **uploads**: Direktori untuk menyimpan file-file yang diunggah ke sistem.

## Lisensi

MIT License
-----------
[Lihat Lisensi](LICENSE)

Dengan ini diberikan izin, secara gratis, kepada siapa pun yang memperoleh salinan dari perangkat lunak ini dan file dokumentasi terkait ("Perangkat Lunak"), untuk menggunakan Perangkat Lunak tanpa batasan, termasuk tanpa batasan hak untuk menggunakan, menyalin, mengubah, menggabungkan, mempublikasikan, mendistribusikan, men-sublicense, dan/atau menjual salinan Perangkat Lunak, serta untuk mengizinkan orang yang menerimanya untuk melakukannya, sesuai dengan ketentuan lisensi MIT.

## Hak Cipta

© [latifismail53](https://github.com/latifismail53) - Hak cipta terlindungi

- Segala hak cipta dilindungi oleh undang-undang yang berlaku. Tidak ada bagian dari repositori ini yang dapat direproduksi, didistribusikan, atau ditransmisikan dalam bentuk apa pun atau dengan cara apa pun, termasuk fotokopi, rekaman, atau metode lainnya, tanpa izin tertulis dari pemegang hak cipta.

- Segala merek dagang, logo, dan merek layanan yang terdapat di repositori ini adalah milik latifismail53.

- Penyalinan, modifikasi, distribusi, atau publikasi ulang repositori ini dalam bentuk apa pun, baik dalam bentuk cetak maupun elektronik, memerlukan izin tertulis dari pemegang hak cipta.

Untuk informasi lebih lanjut tentang lisensi dan hak cipta, silakan lihat file [LICENSE](LICENSE) dan [COPYRIGHT](COPYRIGHT) yang disertakan dalam repositori ini.

---

Jika Anda memiliki pertanyaan atau memerlukan bantuan lebih lanjut, silakan hubungi latifismail53 melalui email di [latifismail53@example.com](mailto:latifismailadjie3@gmail.com).

Terima kasih telah menggunakan aplikasi SIMA!

