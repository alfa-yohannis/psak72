<?php
// database/seeders/G137SerahTerimaSeeder.php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

class SerahTerimaSeeder extends Seeder
{
    /**
     * Hanya 1 serah terima untuk PPJB G137 (PPJB_ID = 6002).
     * ST (rencana & aktual) = Nov-23 → pakai 2023-11-30 sebagai tanggal serah terima.
     */
    public function run(): void
    {
        $ppjbId = 6002; // PPJB untuk blok G137 (mengikuti seeder PPJB sebelumnya)

        DB::table('SERAH_TERIMA')->updateOrInsert(
            ['PPJB_ID' => $ppjbId], // unique per PPJB
            [
                'NO_SURAT'         => 'ST/G137/2023/11',
                'TGL_SURAT'        => Carbon::parse('2023-11-01'),
                'TGL_SERAH_TERIMA' => Carbon::parse('2023-11-30'), // ST aktual Nov-23
                'NO_ST_ACC'        => 'STACC/G137/2023/11',
                'TGL_SS_ACC'       => Carbon::parse('2023-11-30'),
                'TGL_ENTRY_SS_ACC' => Carbon::parse('2023-11-30 17:00:00'),
            ]
        );
    }
}
