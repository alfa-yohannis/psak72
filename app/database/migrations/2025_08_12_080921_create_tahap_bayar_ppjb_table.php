<?php
// 2025_08_12_150100_create_tahap_bayar_ppjb_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('TAHAP_BAYAR_PPJB', function (Blueprint $table) {
            $table->unsignedBigInteger('PPJB_ID');   // FK -> PPJB
            $table->char('TAHAP', 5);                // 000,001,...
            $table->dateTime('TGL_JATUH_TEMPO');

            $table->primary(['PPJB_ID', 'TAHAP']);

            $table->foreign('PPJB_ID')
                  ->references('PPJB_ID')->on('PPJB')
                  ->cascadeOnUpdate()->noActionOnDelete();
        });
    }
    public function down(): void {
        Schema::dropIfExists('TAHAP_BAYAR_PPJB');
    }
};
