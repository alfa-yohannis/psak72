# 📊 Ringkasan Pengakuan Pendapatan PSAK 72 untuk Proyek BRNS2/017

* [Main Dokumentasi PSAK72](main.md)
* [Link to test_brns2_017.md](test_brns2_017.md)
* [Belum dan Akui Jual Lunas](belum_dan_akui_jual_lunas.md)
* [PSAK 72 Diakui Lunas (Days)](psak_72_recog_lunas_days.md)
* [Diskonto](diskonto.md)
* [Test H026](test_h026.md)
* [Interest Income vs Interest Expense](interest_income_vs_interest_expense.md)
* [Akui Jual (Serah Terima) Belum Lunas](akui_jual_blm_lunas.md)
  

## 📌 Informasi Umum
- **Blok**: BRNS2/017  
- **Tanggal Mulai (ST)**: Jan-26  
- **Rencana Selesai (ST Rencana)**: Jan-26  
- **Tingkat Bunga**:
  - Bulanan: 0,43%
  - Tahunan: 5,16%

---

## 💵 Pembayaran dari Pelanggan
Tabel sebelah kiri menunjukkan:
- **Tanggal Pembayaran**: dari 08-Feb-23 hingga 20-Jan-26  
- **Jumlah Pembayaran**: contoh: 25.000.000; 100.000.000; dst.  
- **Tanggal Faktur**: saat tagihan diterbitkan  

**Total Nilai Kontrak**: `Rp 2.576.607.748`

---

## 📅 Jadwal Pengakuan Pendapatan Bulanan (Amortisasi)

| Kolom | Keterangan |
|-------|------------|
| `Month` | Bulan ke-n dari awal kontrak (0–40) |
| `Tanggal Pengakuan` | Tanggal pengakuan pendapatan bulanan |
| `Pendapatan` | Pendapatan bulanan tetap (Rp 44.331.650) |
| `Beban Bunga` | Perhitungan bunga bulanan (metode suku bunga efektif) |
| `Kewajiban Kontrak` | Sisa kewajiban kontrak yang belum diakui |

**Pola Umum**:
- Beban bunga meningkat dari waktu ke waktu.
- Kewajiban kontrak bertambah seiring akumulasi bunga dan penangguhan pengakuan.

---

## 📘 Jurnal Akuntansi (Akrual Pendapatan)

### 📅 Pada 31-Jan-2026 (Bulan ke-35) — ST Aktual
Seluruh sisa kewajiban kontrak diakui sekaligus:

```text
Dr  Beban Bunga (Interest Expense)     12.062.711
    Cr  Pendapatan (PSAK 72)              285.068.312
```

Artinya:
- Seluruh pendapatan tangguhan langsung diakui karena terjadi peristiwa pemicu (misalnya: pelunasan, pemakaian penuh, atau penghentian kontrak).
- Bulan 36–40 tidak lagi melakukan pengakuan pendapatan.

---

## 🟨 Penjelasan Warna Kuning
Sel berwarna kuning menandakan:
- **Bulan ke-35**: Pengakuan seluruh sisa pendapatan karena terjadinya `ST Aktual`.
- **Bulan ke-36 s.d. 40**: Tidak dilakukan pengakuan karena seluruhnya sudah dicatat lebih awal.

---

## ✅ Rekonsiliasi Nilai
| Keterangan                         | Jumlah         |
|------------------------------------|----------------|
| Total Nilai Kontrak                | 2.576.607.748  |
| Sisa Kewajiban (PSAK 72)           | 285.068.312    |
| Diakui Saat ST Aktual              | 285.068.312    |
| Selisih                            | 0              |

Tidak ada selisih antara perhitungan dan realisasi — artinya **perhitungan sudah akurat dan sesuai PSAK 72**.

---

## 🧾 Kesimpulan
- Kontrak berlangsung dari **Februari 2023 hingga Januari 2026**
- Pendapatan diakui per bulan sebesar **Rp 44.331.650**
- Pengakuan akhir dipercepat pada **Januari 2026**
- Telah sesuai dengan standar **PSAK 72** (Pendapatan dari Kontrak dengan Pelanggan)
