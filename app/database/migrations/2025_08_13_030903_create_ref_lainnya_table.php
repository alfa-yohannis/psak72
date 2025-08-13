<?php
// database/migrations/2025_08_13_000009_create_ref_lainnya_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('REF_LAINNYA', function (Blueprint $table) {
            $table->char('KD', 5)->primary();           // PK char(5)
            $table->string('DESKRIPSI', 200)->nullable();

            // Index tambahan untuk pencarian cepat berdasarkan DESKRIPSI
            $table->index('DESKRIPSI', 'ref_lainnya_deskripsi_idx');
        });
    }

    public function down(): void {
        Schema::dropIfExists('REF_LAINNYA');
    }
};
