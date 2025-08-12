<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('STOK', function (Blueprint $table) {
            $table->unsignedBigInteger('STOK_ID')->primary(); // numeric(18)
            $table->char('KD_PERUSAHAAN', 5);
            $table->char('KD_TIPE', 5);
            $table->char('KD_JENIS', 5);
            $table->char('KD_LOKASI', 5);
            $table->char('KD_TOWER', 5);

            $table->foreign('KD_PERUSAHAAN')
                ->references('KD_PERUSAHAAN')
                ->on('PERUSAHAAN')
                ->cascadeOnUpdate()
                ->noActionOnDelete();

            $table->foreign(['KD_TIPE', 'KD_JENIS'])
                ->references(['KD_TIPE', 'KD_JENIS'])
                ->on('TIPE')
                ->cascadeOnUpdate()
                ->noActionOnDelete();

            $table->foreign('KD_LOKASI')
                ->references('KD_LOKASI')
                ->on('LOKASI')
                ->cascadeOnUpdate()
                ->noActionOnDelete();

            $table->foreign('KD_TOWER')
                ->references('KD_TOWER')
                ->on('TBL_TOWER')
                ->cascadeOnUpdate()
                ->noActionOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('STOK');
    }
};
