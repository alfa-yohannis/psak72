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
            ['000','2023-02-28'], ['001','2023-03-31'], ['002','2023-04-30'],
            ['003','2023-05-31'], ['004','2023-06-30'], ['005','2023-07-31'],
            ['006','2023-08-31'], ['007','2023-09-30'], ['008','2023-10-31'],
            ['009','2023-11-30'], ['010','2023-12-31'], ['011','2024-01-31'],
            ['012','2024-02-29'], ['013','2024-03-31'], ['014','2024-04-30'],
            ['015','2024-05-31'], ['016','2024-06-30'], ['017','2024-07-31'],
            ['018','2024-08-31'], ['019','2024-09-30'], ['020','2024-10-31'],
            ['021','2024-11-30'], ['022','2024-12-31'], ['023','2025-01-31'],
            ['024','2025-02-28'], ['025','2025-03-31'], ['026','2025-04-30'],
            ['027','2025-05-31'], ['028','2025-06-30'], ['029','2025-07-31'],
            ['030','2025-08-31'], ['031','2025-09-30'], ['032','2025-10-31'],
            ['033','2025-11-30'], ['034','2025-12-31'], ['035','2026-01-31'],
            ['036','2026-02-28'], ['037','2026-03-31'], ['038','2026-04-30'],
            ['039','2026-05-31'], ['040','2026-06-30'],
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
            ['000','2021-12-31'],
            ['001','2022-02-28'],
            ['002','2022-03-31'],
            ['003','2022-04-30'],
            ['004','2022-06-30'],
            ['005','2022-08-31'],
            ['006','2022-10-31'],
            ['007','2022-11-30'],
            ['008','2022-12-31'],
            ['009','2023-01-31'],
            ['010','2023-03-31'],
            ['011','2023-04-30'],
            ['012','2023-06-30'],
            ['013','2023-07-31'],
            ['014','2023-08-31'],
        ];

        // Jadwal setelah cutoff (NILAI PV) — tahap 015..043
        $pvG137 = [
            // urut sesuai tabel “NILAI PV”
            ['015','2023-12-31'], ['016','2024-05-31'], ['017','2024-08-31'],
            ['018','2024-10-31'], ['019','2024-11-30'], ['020','2025-01-31'],
            ['021','2025-02-28'], ['022','2024-06-30'], ['023','2024-07-31'],
            ['024','2024-09-30'], ['025','2024-12-31'], ['026','2025-03-31'],
            ['027','2025-04-30'], ['028','2025-05-31'], ['029','2025-06-30'],
            ['030','2025-07-31'], ['031','2025-08-31'], ['032','2025-09-30'],
            ['033','2025-10-31'], ['034','2025-11-30'], ['035','2025-12-31'],
            ['036','2026-01-31'], ['037','2026-02-28'], ['038','2026-03-31'],
            ['039','2026-04-30'], ['040','2026-05-31'], ['041','2026-06-30'],
            ['042','2026-07-31'], ['043','2026-08-31'],
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
