# 📘 PSAK 72 recog lunas (days)

* [Main Dokumentasi PSAK72](main.md)
* [Link to test_brns2_017.md](test_brns2_017.md)
* [Belum dan Akui Jual Lunas](belum_dan_akui_jual_lunas.md)
* [PSAK 72 Diakui Lunas (Days)](psak_72_recog_lunas_days.md)
* [Diskonto](diskonto.md)
* [Test H026](test_h026.md)
* [Interest Income vs Interest Expense](interest_income_vs_interest_expense.md)
* [Akui Jual (Serah Terima) Belum Lunas](akui_jual_blm_lunas.md)
  
  
## 1. 💡 Konteks PSAK 72

PSAK 72 (Pendapatan dari Kontrak dengan Pelanggan) menekankan bahwa:
- Pendapatan harus diakui **saat kewajiban kinerja dipenuhi**, bukan ketika kas diterima.
- Pembayaran di muka dari pelanggan akan dicatat sebagai **Contract Liabilities**.
- Jika terdapat jeda waktu signifikan antara pembayaran dan pengakuan pendapatan, maka perusahaan wajib menghitung **komponen bunga** (*significant financing component*).
- Perhitungan pengakuan lunas dilakukan berdasarkan **model amortisasi**, bukan sekadar jumlah hari atau jumlah cicilan yang diterima.

---

## 2. 📄 Studi Kasus Kontrak BRNS2/017

| Elemen                       | Nilai                                 |
|-----------------------------|----------------------------------------|
| Nama Blok                   | BRNS2/017                              |
| Nilai Kontrak               | Rp 2.576.607.748                       |
| Jumlah Angsuran             | 24x (struktur kontrak)                 |
| Realisasi Pembayaran        | >24 transaksi (karena DP dan cicilan ganda) |
| Cut-off Evaluasi PSAK       | 31 Maret 2025                          |
| Tanggal Serah Terima (ST)   | Jan-26 (proyeksi lunas layanan)        |
| Tingkat Bunga PSAK 72       | 0.43% per bulan / 5.16% per tahun      |
| Sisa Contract Liabilities   | Rp 285.068.312 (per 31 Maret 2025)     |

---

## 3. 🧾 Mengapa Jumlah Hari Lunas ≠ Jumlah Pembayaran?

### ⚠️ Konsep "recog lunas (days)"
- PSAK 72 tidak mengacu pada **jumlah hari** atau **jumlah cicilan** untuk menentukan pelunasan pengakuan pendapatan.
- Yang dihitung adalah **berapa besar kewajiban kinerja yang telah dipenuhi**, berdasarkan model amortisasi dan waktu.

📌 **Artinya**:  
Meskipun seluruh cicilan telah dibayarkan atau pembayaran lunas secara kas, **pengakuan pendapatan tetap bertahap** sesuai waktu pemenuhan jasa.

---

## 4. 💰 Peran Bunga dalam "Recog Lunas"

### ❓ Apa itu bunga di PSAK 72?
Bunga mencerminkan **kompensasi waktu uang** — karena perusahaan menerima pembayaran lebih awal, maka nilai ekonomisnya meningkat seiring waktu.

### 🔎 Dampaknya:
- Setiap bulan, bunga **menambah nilai liabilities**, bukan langsung diakui sebagai pendapatan.
- Pendapatan hanya diakui ketika jasa diserahkan (serah terima), bukan ketika kas diterima.

---

## 5. 📐 Ilustrasi Perhitungan Recog Lunas

Misalnya terdapat pembayaran awal sebesar **Rp 25.000.000**, dilakukan 35 bulan sebelum ST.

Perhitungan nilai yang akan diakui saat jasa diserahkan:

```excel
= (100% + 0.43%)^35 * 25.000.000 = 29.051.007
= (1 + 0.0043)^35 * 25.000.000 = 29.051.007
```

## 📐 Tabel Ilustrasi Perhitungan Bunga PSAK 72

| **Komponen**     | **Nilai**                          |
|------------------|------------------------------------|
| Suku bunga       | 0.43% per bulan (1.0043)           |
| Durasi           | 35 bulan                           |
| Faktor Bunga     | 1.162040                           |
| Nilai Awal       | Rp 25.000.000                      |
| Nilai Future     | Rp 29.051.007,80                   |

🔎 **Kesimpulan:**  
Meski kas diterima sebesar **Rp 25 juta**, pengakuan pendapatan menurut PSAK 72 menjadi **Rp 29 juta** karena adanya bunga akrual selama **35 bulan**.

## 6. 📊 Dua Kolom Jumlah Penerimaan

Dalam laporan PSAK, terdapat dua jenis kolom jumlah penerimaan:

| **Kolom**                    | **Arti**                                                                 |
|-----------------------------|--------------------------------------------------------------------------|
| Jumlah Penerimaan (kiri)    | Jumlah kas aktual yang diterima dari pelanggan.                         |
| Jumlah Penerimaan (kanan)   | Jumlah pendapatan yang diakui secara akrual oleh PSAK 72.               |

📌 **Jadi:** Jumlah "lunas" menurut akuntansi tidak hanya bergantung pada kas yang diterima, tetapi juga mempertimbangkan waktu dan kewajiban yang telah dipenuhi.

---

## 7. 🧾 Contoh Jurnal dan Pengakuan

### 📥 Saat Kas Masuk:
Dr Kas  
   Cr Contract Liabilities

### 📆 Setiap Bulan (akumulasi bunga PSAK 72):
Dr Interest Expense (bunga PSAK)   xxx  
   Cr Contract Liabilities                xxx

### 📦 Saat ST (Serah Terima Jasa):
Dr Contract Liabilities       xxx  
Dr Interest Expense            xxx  
   Cr Revenue PSAK 72         xxx

## 8. 🎯 Kesimpulan

"Recog lunas (days)" dalam PSAK 72 tidak didasarkan pada waktu kas diterima, melainkan kapan kewajiban diselesaikan.

Meskipun semua pembayaran lunas, pengakuan pendapatan tetap bertahap hingga jasa selesai.

Model ini memastikan adanya transparansi nilai waktu uang, dengan perhitungan bunga sebagai bagian dari akuntabilitas finansial.

## 9. 💡 Ringkasan

PSAK 72 recog lunas (days) menunjukkan bahwa pelunasan secara PSAK bukan hanya soal pembayaran selesai, melainkan kapan jasa telah diberikan.

Pengakuan pendapatan dihitung dari waktu dan bunga, bukan jumlah hari pembayaran.
