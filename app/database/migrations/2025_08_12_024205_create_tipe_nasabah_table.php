<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('TIPE_NASABAH', function (Blueprint $table) {
            $table->char('KD_TIPE_NASABAH', 2)->primary(); // <pk> char(2)
            $table->string('DESKRIPSI', 50);
            // Tidak ada created_at/updated_at
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('TIPE_NASABAH');
    }
};
