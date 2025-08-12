<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipeNasabah;

class TipeNasabahSeeder extends Seeder
{
    public function run(): void
    {
        TipeNasabah::create([
            'KD_TIPE_NASABAH' => '01',
            'DESKRIPSI' => 'Perorangan',
        ]);

        TipeNasabah::create([
            'KD_TIPE_NASABAH' => '02',
            'DESKRIPSI' => 'Perusahaan',
        ]);
    }
}
