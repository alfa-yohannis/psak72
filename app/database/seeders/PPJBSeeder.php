<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\{Biaya, PPJB, TahapBayarPPJB, BiayaPPJB, PembeliPPJB, KuasaPPJB};

class PPJBSeeder extends Seeder
{
    private const STOK_ID_CSMT = 2;    // CSMT3/128
    private const STOK_ID_G137 = 1;    // G137
    private const PEMBELI_ID = 1001;   // Budi Santoso
    private const KUASA_ID   = 1002;   // PT Maju Jaya

    public function run(): void
    {
        Biaya::firstOrCreate(['KD_BIAYA' => 'HARGA']);
        Biaya::firstOrCreate(['KD_BIAYA' => 'DISC']);
        Biaya::firstOrCreate(['KD_BIAYA' => 'PPN']);

        /* ------------ PPJB: CSMT3/128 (6001) ------------ */
        PPJB::updateOrCreate(
            ['PPJB_ID' => 6001],
            ['STOK_ID' => self::STOK_ID_CSMT, 'TIPE_BAYAR' => 'AN']
        );

        // Jadwal KONTRAK (fixed) — TAHAP_BAYAR_PPJB 000..040
        $csmtContract = [
            '2023-02-28','2023-03-31','2023-04-30','2023-05-31','2023-06-30',
            '2023-07-31','2023-08-31','2023-09-30','2023-10-31','2023-11-30',
            '2023-12-31','2024-01-31','2024-02-29','2024-03-31','2024-04-30',
            '2024-05-31','2024-06-30','2024-07-31','2024-08-31','2024-09-30',
            '2024-10-31','2024-11-30','2024-12-31','2025-01-31','2025-02-28',
            '2025-03-31','2025-04-30','2025-05-31','2025-06-30','2025-07-31',
            '2025-08-31','2025-09-30','2025-10-31','2025-11-30','2025-12-31',
            '2026-01-31','2026-02-28','2026-03-31','2026-04-30','2026-05-31',
            '2026-06-30',
        ];
        foreach ($csmtContract as $i => $date) {
            $tahap = str_pad((string) $i, 3, '0', STR_PAD_LEFT);
            TahapBayarPPJB::updateOrCreate(
                ['PPJB_ID' => 6001, 'TAHAP' => $tahap],
                ['TGL_JATUH_TEMPO' => Carbon::parse($date)]
            );
        }

        // Biaya PPJB
        BiayaPPJB::updateOrCreate(['PPJB_ID' => 6001, 'KD_BIAYA' => 'HARGA']);
        BiayaPPJB::updateOrCreate(['PPJB_ID' => 6001, 'KD_BIAYA' => 'DISC']);
        BiayaPPJB::updateOrCreate(['PPJB_ID' => 6001, 'KD_BIAYA' => 'PPN']);

        // Pembeli & Kuasa
        PembeliPPJB::updateOrCreate(['PPJB_ID' => 6001, 'NASABAH_ID' => self::PEMBELI_ID]);
        KuasaPPJB::updateOrCreate(['PPJB_ID' => 6001, 'NASABAH_ID' => self::KUASA_ID]);

        /* ------------ PPJB: G137 (6002) ------------ */
        PPJB::updateOrCreate(
            ['PPJB_ID' => 6002],
            ['STOK_ID' => self::STOK_ID_G137, 'TIPE_BAYAR' => 'AN']
        );

        $g137Contract = [
            '2023-12-31','2024-05-31','2024-08-31','2024-10-31','2024-11-30',
            '2025-01-31','2025-02-28','2024-06-30','2024-07-31','2024-09-30',
            '2024-12-31','2025-03-31','2025-04-30','2025-05-31','2025-06-30',
            '2025-07-31','2025-08-31','2025-09-30','2025-10-31','2025-11-30',
            '2025-12-31','2026-01-31','2026-02-28','2026-03-31','2026-04-30',
            '2026-05-31','2026-06-30','2026-07-31','2026-08-31',
        ];
        foreach ($g137Contract as $i => $date) {
            $tahap = str_pad((string) $i, 3, '0', STR_PAD_LEFT);
            TahapBayarPPJB::updateOrCreate(
                ['PPJB_ID' => 6002, 'TAHAP' => $tahap],
                ['TGL_JATUH_TEMPO' => Carbon::parse($date)]
            );
        }

        BiayaPPJB::updateOrCreate(['PPJB_ID' => 6002, 'KD_BIAYA' => 'HARGA']);
        BiayaPPJB::updateOrCreate(['PPJB_ID' => 6002, 'KD_BIAYA' => 'DISC']);
        BiayaPPJB::updateOrCreate(['PPJB_ID' => 6002, 'KD_BIAYA' => 'PPN']);

        PembeliPPJB::updateOrCreate(['PPJB_ID' => 6002, 'NASABAH_ID' => self::PEMBELI_ID]);
        KuasaPPJB::updateOrCreate(['PPJB_ID' => 6002, 'NASABAH_ID' => self::KUASA_ID]);
    }
}
