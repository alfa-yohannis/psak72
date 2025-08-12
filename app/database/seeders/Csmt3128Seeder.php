<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\TipeBayarCluster;
use App\Models\UangMuka;
use App\Models\TahapBayarDP;
use App\Models\BayarUangMuka;

class Csmt3128Seeder extends Seeder
{
    public function run(): void
    {
        // Ensure parameter for angsuran exists
        TipeBayarCluster::firstOrCreate(['TIPE_BAYAR' => 'AN']);

        // Header for block CSMT3/128 (adjust STOK_ID if needed)
        UangMuka::updateOrCreate(
            ['UANG_MUKA_ID' => 7001],
            [
                'STOK_ID'         => 2,    // <-- STOK_ID for CSMT3/128 in your DB
                'TIPE_BAYAR_ANGS' => 'AN',
                'TAHAP'           => '000', // pointer; this column is on UANG_MUKA (char), not related to BAYAR_UANG_MUKA
                'FLAG_AKTIF'      => 'A',
                'FLAG_BATAL'      => null,
                'STATUS'          => 'T',
            ]
        );

        // --- Schedule (due dates) tahap 000..040 in TAHAP_BAYAR_DP (char(5)) ---
        $due = [
            ['000','2023-02-28'],
            ['001','2023-03-31'], ['002','2023-04-30'], ['003','2023-05-31'],
            ['004','2023-06-30'], ['005','2023-07-31'], ['006','2023-08-31'],
            ['007','2023-09-30'], ['008','2023-10-31'], ['009','2023-11-30'],
            ['010','2023-12-31'], ['011','2024-01-31'], ['012','2024-02-29'],
            ['013','2024-03-31'], ['014','2024-04-30'], ['015','2024-05-31'],
            ['016','2024-06-30'], ['017','2024-07-31'], ['018','2024-08-31'],
            ['019','2024-09-30'], ['020','2024-10-31'], ['021','2024-11-30'],
            ['022','2024-12-31'], ['023','2025-01-31'], ['024','2025-02-28'],
            ['025','2025-03-31'], ['026','2025-04-30'], ['027','2025-05-31'],
            ['028','2025-06-30'], ['029','2025-07-31'], ['030','2025-08-31'],
            ['031','2025-09-30'], ['032','2025-10-31'], ['033','2025-11-30'],
            ['034','2025-12-31'], ['035','2026-01-31'], ['036','2026-02-28'],
            ['037','2026-03-31'], ['038','2026-04-30'], ['039','2026-05-31'],
            ['040','2026-06-30'],
        ];
        foreach ($due as [$tahapStr, $tanggal]) {
            TahapBayarDP::updateOrCreate(
                ['UANG_MUKA_ID' => 7001, 'TAHAP' => $tahapStr],
                ['TGL_JATUH_TEMPO' => Carbon::parse($tanggal)]
            );
        }

        // --- BAYAR_UANG_MUKA now only stores line numbers (numeric tahap) per UANG_MUKA_ID ---

        // Booking batch (February 2023): we record as line 0
        BayarUangMuka::firstOrCreate([
            'UANG_MUKA_ID' => 7001,
            'TAHAP'        => 0,      // numeric(3)
        ]);
    }
}
