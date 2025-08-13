<?php
// database/seeders/PpjbG137Seeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class G137AngsuranSeeder extends Seeder
{
    public function run(): void
    {
        $ppjbId = 6002; // PPJB G137

        // === Masters ============================================================
        DB::table('KODE_TRANSAKSI')->updateOrInsert(
            ['KD_TRANSAKSI' => 'ANGS'], ['DESKRIPSI' => 'Angsuran']
        );
        DB::table('BANK_PENERIMA')->updateOrInsert(
            ['KD_BANK_PENERIMA' => 'BNK01'], ['NM_BANK' => 'BANK DEFAULT']
        );

        // === 1) Jadwal Angsuran (NILAI PV) =====================================
        // Tahap dibuat berurutan '001'..'029' mengikuti urutan list di sheet.
        $pvSchedule = [
            ['001','2023-12-31'],
            ['002','2024-05-31'],
            ['003','2024-08-31'],
            ['004','2024-10-31'],
            ['005','2024-11-30'],
            ['006','2025-01-31'],
            ['007','2025-02-28'],
            ['008','2024-06-30'],
            ['009','2024-07-31'],
            ['010','2024-09-30'],
            ['011','2024-12-31'],
            ['012','2025-03-31'],
            ['013','2025-04-30'],
            ['014','2025-05-31'],
            ['015','2025-06-30'],
            ['016','2025-07-31'],
            ['017','2025-08-31'],
            ['018','2025-09-30'],
            ['019','2025-10-31'],
            ['020','2025-11-30'],
            ['021','2025-12-31'],
            ['022','2026-01-31'],
            ['023','2026-02-28'],
            ['024','2026-03-31'],
            ['025','2026-04-30'],
            ['026','2026-05-31'],
            ['027','2026-06-30'],
            ['028','2026-07-31'],
            ['029','2026-08-31'],
        ];

        foreach ($pvSchedule as [$tahap, $tgl]) {
            DB::table('JADWAL_ANGSURAN')->updateOrInsert(
                ['PPJB_ID' => $ppjbId, 'TAHAP' => $tahap],
                [
                    'KD_TRANSAKSI'    => 'ANGS',
                    'TGL_JATUH_TEMPO' => Carbon::parse($tgl),
                    'FLAG_AKTIF'      => 'A',
                    'CATATAN'         => null,
                ]
            );
        }

        // util: cari JADWAL_ID berdasarkan tanggal jatuh tempo (aman di SQL Server)
        $findJadwalIdByDate = function (string $date) use ($ppjbId) {
            return DB::table('JADWAL_ANGSURAN')
                ->where('PPJB_ID', $ppjbId)
                ->whereRaw('CAST(TGL_JATUH_TEMPO AS DATE) = ?', [$date])
                ->value('JADWAL_ID');
        };

        // === 2) Realisasi sebelum PV (tanpa JADWAL_ID) =========================
        $paysBefore = [
            ['2021-12-31', 100_000_000],
            ['2022-02-28', 500_000_000],
            ['2022-03-31', 1_223_600_000],
            ['2022-04-30', 2_947_703_056],
            ['2022-06-30', 1_143_068_933],
            ['2022-08-31', 1_000_000_000],
            ['2022-10-31',   884_066_692],
            ['2022-11-30', 1_972_864_375],
            ['2022-12-31',   442_033_346],
            ['2023-01-31',   470_414_028],
            ['2023-03-31',   470_414_028],
            ['2023-04-30',   470_414_028],
            ['2023-06-30',   470_414_028],
            ['2023-07-31',   940_828_056],
            ['2023-08-31',   940_828_056],
        ];
        foreach ($paysBefore as [$tgl, $nominal]) {
            DB::table('ANGSURAN')->updateOrInsert(
                ['PPJB_ID' => $ppjbId, 'KD_TRANSAKSI' => 'ANGS', 'TGL_BAYAR' => Carbon::parse($tgl), 'JADWAL_ID' => null],
                ['KD_BANK_PENERIMA' => 'BNK01', 'JML_BAYAR' => $nominal, 'DPP' => 0, 'PPN' => 0]
            );
        }

        // === 3) Realisasi sesuai PV (link ke JADWAL_ID berdasarkan tanggal) =====
        // (daftar yang kamu kirim)
        $paysAfter = [
            ['2023-12-31', 470_414_028],
            ['2024-05-31', 940_828_056],
            ['2024-08-31', 940_828_056],
            ['2024-10-31', 940_828_056],
            ['2024-11-30', 1_411_242_084],
            ['2025-01-31', 940_828_056],
            ['2025-02-28', 940_828_056],

            // baris tunggal 470,414,028
            ['2024-06-30', 470_414_028],
            ['2024-07-31', 470_414_028],
            ['2024-09-30', 470_414_028],
            ['2024-12-31', 470_414_028],
            ['2025-03-31', 470_414_028],
            ['2025-04-30', 470_414_028],
            ['2025-05-31', 470_414_028],
            ['2025-06-30', 470_414_028],
            ['2025-07-31', 470_414_028],
            ['2025-08-31', 470_414_028],
            ['2025-09-30', 470_414_028],
            ['2025-10-31', 470_414_028],
            ['2025-11-30', 470_414_028],
            ['2025-12-31', 470_414_028],
            ['2026-01-31', 470_414_028],
            ['2026-02-28', 470_414_028],
            ['2026-03-31', 470_414_028],
            ['2026-04-30', 470_414_028],
            ['2026-05-31', 470_414_028],
            ['2026-06-30', 470_414_028],
            ['2026-07-31', 470_414_028],
            ['2026-08-31', 470_414_030],
        ];

        foreach ($paysAfter as [$tgl, $nominal]) {
            $tglDate   = Carbon::parse($tgl)->toDateString();
            $jadwalId  = $findJadwalIdByDate($tglDate); // -> null jika jadwal salah/absen

            DB::table('ANGSURAN')->updateOrInsert(
                [
                    'PPJB_ID'      => $ppjbId,
                    'TGL_BAYAR'    => Carbon::parse($tgl),
                    'KD_TRANSAKSI' => 'ANGS',
                ],
                [
                    'JADWAL_ID'        => $jadwalId,
                    'KD_BANK_PENERIMA' => 'BNK01',
                    'JML_BAYAR'        => $nominal,
                    'DPP'              => 0,
                    'PPN'              => 0,
                    'NO_KUITANSI'      => null,
                    'NO_FAKTUR'        => null,
                ]
            );
        }
    }
}
