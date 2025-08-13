<?php
// database/seeders/PpjbCsmt3128AngsuranSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class Csmt3128AngsuranSeeder extends Seeder
{
    public function run(): void
    {
        $ppjbId = 6001; // GANTI jika PPJB_ID berbeda

        // Masters
        DB::table('KODE_TRANSAKSI')->updateOrInsert(['KD_TRANSAKSI'=>'DP'],   ['DESKRIPSI'=>'Down Payment / Booking']);
        DB::table('KODE_TRANSAKSI')->updateOrInsert(['KD_TRANSAKSI'=>'ANGS'], ['DESKRIPSI'=>'Angsuran']);
        DB::table('BANK_PENERIMA')->updateOrInsert(['KD_BANK_PENERIMA'=>'BNK01'], ['NM_BANK'=>'BANK DEFAULT']);

        // Jadwal due (dipertahankan seperti sebelumnya) ...
        $due = [
            ['000','2023-02-28','DP'], ['001','2023-03-31','ANGS'], ['002','2023-04-30','ANGS'],
            ['003','2023-05-31','ANGS'], ['004','2023-06-30','ANGS'], ['005','2023-07-31','ANGS'],
            ['006','2023-08-31','ANGS'], ['007','2023-09-30','ANGS'], ['008','2023-10-31','ANGS'],
            ['009','2023-11-30','ANGS'], ['010','2023-12-31','ANGS'], ['011','2024-01-31','ANGS'],
            ['012','2024-02-29','ANGS'], ['013','2024-03-31','ANGS'], ['014','2024-04-30','ANGS'],
            ['015','2024-05-31','ANGS'], ['016','2024-06-30','ANGS'], ['017','2024-07-31','ANGS'],
            ['018','2024-08-31','ANGS'], ['019','2024-09-30','ANGS'], ['020','2024-10-31','ANGS'],
            ['021','2024-11-30','ANGS'], ['022','2024-12-31','ANGS'], ['023','2025-01-31','ANGS'],
            ['024','2025-02-28','ANGS'], ['025','2025-03-31','ANGS'], ['026','2025-04-30','ANGS'],
            ['027','2025-05-31','ANGS'], ['028','2025-06-30','ANGS'], ['029','2025-07-31','ANGS'],
            ['030','2025-08-31','ANGS'], ['031','2025-09-30','ANGS'], ['032','2025-10-31','ANGS'],
            ['033','2025-11-30','ANGS'], ['034','2025-12-31','ANGS'], ['035','2026-01-31','ANGS'],
            ['036','2026-02-28','ANGS'], ['037','2026-03-31','ANGS'], ['038','2026-04-30','ANGS'],
            ['039','2026-05-31','ANGS'], ['040','2026-06-30','ANGS'],
        ];

        foreach ($due as [$tahap, $tgl, $kd]) {
            $exists = DB::table('JADWAL_ANGSURAN')
                ->where('PPJB_ID', $ppjbId)
                ->where('TAHAP', $tahap) // SQL Server CHAR compare masih cocok
                ->first();

            if ($exists) {
                DB::table('JADWAL_ANGSURAN')->where('JADWAL_ID', $exists->JADWAL_ID)->update([
                    'KD_TRANSAKSI'    => $kd,
                    'TGL_JATUH_TEMPO' => Carbon::parse($tgl),
                    'FLAG_AKTIF'      => 'A',
                    'CATATAN'         => null,
                ]);
            } else {
                DB::table('JADWAL_ANGSURAN')->insert([
                    'PPJB_ID'         => $ppjbId,
                    'KD_TRANSAKSI'    => $kd,
                    'TAHAP'           => $tahap,
                    'TGL_JATUH_TEMPO' => Carbon::parse($tgl),
                    'FLAG_AKTIF'      => 'A',
                    'CATATAN'         => null,
                ]);
            }
        }

        // FIX: trim key TAHAP (CHAR(5) → ada spasi kanan)
        $jadwalMap = DB::table('JADWAL_ANGSURAN')
            ->where('PPJB_ID', $ppjbId)
            ->selectRaw('RTRIM(TAHAP) as TAHAP, JADWAL_ID')   // <— penting
            ->get()
            ->pluck('JADWAL_ID', 'TAHAP'); // ['000' => 123, ...]

        // Pembayaran realisasi
        $pays = [
            ['000','2023-02-21',1025000000], ['001','2023-03-21',44331650],
            ['002','2023-04-18',80000000],   ['003','2023-05-15',44331650],
            ['004','2023-06-12',44331650],   ['005','2023-07-17',44331650],
            ['006','2023-08-21',44331650],   ['007','2023-09-13',44331650],
            ['008','2023-10-20',44331650],   ['009','2023-11-13',44331650],
            ['010','2023-12-20',44331650],   ['011','2024-01-16',44331650],
            ['012','2024-02-19',44331650],   ['013','2024-03-18',44331650],
            ['014','2024-04-17',44331650],   ['015','2024-05-20',44331650],
            ['016','2024-06-18',44331650],   ['017','2024-07-19',44331650],
            ['018','2024-08-19',44331650],   ['019','2024-09-20',44331650],
            ['020','2024-10-21',44331650],   ['021','2024-11-18',44331650],
            ['022','2024-12-17',44331650],   ['023','2025-01-27',44331650],
            ['024','2025-02-26',44331650],   ['025','2025-03-19',44331650],
            ['026','2025-04-22',44331650],   ['027','2025-05-20',44331650],
            ['028','2025-06-20',44331650],   ['029','2025-07-20',44331650],
            ['030','2025-08-20',44331650],   ['031','2025-09-20',44331650],
            ['032','2025-10-20',44331650],   ['033','2025-11-20',44331650],
            ['034','2025-12-20',44331650],   ['035','2026-01-20',44331648],
        ];

        foreach ($pays as [$tahap, $tglBayar, $nominal]) {
            $jadwalId = $jadwalMap[$tahap] ?? null; // sekarang match karena RTRIM

            DB::table('ANGSURAN')->updateOrInsert(
                [
                    'PPJB_ID'      => $ppjbId,
                    'JADWAL_ID'    => $jadwalId, // tidak null jika tahapan ada
                    'KD_TRANSAKSI' => $tahap === '000' ? 'DP' : 'ANGS',
                    'TGL_BAYAR'    => Carbon::parse($tglBayar),
                ],
                [
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
