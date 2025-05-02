Berikut ini adalah penjelasan **profesional, mudah dipahami, dan menarik untuk HR atau perekrut teknis** terkait sprint planning dan eksekusi dalam pengembangan aplikasi **Kinder-Grade**, berdasarkan dokumen thesis yang kamu berikan:

---

## 📌 **Sprint Implementation Summary – Kinder-Grade Web App**

Sebagai bagian dari tugas akhir, saya mengembangkan aplikasi web bernama **Kinder-Grade** menggunakan metode **Agile Scrum**, yang dibagi dalam **7 sprint bertahap** selama pengembangan. Fokus proyek ini adalah membangun sistem monitoring pembelajaran anak PAUD & TK berbasis web yang memudahkan guru dan orang tua dalam pelaporan serta komunikasi.

### 🔧 **Kenapa Metode Scrum?**

Scrum saya pilih karena:

* Cocok untuk pengembangan bertahap dan iteratif.
* Memudahkan dalam adaptasi perubahan kebutuhan fitur.
* Memberi visibilitas progres proyek secara berkala (melalui burndown chart dan backlog).

---

## 🧩 **Sprint Breakdown**

| Sprint       | Fokus Fitur                                        | Hasil                                                                                                           |
| ------------ | -------------------------------------------------- | --------------------------------------------------------------------------------------------------------------- |
| **Sprint 1** | Login sistem untuk 3 role (admin, guru, orang tua) | Selesai tanpa hambatan mayor, hanya perlu upgrade Laravel dari versi 8 ke 9                                     |
| **Sprint 2** | Input data murid, guru, orang tua, kelas           | Selesai, butuh penyesuaian struktur database Laravel                                                            |
| **Sprint 3** | CRUD data pengguna                                 | Selesai, validasi berhasil, struktur backend stabil                                                             |
| **Sprint 4** | Input laporan harian, bulanan, semester            | Selesai, ditemukan kendala foto tidak tersimpan, diselesaikan dengan debugging field `file` dan storage Laravel |
| **Sprint 5** | Edit & delete laporan guru                         | Selesai, hambatan pada update foto berhasil diatasi dengan metode `Storage::put()`                              |
| **Sprint 6** | Visualisasi laporan dalam bentuk grafik            | Selesai, tantangan utama pada perhitungan agregat data, diatasi dengan query builder Laravel                    |
| **Sprint 7** | Tampilan orang tua & fitur komentar laporan        | Selesai, bug filter data antar anak berhasil diperbaiki dengan relasi one-to-many antar tabel user & laporan    |

---

## 📈 **Manajemen Proyek & Tracking**

* **Product Backlog** disusun berdasarkan prioritas user story.
* **Sprint Backlog** disusun setiap minggu dengan estimasi dan target spesifik.
* **Burndown Chart** digunakan untuk memantau progress harian & remaining effort.

---

## 💡 **Value yang Dicapai**

* Fitur disusun dan dieksekusi berdasarkan skenario nyata (admin → guru → orang tua).
* Proses development mengasah kemampuan teknis (Laravel, CRUD, storage, chart library) sekaligus soft skill (perencanaan sprint, komunikasi fitur).
* Semua sprint diselesaikan tepat waktu dengan iterasi yang bisa diukur.

---

## 🧪 **Evaluasi**

* Dilakukan pengujian sistem dengan **Unit Testing (Black Box)** untuk tiap fitur.
* Validasi antarmuka dilakukan berdasarkan prinsip **8 Golden Rules of UI Design**.
* Pengujian penerimaan sistem oleh pengguna (**User Acceptance Testing**) menunjukkan **tingkat kepuasan pengguna 85%**, dengan dominasi pengguna adalah **orang tua (82.9%)** dan guru (**17.1%**).

---

## 🏁 **Kesimpulan**

Selama 7 sprint, saya berhasil mengimplementasikan seluruh fitur utama Kinder-Grade sesuai dengan scope dan waktu yang direncanakan. Proyek ini memberi saya pengalaman langsung menerapkan metode Scrum secara end-to-end dan menghadapi tantangan teknis nyata dalam pengembangan web aplikasi edukasi.