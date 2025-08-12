<?php
// 2025_08_12_150000_create_ppjb_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('PPJB', function (Blueprint $table) {
            $table->unsignedBigInteger('PPJB_ID')->primary();   // numeric(18)
            $table->unsignedBigInteger('STOK_ID');              // FK -> STOK
            $table->char('TIPE_BAYAR', 2);                      // FK -> TIPE_BAYAR_CLUSTER.TIPE_BAYAR

            $table->foreign('STOK_ID')
                  ->references('STOK_ID')->on('STOK')
                  ->cascadeOnUpdate()->noActionOnDelete();

            $table->foreign('TIPE_BAYAR')
                  ->references('TIPE_BAYAR')->on('TIPE_BAYAR_CLUSTER')
                  ->cascadeOnUpdate()->noActionOnDelete();
        });
    }
    public function down(): void {
        Schema::dropIfExists('PPJB');
    }
};
