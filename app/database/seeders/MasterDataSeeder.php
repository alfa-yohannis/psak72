<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Perusahaan;
use App\Models\Sektor;
use App\Models\ModelUnit;
use App\Models\Lokasi;
use App\Models\Tower;
use App\Models\Jenis;
use App\Models\Tipe;
use App\Models\Stok;

class MasterDataSeeder extends Seeder
{
    public function run(): void
    {
        // --- PERUSAHAAN ---
        Perusahaan::insert([
            ['KD_PERUSAHAAN' => 'PR001'],
            ['KD_PERUSAHAAN' => 'PR002'],
        ]);

        // --- SEKTOR ---
        Sektor::insert([
            ['KD_SEKTOR' => 'SK001', 'KD_PERUSAHAAN' => 'PR001'],
            ['KD_SEKTOR' => 'SK002', 'KD_PERUSAHAAN' => 'PR002'],
        ]);

        // --- MODEL ---
        ModelUnit::insert([
            ['KD_MODEL' => 'MD001', 'KD_SEKTOR' => 'SK001'],
            ['KD_MODEL' => 'MD002', 'KD_SEKTOR' => 'SK002'],
        ]);

        // --- LOKASI ---
        Lokasi::insert([
            ['KD_LOKASI' => '26'],
            ['KD_LOKASI' => '017'],
        ]);

        // --- TBL_TOWER ---
        Tower::insert([
            ['KD_TOWER' => 'T001'],
            ['KD_TOWER' => 'T002'],
        ]);

        // --- JENIS ---
        Jenis::insert([
            ['KD_JENIS' => 'J001'],
            ['KD_JENIS' => 'J002'],
        ]);

        // --- TIPE ---
        Tipe::insert([
            ['KD_TIPE' => 'H0', 'KD_JENIS' => 'J001'],
            ['KD_TIPE' => 'BRNS2', 'KD_JENIS' => 'J002'],
        ]);

        // --- STOK ---
        Stok::insert([
            [
                'STOK_ID'       => 1,
                'KD_PERUSAHAAN' => 'PR001',
                'KD_TIPE'       => 'H0',       // first segment of H0/26
                'KD_JENIS'      => 'J001',
                'KD_LOKASI'     => '26',       // second segment of H0/26
                'KD_TOWER'      => 'T001',
            ],
            [
                'STOK_ID'       => 2,
                'KD_PERUSAHAAN' => 'PR002',
                'KD_TIPE'       => 'BRNS2',    // first segment of BRNS2/017
                'KD_JENIS'      => 'J002',
                'KD_LOKASI'     => '017',      // second segment of BRNS2/017
                'KD_TOWER'      => 'T002',
            ],
        ]);
    }
}
