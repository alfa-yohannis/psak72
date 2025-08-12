<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('LOKASI', function (Blueprint $table) {
            $table->char('KD_LOKASI', 5)->primary();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('LOKASI');
    }
};
