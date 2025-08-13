# 📘 Pemahaman Lengkap PSAK 72 dalam Konteks Proyek BRNS2/017

* [Main Dokumentasi PSAK72](main.md)
* [Link to test_brns2_017.md](test_brns2_017.md)
* [Belum dan Akui Jual Lunas](belum_dan_akui_jual_lunas.md)
* [PSAK 72 Diakui Lunas (Days)](psak_72_recog_lunas_days.md)
* [Diskonto](diskonto.md)
* [Test H026](test_h026.md)
* [Interest Income vs Interest Expense](interest_income_vs_interest_expense.md)
* [Akui Jual (Serah Terima) Belum Lunas](akui_jual_blm_lunas.md)
  
  

## 1. 💡 Prinsip Dasar PSAK 72

PSAK 72 (Pendapatan dari Kontrak dengan Pelanggan) mengatur bahwa:

- Pendapatan **tidak boleh diakui saat kas diterima**, melainkan saat **kewajiban kinerja (performance obligation)** telah dipenuhi.
- Jika pelanggan membayar **lebih dulu**, perusahaan mencatatnya sebagai **contract liabilities** (pendapatan diterima di muka).
- Apabila terdapat **perbedaan waktu signifikan** antara pembayaran dan pemenuhan kewajiban, maka harus dihitung **komponen bunga implisit** (significant financing component).

---

## 2. 🧾 Struktur Kontrak dan Pembayaran BRNS2/017

| Komponen              | Nilai                                 |
|-----------------------|----------------------------------------|
| Total Kontrak         | Rp 2.576.607.748                       |
| Metode Pembayaran     | Bertahap (24 kali angsuran)           |
| Estimasi Serah Terima | 31 Januari 2026                        |
| Tingkat Bunga Efektif | 5,16% per tahun / 0,43% per bulan      |
| Cut-off PSAK 72       | 31 Maret 2025                          |
| Sisa Liabilitas (31/03/2025) | Rp 285.068.312                |
| Komponen bunga akumulatif | Rp 28.389.435                      |

---

## 3. 🧩 Penjelasan Dua Kolom "Jumlah Penerimaan"

Dalam file terdapat **dua kolom dengan label sama**, yaitu **"Jumlah Penerimaan"**, namun maknanya sangat berbeda:

| Kolom                            | Arti                                                                 |
|----------------------------------|----------------------------------------------------------------------|
| **Jumlah Penerimaan (Kiri)**     | Uang kas yang **benar-benar diterima dari pelanggan** (cash basis). |
| **Jumlah Penerimaan (Kanan)**    | Nilai **pendapatan yang akan diakui bertahap per bulan** berdasarkan jadwal amortisasi PSAK 72 (accrual basis). |

### 🔍 Perbedaan Penting:
- Kolom kiri digunakan untuk menghitung **nilai kontrak total**.
- Kolom kanan digunakan untuk menghitung:
  - **Revenue bulanan**
  - **Saldo contract liabilities**
  - **Interest (bunga)**

> 📌 Penting: Pendapatan yang diakui **tidak selalu sejalan** dengan kas masuk.  
> Penjadwalan pengakuan dibuat secara **predetermined** sesuai kontrak dan PSAK 72.

---

## 4. 📦 Mengapa "Bertahap 24x", tapi Jumlah Pembayaran > 24?

### ✅ Penjelasan:

- “Bertahap 24x” adalah **skema atau kesepakatan kontraktual** dalam PPJB, yaitu pembayaran dilakukan dalam 24 bulan.
- Namun pada kenyataannya:
  - Pelanggan bisa membayar **dalam pecahan yang lebih kecil**
  - Bisa terjadi **lebih dari satu pembayaran dalam satu bulan**
  - Bisa ada **pelunasan sebagian di awal** (DP besar)

### 📌 Contoh:
- Februari 2023 tercatat **4 pembayaran** (bukan 1)
- Beberapa bulan diikuti oleh **pembayaran berturut-turut**

Artinya:
- Meski skemanya “24x”, jumlah **transaksi riil bisa lebih dari 24**
- Ini **tidak melanggar skema kontrak**, dan tetap sesuai dengan PSAK 72

---

## 5. 🧮 Fungsi Bunga dalam PSAK 72

### ❓ Apa itu bunga dalam PSAK 72?

> **Bunga adalah representasi dari peluang keuntungan perusahaan karena menerima uang lebih awal.**

Bunga ini:
- **Bukan dibayar terpisah oleh pelanggan**
- **Tidak menghasilkan kas tambahan**
- Namun, **harus diakui sebagai pendapatan bunga secara akuntansi**

### 📘 Dasar PSAK 72:
Jika ada pembayaran di muka dan perbedaan waktu signifikan dengan jasa yang diberikan → **harus diakui komponen pendanaan** (financing component).

---

## 6. 🔁 Mekanisme Amortisasi PSAK 72

Setiap bulan:

1. Hitung bunga:  
   `Saldo contract liabilities bulan lalu × bunga 0,43%`
2. Tambahkan bunga ke saldo liabilities
3. Kurangi saldo liabilities dengan pendapatan bulanan (misalnya Rp 44.331.650)
4. Sisa liabilities jadi dasar perhitungan bulan berikutnya

---

## 7. 🧾 Jurnal-Jurnal Akuntansi

### 🔹 Saat Kas Masuk
```text
Dr Cash
    Cr Contract Liabilities
```

### 🔹 Setiap Bulan (Efek PSAK 72)
```text
Dr Interest Expense - PSAK 72      xxx
    Cr Contract Liabilities - PSAK 72      xxx
```

### 🔹 Saat Serah Terima / ST Aktual
```text
Dr Contract Liabilities - PSAK 72     273.005.600
Dr Interest Expense - PSAK 72          12.062.711
    Cr Revenue - PSAK 72                   285.068.312
```

---

## 8. ✅ Kesimpulan

- PSAK 72 menuntut **pengakuan pendapatan berbasis pemenuhan jasa**, bukan saat uang diterima.
- Bunga dalam PSAK 72 adalah **komponen ekonomis**, bukan transaksi tunai.
- **Jadwal pengakuan pendapatan (amortisasi)** bersifat **terstruktur dan prediktif** — tidak tergantung pada waktu pembayaran.
- Dua kolom penerimaan menunjukkan:  
  - **Kas aktual**  
  - **Pendapatan akuntansi yang dijadwalkan**
- Jumlah transaksi bisa > 24 meskipun skema bertahap 24x, karena yang dihitung adalah **struktur kontrak**, bukan frekuensi pembayaran aktual.

---

## 9. 💡 Inti Pemahaman

> PSAK 72 memastikan bahwa **perusahaan tidak boleh buru-buru mengakui pendapatan hanya karena uang sudah masuk**,  
> dan bahwa perusahaan juga harus **mengakui nilai waktu uang** (bunga) jika pembayaran lebih dulu dari jasa.
