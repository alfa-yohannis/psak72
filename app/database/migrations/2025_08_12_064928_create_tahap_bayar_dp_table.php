<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('TAHAP_BAYAR_DP', function (Blueprint $table) {
            $table->unsignedBigInteger('UANG_MUKA_ID');  // FK -> UANG_MUKA
            $table->char('TAHAP', 5);                    // e.g. 001, 002
            $table->dateTime('TGL_JATUH_TEMPO');

            $table->primary(['UANG_MUKA_ID', 'TAHAP']);

            $table->foreign('UANG_MUKA_ID')
                ->references('UANG_MUKA_ID')
                ->on('UANG_MUKA')
                ->cascadeOnUpdate()
                ->noActionOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('TAHAP_BAYAR_DP');
    }
};
