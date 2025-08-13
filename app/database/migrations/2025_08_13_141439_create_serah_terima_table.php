<?php
// database/migrations/2025_08_13_204900_create_serah_terima_table.php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('SERAH_TERIMA', function (Blueprint $table) {
            // PK
            $table->bigIncrements('SERAH_TERIMA_ID');     // numeric(18) identity

            // FK ke PPJB
            $table->unsignedBigInteger('PPJB_ID');         // numeric(18)

            // Kolom dokumen & tanggal
            $table->string('NO_SURAT', 30)->nullable();
            $table->dateTime('TGL_SURAT')->nullable();
            $table->dateTime('TGL_SERAH_TERIMA')->nullable();

            // Approval SS
            $table->string('NO_ST_ACC', 30)->nullable();
            $table->dateTime('TGL_SS_ACC')->nullable();
            $table->dateTime('TGL_ENTRY_SS_ACC')->nullable();

            // Foreign key (hindari multiple cascade paths di SQL Server)
            $table->foreign('PPJB_ID')
                  ->references('PPJB_ID')->on('PPJB')
                  ->cascadeOnUpdate()->noActionOnDelete();

            // Index bantu untuk pencarian per PPJB
            $table->index('PPJB_ID', 'serah_terima_ppjb_idx');
        });
    }

    public function down(): void
    {
        if (Schema::hasTable('SERAH_TERIMA')) {
            Schema::table('SERAH_TERIMA', function (Blueprint $table) {
                // Drop index & FK terlebih dulu agar aman di beberapa driver
                try { $table->dropIndex('serah_terima_ppjb_idx'); } catch (\Throwable $e) {}
                try { $table->dropForeign(['PPJB_ID']); } catch (\Throwable $e) {}
            });
        }
        Schema::dropIfExists('SERAH_TERIMA');
    }
};
