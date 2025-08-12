<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\TipeBayarCluster;
use App\Models\UangMuka;
use App\Models\TahapBayarDP;   // gunakan nama model yang Anda pakai
use App\Models\BayarUangMuka;

class SuratPemesananSeeder extends Seeder
{
    public function run(): void
    {
        // Pastikan tipe bayar Angsuran ada
        TipeBayarCluster::firstOrCreate(['TIPE_BAYAR' => 'AN']);

        /* ============================================================
         * 1) CSMT3/128  (UANG_MUKA_ID = 7001)  — asumsi STOK_ID = 2
         * ============================================================ */
        UangMuka::updateOrCreate(
            ['UANG_MUKA_ID' => 7001],
            [
                'STOK_ID'         => 2,     // <-- ganti sesuai STOK CSMT3/128
                'TIPE_BAYAR_ANGS' => 'AN',
                'TAHAP'           => '000',
                'FLAG_AKTIF'      => 'A',
                'FLAG_BATAL'      => null,
                'STATUS'          => 'T',
            ]
        );

        // Jadwal due date 000..040 (seperti sebelumnya)
        $dueCsmt3128 = [
            ['000','2023-02-28'] 
        ];
        foreach ($dueCsmt3128 as [$tahapStr, $tanggal]) {
            TahapBayarDP::updateOrCreate(
                ['UANG_MUKA_ID' => 7001, 'TAHAP' => $tahapStr],
                ['TGL_JATUH_TEMPO' => Carbon::parse($tanggal)]
            );
        }

        // BAYAR_UANG_MUKA: line number 0..35 (sesuai data yang sudah diinput sebelumnya)
        BayarUangMuka::firstOrCreate(['UANG_MUKA_ID' => 7001, 'TAHAP' => 0]);
        // foreach (range(1, 35) as $line) {
        //     BayarUangMuka::firstOrCreate(['UANG_MUKA_ID' => 7001, 'TAHAP' => $line]);
        // }
        // 36..40 belum dibayar → tidak dibuat

        /* ============================================================
         * 2) G137  (UANG_MUKA_ID = 8001) — asumsi STOK_ID = 3
         *    Sisi kiri (Interest expense) = tahap 000..014 (historis)
         *    Sisi bawah (NILAI PV)        = tahap 015..043 (29 baris)
         * ============================================================ */
        UangMuka::updateOrCreate(
            ['UANG_MUKA_ID' => 8001],
            [
                'STOK_ID'         => 1,     // <-- ganti sesuai STOK untuk G137
                'TIPE_BAYAR_ANGS' => 'AN',
                'TAHAP'           => '000',
                'FLAG_AKTIF'      => 'A',
                'FLAG_BATAL'      => null,
                'STATUS'          => 'T',
            ]
        );

        // Jadwal historis (Interest expense) — tahap 000..014
        $histG137 = [
            ['000','2021-12-31']
        ];

        // Jadwal setelah cutoff (NILAI PV) — tahap 015..043
        $pvG137 = [
            // urut sesuai tabel “NILAI PV”
        ];

        foreach (array_merge($histG137, $pvG137) as [$tahapStr, $tanggal]) {
            TahapBayarDP::updateOrCreate(
                ['UANG_MUKA_ID' => 8001, 'TAHAP' => $tahapStr],
                ['TGL_JATUH_TEMPO' => Carbon::parse($tanggal)]
            );
        }

        // // BAYAR_UANG_MUKA untuk G137:
        BayarUangMuka::firstOrCreate(['UANG_MUKA_ID' => 8001, 'TAHAP' => 0]);
        // // Historis 000..014
        // foreach (range(0, 14) as $line) {
        //     BayarUangMuka::firstOrCreate(['UANG_MUKA_ID' => 8001, 'TAHAP' => $line]);
        // }
        // // Setelah cutoff 015..043 (29 baris)
        // foreach (range(15, 43) as $line) {
        //     BayarUangMuka::firstOrCreate(['UANG_MUKA_ID' => 8001, 'TAHAP' => $line]);
        // }
    }
}
