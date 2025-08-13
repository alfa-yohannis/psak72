## 📘 PSAK 72: Jurnal Akuntansi untuk Serah Terima tetapi Belum Lunas

* [Main Dokumentasi PSAK72](main.md)
* [Link to test_brns2_017.md](test_brns2_017.md)
* [Belum dan Akui Jual Lunas](belum_dan_akui_jual_lunas.md)
* [PSAK 72 Diakui Lunas (Days)](psak_72_recog_lunas_days.md)
* [Diskonto](diskonto.md)
* [Test H026](test_h026.md)
* [Interest Income vs Interest Expense](interest_income_vs_interest_expense.md)
* [Akui Jual (Serah Terima) Belum Lunas](akui_jual_blm_lunas.md)
  
  
PSAK 72 menekankan bahwa pengakuan pendapatan dilakukan **saat kewajiban dipenuhi** (barang/jasa diserahkan), **bukan saat kas diterima**. Ini menciptakan kebutuhan untuk mencatat bunga dan nilai waktu uang secara eksplisit. Berikut adalah jurnal dan penjelasan untuk situasi tersebut:

---

### 🕐 1. Saat Belum Akui Jual (Sebelum Serah Terima)
Pada tahap ini, perusahaan telah menerima uang muka atau cicilan, tetapi belum menyerahkan barang/jasa, sehingga **tidak boleh mengakui pendapatan**. Namun, karena uang diterima lebih awal, perlu diakui **interest expense** (beban bunga), merepresentasikan "biaya waktu" menahan kas sebelum kewajiban terpenuhi.

#### Contoh:
```
Tanggal 31/12/2021
(No entry)

Tanggal 28/02/2022
Dr  Interest expense - PSAK 72           458,333
    Cr  Contract liabilities - PSAK 72          458,333
    (Efek bunga dari penerimaan uang sebelum serah terima)

Tanggal 31/03/2022
Dr  Interest expense - PSAK 72         2,752,101
    Cr  Contract liabilities - PSAK 72        2,752,101
    (Efek akrual bunga bulan Maret)
```

---

### ✅ 2. Saat Akui Jual (Setelah Serah Terima - ST)
Setelah barang/jasa diserahkan, perusahaan telah memenuhi kewajiban, sehingga **pendapatan diakui penuh**, meskipun pembayaran belum lunas. Jurnal meliputi:
- Pembalikan contract liabilities
- Pengakuan accounts receivables (piutang)
- Pemisahan antara nilai pokok dan bunga

#### Contoh:
```
Dr  Contract liabilities                        13,976,648,626
Dr  Contract liabilities - PSAK 72                 497,927,219
Dr  Accounts receivables                         16,934,905,010
Dr  Revenue PSAK 72                                 963,085,701
    Cr  Accounts receivables (PV from 4 years)          963,085,701
    Cr  Revenue PSAK 72                                497,927,219
    Cr  Revenue                                      30,911,553,636
```

---

### 💰 3. Saat Penerimaan Uang Konsumen Setelah ST
Setiap kali pelanggan membayar, perusahaan mencatat:
- Penerimaan kas
- Komponen bunga sebagai **interest income**
- Pengurangan piutang

#### Contoh:
```
Dr  Bank                                         470,414,028
Dr  Accounts receivables (PV from 4 years)        73,204,168
    Cr  Interest income from PSAK 72                   73,204,168
    Cr  Accounts receivables                       543,618,196
```

---

## 📚 Filosofi Interest Income dan Interest Expense

- **Interest Expense** muncul ketika pelanggan membayar lebih awal (sebelum serah terima). Uang tersebut belum boleh diakui sebagai pendapatan, namun membawa manfaat ekonomi bagi perusahaan (misalnya untuk digunakan), sehingga dicatat sebagai beban bunga atas kontrak yang belum dipenuhi.
  
- **Interest Income** muncul ketika pelanggan membayar setelah serah terima, secara bertahap. Karena perusahaan menanggung waktu tunggu untuk menerima kas secara penuh, bunga ini menjadi bagian dari pendapatan yang diakui secara akrual berdasarkan waktu.

---

### 🔎 Ringkasan Akuntansi PSAK 72

| Tahap Waktu          | Jurnal Utama                                   | Keterangan                                    |
|----------------------|--------------------------------------------------|-----------------------------------------------|
| Belum ST             | Interest Expense vs Contract Liabilities         | Bunga atas uang yang diterima sebelum kewajiban dipenuhi |
| Saat ST              | Revenue, A/R, dan kontrak dibalik                | Pendapatan penuh diakui saat kewajiban selesai |
| Setelah ST (Cicilan) | Bank, A/R, dan Interest Income                   | Bunga diakui bertahap sesuai nilai waktu uang  |

---

📌 Pendekatan ini menciptakan **akuntabilitas nilai waktu uang**, mencerminkan realitas ekonomi, serta menjaga **prinsip akrual** dan **kesesuaian pendapatan dan beban** secara konsisten sesuai PSAK 72.
