<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('TIPE_BAYAR_CLUSTER', function (Blueprint $table) {
            $table->char('TIPE_BAYAR', 2)->primary(); // e.g. TK (Tunai Keras), KP (KPR), dsb
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('TIPE_BAYAR_CLUSTER');
    }
};
