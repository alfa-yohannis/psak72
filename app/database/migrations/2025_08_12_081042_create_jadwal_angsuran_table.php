<?php
// 2025_08_12_150500_create_jadwal_angsuran_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('JADWAL_ANGSURAN', function (Blueprint $table) {
            // Pakai surrogate key untuk fleksibilitas (di ERD "undefined")
            $table->bigIncrements('JADWAL_ID');       // numeric(18) equivalent
            $table->unsignedBigInteger('PPJB_ID');     // FK -> PPJB
            $table->char('TAHAP', 5);                  // 000,001,...
            $table->dateTime('TGL_JATUH_TEMPO');

            $table->foreign('PPJB_ID')
                  ->references('PPJB_ID')->on('PPJB')
                  ->cascadeOnUpdate()->noActionOnDelete();

            // Index bantu untuk query per PPJB + tahap
            $table->index(['PPJB_ID', 'TAHAP']);
        });
    }
    public function down(): void {
        Schema::dropIfExists('JADWAL_ANGSURAN');
    }
};
