<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('TIPE', function (Blueprint $table) {
            $table->char('KD_TIPE', 5);
            $table->char('KD_JENIS', 5);

            $table->primary(['KD_TIPE', 'KD_JENIS']); // composite PK

            $table->foreign('KD_JENIS')
                ->references('KD_JENIS')
                ->on('JENIS')
                ->cascadeOnUpdate()
                ->noActionOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('TIPE');
    }
};
