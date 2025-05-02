
# 🏗️ System Architecture – Kinder-Grade 

Dokumen ini menjelaskan desain arsitektur sistem dari aplikasi **Kinder-Grade**, sebuah aplikasi web berbasis Laravel untuk monitoring pembelajaran anak PAUD & TK secara online oleh guru, orang tua, dan admin.

---

## 📐 Arsitektur Umum

Kinder-Grade dibangun dengan pendekatan **Client–Server Architecture** dan terdiri dari tiga komponen utama:

### 1. Frontend (Client Side)
- **Teknologi:** HTML, CSS, JavaScript (Blade templating Laravel)
- **Fungsi:** Menyediakan antarmuka pengguna untuk login, input laporan, dan navigasi sistem berdasarkan peran pengguna:
  - Admin
  - Guru
  - Orang Tua

### 2. Backend (Server Side)
- **Teknologi:** Laravel (PHP Framework)
- **Fungsi:**
  - Mengelola alur data antara frontend dan database.
  - Menjalankan validasi data dan logika bisnis.
  - Mengatur otentikasi dan otorisasi pengguna.

### 3. Database
- **Jenis:** MySQL
- **Fungsi:** Menyimpan data pengguna, laporan, komentar, dan referensi lainnya.
- **Tabel utama:** `users`, `roles`, `students`, `classes`, `reports`, `comments`

---

## 🔄 Alur Komunikasi Sistem

```
Client (Browser)
    ⬇️  HTTP Request
Laravel Controller (Routing)
    ⬇️  Business Logic
Model (Eloquent ORM)
    ⬇️  MySQL Database
    ⬆️  Query Result
Blade View → HTML Response
    ⬆️  Dikirim kembali ke browser
```

---

## 🔐 Keamanan Akses
- Laravel middleware digunakan untuk membatasi akses berdasarkan role pengguna.
- Validasi input mencegah kesalahan dan serangan injeksi.
- Otentikasi pengguna menggunakan Laravel Auth (email + password).

---

## ⚙️ Role & Hak Akses
| Role        | Akses Utama                                     |
|-------------|--------------------------------------------------|
| Admin       | Kelola data guru, murid, kelas, orang tua        |
| Guru        | Input laporan harian/bulanan/semester            |
| Orang Tua   | Melihat laporan dan mengirim komentar            |

---

## 📈 Skalabilitas & Ekstensi
Sistem Kinder-Grade dapat dikembangkan lebih lanjut dengan:
- Integrasi REST API untuk penggunaan mobile app.
- Upgrade frontend menggunakan Vue.js atau React.
- Notifikasi real-time via email atau WhatsApp.
- Fitur export laporan ke PDF atau Excel.

---

## ✅ Kesimpulan

Dokumen ini menjelaskan bagaimana komponen frontend, backend, dan database saling berinteraksi membentuk sistem monitoring edukasi berbasis web. Arsitektur ini dirancang agar modular, aman, dan dapat diperluas sesuai kebutuhan institusi pendidikan.

