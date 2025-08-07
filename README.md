# proyekmini
 Mini Aplikasi Penjualan Barang, Dibuat oleh siswa untuk pembelajaran dasar web development menggunakan HTML, CSS, dan PHP. Cocok untuk tugas sekolah, portofolio, atau latihan logika pemrograman!
---

# 🛒 Mini Aplikasi Penjualan Barang - Project Sekolah 🎒

> 🌟 **Project Mini Sederhana untuk Praktik PHP & HTML**  
> Dibuat oleh siswa untuk pembelajaran dasar web development menggunakan **HTML, CSS, dan PHP**.  
> Cocok untuk tugas sekolah, portofolio, atau latihan logika pemrograman! 💡

---

## 🏷️ Badges Teknologi

![PHP](https://img.shields.io/badge/PHP-8.3.2%2B-777BB4?style=for-the-badge&logo=php)
![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5)
![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3)
![Font Awesome](https://img.shields.io/badge/Font_Awesome-5.15.4-339AF0?style=for-the-badge&logo=font-awesome)

---

## 🎯 Fitur Utama

✅ **Input Data Penjualan**  
- Pilih barang dari dropdown  
- Masukkan jumlah beli  
- Gunakan kode voucher untuk diskon 🎁

🎁 **Sistem Voucher Cerdas**  
- `HEMAT10` → Diskon 10%  
- `DISKON5000` → Potongan Rp5.000  
- `FREESHIP` → Gratis ongkir! (pesan khusus)  
- Validasi otomatis kode voucher ❌✅

💰 **Perhitungan Otomatis**  
- Total harga = Jumlah × Harga satuan  
- Diskon 1% jika total > Rp50.000  
- Total bayar setelah semua potongan

🖨️ **Fitur Cetak Struk (Print Receipt!)**  
- Tombol **"Cetak Struk"** di halaman hasil  
- Tampilan khusus saat print (tanpa tombol & navigasi)  
- Format rapi, siap dicetak untuk simulasi kasir! 🧾

🎨 **Desain Modern & Responsif**  
- UI keren dengan gradient, shadow, dan hover effect  
- Ikon dari Font Awesome 🖼️  
- Tampilan mobile-friendly 📱  
- Animasi halus dan transisi elegan

🚀 **Tanpa Database!**  
- Semua logika dihandle dengan PHP murni  
- Cocok untuk pemula dan pembelajaran dasar

---

## 🖼️ Tangkapan Layar (Preview)

### 📝 Halaman Input
![Form Input](https://github.com/Dikrey/proyekmini/blob/5eda87d3d01fa39ace5e10191697b70e6709caf6/img/halaman_index.png?raw=true)  
*Form input dengan desain modern dan responsif*

### 💰 Halaman Hasil + Cetak
![Hasil Penjualan](https://github.com/Dikrey/proyekmini/blob/5eda87d3d01fa39ace5e10191697b70e6709caf6/img/halaman_hasil.png?raw=true)  
*Hasil transaksi dengan notifikasi voucher dan tombol cetak*

> 🔖 *Catatan: Jalankan dengan server lokal (XAMPP, dll)*

---

## 🛠️ Cara Menjalankan

1. 🔽 **Clone repositori ini**
   ```bash
   git clone https://github.com/Dikrey/proyekmini.git
   ```

2. 🖥️ **Jalankan di local server** (XAMPP / Laragon / lainnya)  
   - Pindahkan folder ke `htdocs` (XAMPP)  
   - Buka browser: `http://localhost/proyekmini/index.html`

3. 🚀 **Gunakan Aplikasi**  
   - Isi form → Klik **"Proses"** → Lihat hasil di `hasil.php`  
   - Klik **"Cetak Struk"** untuk mencetak bukti pembayaran!

---

## 📚 Teknologi yang Digunakan

| Teknologi       | Peran |
|----------------|------|
| 💻 HTML         | Struktur halaman |
| 🎨 CSS          | Desain modern, responsif, dan animasi |
| 🟡 PHP          | Logika perhitungan, voucher, dan proses data |
| ⚡ Font Awesome  | Ikon profesional (shopping cart, receipt, gift, dll) |
| 🖨️ JavaScript (minimal) | Untuk fitur `window.print()`  `current-date`|

---

## 🖨️ Fitur Cetak Struk (Detail)

- Tombol baru: **"Cetak Struk"** di bawah hasil transaksi
- Saat dicetak:
  - Hanya menampilkan **detail transaksi**
  - Tombol dan navigasi **tidak muncul saat print**
  - Font dan layout dioptimalkan untuk kertas
- Contoh kode:
  ```html
  <button onclick="window.print()" class="print-btn">
    <i class="fas fa-print"></i> Cetak Struk
  </button>
  ```

---

## 🙌 Kontribusi

Projek ini dibuat untuk pembelajaran.  
Kamu bisa:  
- 🔧 Memperbaiki bug  
- 🌈 Menambah fitur (dark mode, simpan ke file, dll)  
- 📝 Memberi saran desain atau UX  
- 🌟 **Beri ⭐ Star** jika kamu suka!

Silakan buat **Pull Request** atau **Issue**! 💬

---

## 📄 Lisensi

Proyek ini **bebas digunakan** untuk:
- Tugas sekolah 🏫  
- Modifikasi belajar 🔧  
- Portofolio pribadi 📂  

❌ **Tidak untuk diperjualbelikan.**  
Dibuat dengan 💖 oleh siswa, untuk siswa.

---

## 🎉 Terima Kasih!

Terima kasih telah melihat project ini!  
Jangan lupa ⭐ **Star** repositori ini agar semangat terus berkarya!  
Semangat belajar coding! 💻🔥

> 🏫 *Project Mini Sekolah - SMKN - 2025*  
> 👨‍💻 Dikembangkan oleh: **Dikrey & Teman-Teman**
```

---

### ✅ Fitur Baru: **Cetak Struk**
Untuk menambahkan tombol cetak di `hasil.php`, tambahkan kode ini sebelum tombol kembali:

```html
<button onclick="window.print()" style="background-color: #2d3748; margin: 20px 0; padding: 12px; border: none; color: white; border-radius: 8px; cursor: pointer; width: 100%; font-size: 1rem;">
    <i class="fas fa-print"></i> 🖨️ Cetak Struk
</button>
```

Dan tambahkan CSS agar saat dicetak, elemen tertentu disembunyikan:

```html
<style>
    @media print {
        .back, .print-btn {
            display: none;
        }
        body {
            background: white;
            font-size: 12pt;
        }
        .card {
            box-shadow: none;
            border: 1px solid #000;
        }
    }
</style>
```


