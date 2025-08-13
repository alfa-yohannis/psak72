<?php
// database/migrations/2025_08_12_150000_create_ppjb_table.php
// Merged & fixed for SQL Server "multiple cascade paths": STO_STOK_ID uses NO ACTION.

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('PPJB', function (Blueprint $table) {
            $table->unsignedBigInteger('PPJB_ID')->primary();   // numeric(18)
            $table->unsignedBigInteger('STOK_ID');              // FK -> STOK
            $table->char('TIPE_BAYAR', 2);                      // FK -> TIPE_BAYAR_CLUSTER.TIPE_BAYAR

            // Extra columns
            $table->unsignedBigInteger('NASABAH_ID')->nullable(); // FK -> NASABAH
            $table->unsignedBigInteger('STO_STOK_ID')->nullable(); // optional old-stock pointer
            $table->unsignedBigInteger('JADWAL_ID')->nullable();   // pointer to active JADWAL_ANGSURAN

            // FKs
            $table->foreign('STOK_ID')
                ->references('STOK_ID')->on('STOK')
                ->cascadeOnUpdate()->noActionOnDelete();

            $table->foreign('TIPE_BAYAR')
                ->references('TIPE_BAYAR')->on('TIPE_BAYAR_CLUSTER')
                ->cascadeOnUpdate()->noActionOnDelete();

            $table->foreign('NASABAH_ID')
                ->references('NASABAH_ID')->on('NASABAH')
                ->cascadeOnUpdate()->noActionOnDelete();

            // IMPORTANT: avoid multiple cascade paths → NO ACTION on update & delete
            $table->foreign('STO_STOK_ID')
                ->references('STOK_ID')->on('STOK')
                ->onUpdate('no action')->onDelete('no action');
        });

        // Add FK to JADWAL_ANGSURAN only if table exists at this point
        if (Schema::hasTable('JADWAL_ANGSURAN')) {
            Schema::table('PPJB', function (Blueprint $table) {
                $table->foreign('JADWAL_ID')
                    ->references('JADWAL_ID')->on('JADWAL_ANGSURAN')
                    ->cascadeOnUpdate()->noActionOnDelete();
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasTable('PPJB')) {
            Schema::table('PPJB', function (Blueprint $table) {
                foreach (['JADWAL_ID', 'STO_STOK_ID', 'NASABAH_ID', 'TIPE_BAYAR', 'STOK_ID'] as $col) {
                    try { $table->dropForeign([$col]); } catch (\Throwable $e) {}
                }
            });
        }
        Schema::dropIfExists('PPJB');
    }
};
