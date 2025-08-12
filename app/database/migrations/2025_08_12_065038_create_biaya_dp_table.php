<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('BIAYA_DP', function (Blueprint $table) {
            $table->unsignedBigInteger('UANG_MUKA_ID'); // FK -> UANG_MUKA
            $table->char('KD_BIAYA', 5);                // FK -> BIAYA
            $table->decimal('NILAI', 18, 2)->default(0); // nilai transaksi: harga dasar, disc, PPN, dst

            $table->primary(['UANG_MUKA_ID', 'KD_BIAYA']);

            $table->foreign('UANG_MUKA_ID')
                ->references('UANG_MUKA_ID')
                ->on('UANG_MUKA')
                ->cascadeOnUpdate()
                ->noActionOnDelete();

            $table->foreign('KD_BIAYA')
                ->references('KD_BIAYA')
                ->on('BIAYA')
                ->cascadeOnUpdate()
                ->noActionOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('BIAYA_DP');
    }
};
