<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('MODEL', function (Blueprint $table) {
            $table->char('KD_MODEL', 5)->primary();
            $table->char('KD_SEKTOR', 5);

            $table->foreign('KD_SEKTOR')
                ->references('KD_SEKTOR')
                ->on('SEKTOR')
                ->cascadeOnUpdate()
                ->noActionOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('MODEL');
    }
};
