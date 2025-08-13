<?php
/* ======================================================================
 * 2025_08_13_000008_create_angsuran_table.php
 * (payments/receipts realisasi angsuran)
 * ====================================================================== */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('ANGSURAN', function (Blueprint $table) {
            $table->bigIncrements('ANGSURAN_ID');      // numeric(18) identity
            $table->unsignedBigInteger('PPJB_ID');      // FK -> PPJB
            $table->unsignedBigInteger('JADWAL_ID')->nullable(); // FK -> JADWAL_ANGSURAN (may be null if off-cycle)
            $table->char('KD_TRANSAKSI', 5);           // FK -> KODE_TRANSAKSI
            $table->char('KD_BANK_PENERIMA', 5)->nullable(); // FK -> BANK_PENERIMA
            $table->char('KD', 5)->nullable();         // FK -> REF_LAINNYA (generic ref)

            $table->decimal('JML_BAYAR', 15, 2)->default(0);
            $table->decimal('DPP', 15, 2)->default(0);
            $table->decimal('PPN', 15, 2)->default(0);

            $table->dateTime('TGL_BAYAR')->nullable();
            $table->dateTime('TGL_CAIR')->nullable();
            $table->dateTime('TGL_FAKTUR')->nullable();
            $table->dateTime('TGL_KUITANSI')->nullable();

            $table->string('NO_KUITANSI', 50)->nullable();
            $table->string('NO_FAKTUR', 50)->nullable();

            // FKs
            $table->foreign('PPJB_ID')
                ->references('PPJB_ID')->on('PPJB')
                ->cascadeOnUpdate()->noActionOnDelete();

            $table->foreign('JADWAL_ID')
                ->references('JADWAL_ID')->on('JADWAL_ANGSURAN')
                ->cascadeOnUpdate()->noActionOnDelete();

            $table->foreign('KD_TRANSAKSI')
                ->references('KD_TRANSAKSI')->on('KODE_TRANSAKSI')
                ->cascadeOnUpdate()->noActionOnDelete();

            $table->foreign('KD_BANK_PENERIMA')
                ->references('KD_BANK_PENERIMA')->on('BANK_PENERIMA')
                ->cascadeOnUpdate()->noActionOnDelete();

            $table->foreign('KD')
                ->references('KD')->on('REF_LAINNYA')
                ->cascadeOnUpdate()->noActionOnDelete();

            $table->index(['PPJB_ID', 'TGL_BAYAR'], 'angsuran_ppjb_tglbayar_idx');
        });
    }
    public function down(): void {
        Schema::dropIfExists('ANGSURAN');
    }
};
