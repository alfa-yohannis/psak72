<?php
/* =================================================================================
 * 4) Seeder PPJB (jadwal kontrak FIX + jadwal angsuran OPERASIONAL)
 *    file: database/seeders/PPJBScheduleSeeder.php
 *    NOTE: STOK & NASABAH diasumsikan SUDAH ada dari seeder lain.
 * ================================================================================= */
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use App\Models\{Biaya, PPJB, TahapBayarPPJB, JadwalAngsuran, BiayaPPJB, PembeliPPJB, KuasaPPJB};

class PPJBSeeder extends Seeder
{
    private const STOK_ID_CSMT = 2;    // CSMT3/128
    private const STOK_ID_G137 = 1;    // G137
    private const PEMBELI_ID = 1001; // Budi Santoso
    private const KUASA_ID = 1002; // PT Maju Jaya

    public function run(): void
    {
        Biaya::firstOrCreate(['KD_BIAYA' => 'HARGA']);
        Biaya::firstOrCreate(['KD_BIAYA' => 'DISC']);
        Biaya::firstOrCreate(['KD_BIAYA' => 'PPN']);

        /* ------------ PPJB: CSMT3/128 (6001) ------------ */
        $PPJB1 = PPJB::updateOrCreate(
            ['PPJB_ID' => 6001],
            ['STOK_ID' => self::STOK_ID_CSMT, 'TIPE_BAYAR' => 'AN'] // CAPS
        );

        // (A) Jadwal KONTRAK (fixed) — TAHAP_BAYAR_PPJB 000..040
        $csmtContract = [
            '2023-02-28',
            '2023-03-31',
            '2023-04-30',
            '2023-05-31',
            '2023-06-30',
            '2023-07-31',
            '2023-08-31',
            '2023-09-30',
            '2023-10-31',
            '2023-11-30',
            '2023-12-31',
            '2024-01-31',
            '2024-02-29',
            '2024-03-31',
            '2024-04-30',
            '2024-05-31',
            '2024-06-30',
            '2024-07-31',
            '2024-08-31',
            '2024-09-30',
            '2024-10-31',
            '2024-11-30',
            '2024-12-31',
            '2025-01-31',
            '2025-02-28',
            '2025-03-31',
            '2025-04-30',
            '2025-05-31',
            '2025-06-30',
            '2025-07-31',
            '2025-08-31',
            '2025-09-30',
            '2025-10-31',
            '2025-11-30',
            '2025-12-31',
            '2026-01-31',
            '2026-02-28',
            '2026-03-31',
            '2026-04-30',
            '2026-05-31',
            '2026-06-30',
        ];
        foreach ($csmtContract as $i => $date) {
            $tahap = str_pad((string) $i, 3, '0', STR_PAD_LEFT);
            TahapBayarPPJB::updateOrCreate(
                ['PPJB_ID' => 6001, 'TAHAP' => $tahap],
                ['TGL_JATUH_TEMPO' => Carbon::parse($date)]
            );
        }

        // (B) Jadwal ANGSURAN (operasional) — contoh: beda 2 tahap untuk ilustrasi
        $csmtBilling = $csmtContract;
        // contoh perubahan: tahap 010 & 011 dimundurkan 5 hari
        $csmtBilling[10] = '2024-01-05';
        $csmtBilling[11] = '2024-02-05';
        $this->seedBilling(6001, $csmtBilling, 'CSMT3/128 revised');

        // (C) Biaya PPJB
        BiayaPPJB::updateOrCreate(['PPJB_ID' => 6001, 'KD_BIAYA' => 'HARGA']);
        BiayaPPJB::updateOrCreate(['PPJB_ID' => 6001, 'KD_BIAYA' => 'DISC']);
        BiayaPPJB::updateOrCreate(['PPJB_ID' => 6001, 'KD_BIAYA' => 'PPN']);

        // Pembeli & Kuasa (opsional aktifkan bila perlu)
        PembeliPPJB::updateOrCreate(['PPJB_ID' => 6001, 'NASABAH_ID' => self::PEMBELI_ID]);
        KuasaPPJB::updateOrCreate(['PPJB_ID' => 6001, 'NASABAH_ID' => self::KUASA_ID]);

        /* ------------ PPJB: G137 (6002) ------------ */
        $PPJB2 = PPJB::updateOrCreate(
            ['PPJB_ID' => 6002],
            ['STOK_ID' => self::STOK_ID_G137, 'TIPE_BAYAR' => 'AN']
        );

        // (A) Jadwal KONTRAK (fixed) — 000..028 dari daftar NILAI PV
        $g137Contract = [
            '2023-12-31',
            '2024-05-31',
            '2024-08-31',
            '2024-10-31',
            '2024-11-30',
            '2025-01-31',
            '2025-02-28',
            '2024-06-30',
            '2024-07-31',
            '2024-09-30',
            '2024-12-31',
            '2025-03-31',
            '2025-04-30',
            '2025-05-31',
            '2025-06-30',
            '2025-07-31',
            '2025-08-31',
            '2025-09-30',
            '2025-10-31',
            '2025-11-30',
            '2025-12-31',
            '2026-01-31',
            '2026-02-28',
            '2026-03-31',
            '2026-04-30',
            '2026-05-31',
            '2026-06-30',
            '2026-07-31',
            '2026-08-31',
        ];
        foreach ($g137Contract as $i => $date) {
            $tahap = str_pad((string) $i, 3, '0', STR_PAD_LEFT);
            TahapBayarPPJB::updateOrCreate(
                ['PPJB_ID' => 6002, 'TAHAP' => $tahap],
                ['TGL_JATUH_TEMPO' => Carbon::parse($date)]
            );
        }

        // (B) Jadwal ANGSURAN (operasional) — contoh: beda 1 tahap (dimajukan 3 hari)
        $g137Billing = $g137Contract;
        $g137Billing[5] = '2025-01-28';
        $this->seedBilling(6002, $g137Billing, 'G137 revised');

        // (C) Biaya PPJB 
        BiayaPPJB::updateOrCreate(['PPJB_ID' => 6002, 'KD_BIAYA' => 'HARGA']);
        BiayaPPJB::updateOrCreate(['PPJB_ID' => 6002, 'KD_BIAYA' => 'DISC']);
        BiayaPPJB::updateOrCreate(['PPJB_ID' => 6002, 'KD_BIAYA' => 'PPN']);

        PembeliPPJB::updateOrCreate(['PPJB_ID' => 6002, 'NASABAH_ID' => self::PEMBELI_ID]);
        KuasaPPJB::updateOrCreate(['PPJB_ID' => 6002, 'NASABAH_ID' => self::KUASA_ID]);
    }

    private function seedBilling(int $PPJBId, array $dates, string $note = null): void
    {
        foreach ($dates as $i => $date) {
            $tahap = str_pad((string) $i, 3, '0', STR_PAD_LEFT);
            JadwalAngsuran::updateOrCreate(
                ['PPJB_ID' => $PPJBId, 'TAHAP' => $tahap],
                [
                    'TGL_JATUH_TEMPO' => Carbon::parse($date),
                ]
            );
        }
    }
}
