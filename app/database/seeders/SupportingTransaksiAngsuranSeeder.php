<?php
// database/seeders/SupportingTransaksiAngsuranSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupportingTransaksiAngsuranSeeder extends Seeder
{
    public function run(): void
    {
        /* ============================
         * 1) KODE_TRANSAKSI (5 char)
         * Gunakan kode konsisten: DP, ANGS, PELUN
         * ============================ */
        DB::table('KODE_TRANSAKSI')->updateOrInsert(
            ['KD_TRANSAKSI' => 'DP'],
            ['DESKRIPSI' => 'Down Payment / Booking']
        );
        DB::table('KODE_TRANSAKSI')->updateOrInsert(
            ['KD_TRANSAKSI' => 'ANGS'],
            ['DESKRIPSI' => 'Angsuran Bulanan']
        );
        DB::table('KODE_TRANSAKSI')->updateOrInsert(
            ['KD_TRANSAKSI' => 'PELUN'],
            ['DESKRIPSI' => 'Pelunasan']
        );

        /* ============================
         * 2) BANK_PENERIMA
         * Berdasarkan migration: PK = KD_BANK_PENERIMA (char(5)), kolom NM_BANK
         * ============================ */
        DB::table('BANK_PENERIMA')->updateOrInsert(
            ['KD_BANK_PENERIMA' => 'BNK01'],
            ['NM_BANK' => 'BANK MANDIRI']
        );
        DB::table('BANK_PENERIMA')->updateOrInsert(
            ['KD_BANK_PENERIMA' => 'BNK02'],
            ['NM_BANK' => 'BANK BCA']
        );

        /* ============================
         * 3) PEMBELI_PPJB
         * Skema: PK komposit (PPJB_ID, NASABAH_ID)
         * (NASABAH_ID sudah disediakan oleh seeder lain)
         * ============================ */
        DB::table('PEMBELI_PPJB')->updateOrInsert(
            ['PPJB_ID' => 6001, 'NASABAH_ID' => 1001],
            []
        );
        DB::table('PEMBELI_PPJB')->updateOrInsert(
            ['PPJB_ID' => 6002, 'NASABAH_ID' => 1002],
            []
        );
    }
}
