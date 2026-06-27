<div align="center">

![siPanda Banner](public/images/sipanda_banner.png)

# siPanda

**siPanda (Sistem Pembelajaran AI Cerdas)** adalah platform _Project Based Learning_ yang dirancang untuk merevolusi cara siswa dan mahasiswa belajar. Dengan memadukan kecerdasan buatan (AI) mutakhir, gamifikasi, dan teknik manajemen waktu, siPanda hadir untuk membuat sesi belajarmu lebih efisien, menyenangkan, dan konsisten.

[![Laravel](https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white)](https://laravel.com)
[![TailwindCSS](https://img.shields.io/badge/Tailwind_CSS-38B2AC?style=for-the-badge&logo=tailwind-css&logoColor=white)](https://tailwindcss.com)
[![Alpine.js](https://img.shields.io/badge/Alpine.js-2D3436?style=for-the-badge&logo=alpine.js&logoColor=white)](https://alpinejs.dev)
[![Filament](https://img.shields.io/badge/Filament-FDBA74?style=for-the-badge&logo=laravel&logoColor=black)](https://filamentphp.com)

</div>

<br/>

## Fitur Utama

### 1. Asisten Belajar AI (Smart Summarization & Quiz)
Membaca materi PDF atau artikel panjang tak perlu memakan waktu berjam-jam.
- **Rangkum Otomatis:** Cukup unggah dokumen (PDF), dan AI siPanda akan langsung membacanya, mengekstrak poin penting, dan menampilkannya dalam format catatan (*Markdown*) yang indah dan mudah dipahami.
- **Latihan Soal AI:** Uji pemahaman Anda! Sistem akan menghasilkan kuis *Pilihan Ganda* interaktif berdasarkan dokumen yang Anda pelajari, memberikan evaluasi instan.

### 2. Gamifikasi (Sistem Runtunan / Streak)
Jaga konsistensi belajarmu dengan sistem *Gamification* modern.
- Lakukan aktivitas belajar (login, rangkum, kuis) setiap hari untuk meningkatkan "Runtunan" (*Streak*) apimu.
- Semakin tinggi Runtunan Anda, semakin keren Badge dan Warna Api (dari Oren, Biru, Ungu, hingga Emas).
- **Pamerkan!** Bagikan "Kartu Runtunan" (*Share Card*) berbentuk potret (9:16) berdesain elegan ke media sosial (Instagram Story/WhatsApp) hanya dengan satu klik *download*.

### 3. Pewaktu Pomodoro Super Ketat
Fokus total tanpa distraksi!
- Sistem Pomodoro dengan desain melayang yang interaktif.
- **Mode Terkunci (Lock Screen):** Saat sesi *istirahat* tiba, siPanda akan **mengunci** layarmu agar kamu benar-benar beristirahat. 
- **Game Lompat Panda:** Sambil menunggu waktu istirahat selesai, kamu bisa memainkan *mini-game* Lompat Panda langsung di dalam modal pengunci layar untuk meregangkan pikiran.

### 4. Desain Modern (Glassmorphism & Dark Mode)
Antarmuka pengguna (UI) yang dibuat dengan gaya paling kekinian.
- Mengusung identitas warna hijau neon khas siPanda (`#75cb50`).
- Elemen *glassmorphism* (kaca transparan), animasi halus, serta ikon dan efek *Glow/Shadow* kelas premium.
- Semua notifikasi dan loader tampil *pop-out* secara interaktif, seperti gelembung teks tempat siPanda berbicara.

---

## Tangkapan Layar (Screenshots)

*(Tambahkan tangkapan layar langsung dari aplikasimu di bawah ini agar GitHub kamu terlihat profesional)*

### 1. Dashboard Utama
<p align="center">
  <img src="https://via.placeholder.com/800x450/111827/75cb50.png?text=+Dashboard+siPanda+" width="80%" alt="Dashboard Screenshot">
</p>
*Dashboard yang menampilkan rangkuman AI, card grid statistik (2x2), dan area upload dokumen berbentuk modern.*

### 2. Kartu Runtunan (Streak Share Card)
<p align="center">
  <img src="https://via.placeholder.com/320x540/111827/75cb50.png?text=+Streak+Card+" width="300px" alt="Streak Share Card">
</p>
*Bentuk hasil download Kartu Runtunan dengan rasio 9:16, dihiasi warna gradasi api sesuai pencapaian (Tier).*

### 3. Notifikasi Pomodoro & Loader AI
<p align="center">
  <img src="https://via.placeholder.com/600x350/111827/75cb50.png?text=+Pomodoro+%26+Loader+" width="60%" alt="Notification Screenshot">
</p>
*Animasi GIF siPanda yang muncul secara 3D (pop-out) di luar kotak dialog saat waktu habis atau saat AI memproses dokumen.*

---

## Tech Stack & Instalasi
1. **Backend:** Laravel 11.x
2. **Admin Panel:** Filament PHP v3
3. **Frontend:** TailwindCSS, Alpine.js, Blade Components
4. **JS Library:** html2canvas, html2pdf.js

### Cara Menjalankan di Lokal:
```bash
# 1. Clone repositori
git clone https://github.com/username/sipanda.git

# 2. Masuk ke direktori
cd sipanda

# 3. Instal ekstensi PHP dan node_modules
composer install
npm install

# 4. Salin file environment dan atur database & API Key (Gemini/OpenAI)
cp .env.example .env
php artisan key:generate

# 5. Jalankan migrasi
php artisan migrate --seed

# 6. Kompilasi aset Frontend
npm run build

# 7. Jalankan server lokal
php artisan serve
```

---

<div align="center">
  <p>Dibuat dengan sepenuh hati untuk merevolusi pendidikan di era AI.</p>
</div>
