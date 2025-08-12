<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('BAYAR_UANG_MUKA', function (Blueprint $table) {
            // UANG_MUKA_ID numeric(18) <pk,fk>
            $table->unsignedBigInteger('UANG_MUKA_ID');

            // TAHAP numeric(3) <pk>
            // Use decimal(3,0) to match SQL Server NUMERIC(3,0)
            $table->decimal('TAHAP', 3, 0);

            // Composite PK
            $table->primary(['UANG_MUKA_ID', 'TAHAP']);

            // FK -> UANG_MUKA(UANG_MUKA_ID)
            $table->foreign('UANG_MUKA_ID')
                  ->references('UANG_MUKA_ID')
                  ->on('UANG_MUKA')
                  ->cascadeOnUpdate()
                  ->noActionOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('BAYAR_UANG_MUKA');
    }
};
