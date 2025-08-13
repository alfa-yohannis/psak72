<?php
// database/migrations/2025_08_12_150300_create_pembeli_ppjb_table.php
// Merged version: adds optional NAS_NASABAH_ID and uses NO ACTION on SQL Server
// to avoid multiple cascade paths. Includes helpful indexes.

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('PEMBELI_PPJB', function (Blueprint $table) {
            $table->unsignedBigInteger('PPJB_ID');        // FK -> PPJB
            $table->unsignedBigInteger('NASABAH_ID');     // FK -> NASABAH (primary buyer)
            $table->unsignedBigInteger('NAS_NASABAH_ID')->nullable(); // FK -> NASABAH (related/second buyer, optional)

            // Composite PK
            $table->primary(['PPJB_ID', 'NASABAH_ID']);

            // FKs — use NO ACTION on SQL Server to avoid multiple cascade paths
            $table->foreign('PPJB_ID')
                  ->references('PPJB_ID')->on('PPJB')
                  ->onUpdate('no action')->onDelete('no action');

            $table->foreign('NASABAH_ID')
                  ->references('NASABAH_ID')->on('NASABAH')
                  ->onUpdate('no action')->onDelete('no action');

            $table->foreign('NAS_NASABAH_ID')
                  ->references('NASABAH_ID')->on('NASABAH')
                  ->onUpdate('no action')->onDelete('no action');

            // Helpful indexes
            $table->index('PPJB_ID', 'pembeli_ppjb_ppjb_idx');
            $table->index('NASABAH_ID', 'pembeli_ppjb_nasabah_idx');
            $table->index('NAS_NASABAH_ID', 'pembeli_ppjb_nas_nasabah_idx');
        });
    }

    public function down(): void {
        Schema::dropIfExists('PEMBELI_PPJB');
    }
};
