<?php
/* ======================================================================
 * 2025_08_13_000002_create_bank_penerima_table.php
 * ====================================================================== */
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('BANK_PENERIMA', function (Blueprint $table) {
            $table->char('KD_BANK_PENERIMA', 5)->primary();
            $table->string('NM_BANK', 250);
        });
    }
    public function down(): void {
        Schema::dropIfExists('BANK_PENERIMA');
    }
};
