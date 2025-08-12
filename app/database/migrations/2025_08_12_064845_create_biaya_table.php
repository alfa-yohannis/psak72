<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('BIAYA', function (Blueprint $table) {
            $table->char('KD_BIAYA', 5)->primary(); // e.g. DISC1, PPN01
            $table->string('NAMA', 100)->nullable(); // opsional, deskripsi biaya
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('BIAYA');
    }
};
