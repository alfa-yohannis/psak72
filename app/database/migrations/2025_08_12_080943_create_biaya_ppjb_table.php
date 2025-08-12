<?php
// 2025_08_12_150200_create_biaya_ppjb_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('BIAYA_PPJB', function (Blueprint $table) {
            $table->unsignedBigInteger('PPJB_ID'); // FK -> PPJB
            $table->char('KD_BIAYA', 5);           // FK -> BIAYA
            $table->primary(['PPJB_ID', 'KD_BIAYA']);

            $table->foreign('PPJB_ID')
                  ->references('PPJB_ID')->on('PPJB')
                  ->cascadeOnUpdate()->noActionOnDelete();

            $table->foreign('KD_BIAYA')
                  ->references('KD_BIAYA')->on('BIAYA')
                  ->cascadeOnUpdate()->noActionOnDelete();
        });
    }
    public function down(): void {
        Schema::dropIfExists('BIAYA_PPJB');
    }
};
