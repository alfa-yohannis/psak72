<?php
// database/migrations/2025_08_12_150500_create_jadwal_angsuran_table.php
// Merged version: supports operational billing schedule with extra flags,
// KD_TRANSAKSI reference, and helpful indexes. Works for SQL Server.

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('JADWAL_ANGSURAN', function (Blueprint $table) {
            $table->bigIncrements('JADWAL_ID');          // numeric(18) identity
            $table->unsignedBigInteger('PPJB_ID');       // FK -> PPJB
            $table->char('KD_TRANSAKSI', 5);             // FK -> KODE_TRANSAKSI
            $table->char('TAHAP', 5);                    // '000','001',...
            $table->dateTime('TGL_JATUH_TEMPO');

            // Opsional (membantu bila jadwal direvisi/dinonaktifkan)
            $table->char('FLAG_AKTIF', 1)->default('A'); // A=aktif, T=tidak
            $table->string('CATATAN', 200)->nullable();

            // FKs (hindari RESTRICT; gunakan noActionOnDelete di SQL Server)
            $table->foreign('PPJB_ID')
                  ->references('PPJB_ID')->on('PPJB')
                  ->noActionOnUpdate()->noActionOnDelete();

            $table->foreign('KD_TRANSAKSI')
                  ->references('KD_TRANSAKSI')->on('KODE_TRANSAKSI')
                  ->noActionOnUpdate()->noActionOnDelete();

            // Index bantu
            $table->index(['PPJB_ID', 'TAHAP'], 'jadwal_ppjb_tahap_idx');
            $table->index(['PPJB_ID', 'TGL_JATUH_TEMPO'], 'jadwal_ppjb_tempo_idx');
        });
    }

    public function down(): void
    {
        // Drop indexes first to be safe on some drivers
        if (Schema::hasTable('JADWAL_ANGSURAN')) {
            Schema::table('JADWAL_ANGSURAN', function (Blueprint $table) {
                try { $table->dropIndex('jadwal_ppjb_tahap_idx'); } catch (\Throwable $e) {}
                try { $table->dropIndex('jadwal_ppjb_tempo_idx'); } catch (\Throwable $e) {}
            });
        }
        Schema::dropIfExists('JADWAL_ANGSURAN');
    }
};
