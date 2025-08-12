<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('PEMBELI_DP', function (Blueprint $table) {
            $table->unsignedBigInteger('UANG_MUKA_ID'); // FK -> UANG_MUKA
            $table->unsignedBigInteger('NASABAH_ID');   // FK -> NASABAH
            $table->string('KETERANGAN', 100)->nullable(); // opsional: peran, utama/secondary

            $table->primary(['UANG_MUKA_ID', 'NASABAH_ID']);

            $table->foreign('UANG_MUKA_ID')
                ->references('UANG_MUKA_ID')
                ->on('UANG_MUKA')
                ->cascadeOnUpdate()
                ->noActionOnDelete();

            $table->foreign('NASABAH_ID')
                ->references('NASABAH_ID')
                ->on('NASABAH')
                ->cascadeOnUpdate()
                ->noActionOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('PEMBELI_DP');
    }
};
