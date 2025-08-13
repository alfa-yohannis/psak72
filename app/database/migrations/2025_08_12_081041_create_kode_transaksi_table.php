<?php
/**
 * Place these files under database/migrations (filenames are suggestions).
 * They are ordered to satisfy FK dependencies on SQL Server (use noActionOnDelete + cascadeOnUpdate).
 *
 * NOTE:
 * - Existing tables assumed: STOK, NASABAH, PPJB (with PPJB_ID, STOK_ID, TIPE_BAYAR), TIPE_BAYAR_CLUSTER.
 * - These migrations add the new master tables and transactional tables shown in the diagram,
 *   and then ALTER PPJB & PEMBELI_PPJB to match the new schema.
 */

/* ======================================================================
 * 2025_08_13_000001_create_kode_transaksi_table.php
 * ====================================================================== */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('KODE_TRANSAKSI', function (Blueprint $table) {
            $table->char('KD_TRANSAKSI', 5)->primary();
            $table->string('DESKRIPSI', 250)->nullable();
        });
    }
    public function down(): void {
        Schema::dropIfExists('KODE_TRANSAKSI');
    }
};
