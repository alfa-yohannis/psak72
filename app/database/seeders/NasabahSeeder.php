<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Nasabah;

class NasabahSeeder extends Seeder
{
    public function run(): void
    {
        Nasabah::create([
            'NASABAH_ID' => 1001,
            'KD_TIPE_NASABAH' => '01',
            'NAMA' => 'Budi Santoso',
        ]);

        Nasabah::create([
            'NASABAH_ID' => 1002,
            'KD_TIPE_NASABAH' => '02',
            'NAMA' => 'PT Maju Jaya',
        ]);
    }
}
