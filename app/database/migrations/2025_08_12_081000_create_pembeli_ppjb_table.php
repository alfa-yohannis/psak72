<?php
// 2025_08_12_150300_create_pembeli_ppjb_table.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('PEMBELI_PPJB', function (Blueprint $table) {
            $table->unsignedBigInteger('PPJB_ID');    // FK -> PPJB
            $table->unsignedBigInteger('NASABAH_ID'); // FK -> NASABAH
            $table->primary(['PPJB_ID', 'NASABAH_ID']);

            $table->foreign('PPJB_ID')
                  ->references('PPJB_ID')->on('PPJB')
                  ->cascadeOnUpdate()->noActionOnDelete();

            $table->foreign('NASABAH_ID')
                  ->references('NASABAH_ID')->on('NASABAH')
                  ->cascadeOnUpdate()->noActionOnDelete();
        });
    }
    public function down(): void {
        Schema::dropIfExists('PEMBELI_PPJB');
    }
};
