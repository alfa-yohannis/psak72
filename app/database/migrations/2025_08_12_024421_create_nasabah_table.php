<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('NASABAH', function (Blueprint $table) {
            $table->unsignedBigInteger('NASABAH_ID', false)->primary(); // numeric(18) <pk>
            $table->char('KD_TIPE_NASABAH', 2);                         // <fk> ke TIPE_NASABAH
            $table->string('NAMA', 250);

            $table->foreign('KD_TIPE_NASABAH')
                  ->references('KD_TIPE_NASABAH')
                  ->on('TIPE_NASABAH')
                  ->cascadeOnUpdate()
                  ->noActionOnDelete(); 
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('NASABAH');
    }
};
