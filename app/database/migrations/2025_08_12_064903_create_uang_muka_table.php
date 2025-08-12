<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration { 
    public function up(): void
    {
        Schema::create('UANG_MUKA', function (Blueprint $table) {
            // PK header Surat Pemesanan
            $table->unsignedBigInteger('UANG_MUKA_ID')->primary(); // numeric(18)

            // Relasi dasar
            $table->unsignedBigInteger('STOK_ID');         // FK -> STOK(STOK_ID)
            $table->char('TIPE_BAYAR_ANGS', 2);            // FK -> TIPE_BAYAR_CLUSTER(TIPE_BAYAR)

            // Pointer tahap aktif (opsional, untuk referensi di UI/proses)
            $table->char('TAHAP', 5)->nullable();

            // Flagging (tanpa CHECK constraint, hanya tipe + default/nullable)
            $table->char('FLAG_AKTIF', 1)->default('A');   // A=Aktif, T=Tidak
            $table->char('FLAG_BATAL', 1)->nullable();     // Y=Batal, T/NULL=Tidak batal
            $table->char('STATUS', 1)->nullable();         // NULL/T=Open, V=Siap Approve, A=Approve

            // Foreign keys
            $table->foreign('STOK_ID')
                  ->references('STOK_ID')->on('STOK')
                  ->cascadeOnUpdate()->noActionOnDelete();

            $table->foreign('TIPE_BAYAR_ANGS')
                  ->references('TIPE_BAYAR')->on('TIPE_BAYAR_CLUSTER')
                  ->cascadeOnUpdate()->noActionOnDelete();

            // $table->timestamps(); // aktifkan jika perlu
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('UANG_MUKA');
    }
};
