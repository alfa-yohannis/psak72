<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('SEKTOR', function (Blueprint $table) {
            $table->char('KD_SEKTOR', 5)->primary();
            $table->char('KD_PERUSAHAAN', 5);

            $table->foreign('KD_PERUSAHAAN')
                ->references('KD_PERUSAHAAN')
                ->on('PERUSAHAAN')
                ->cascadeOnUpdate()
                ->noActionOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('SEKTOR');
    }
};
