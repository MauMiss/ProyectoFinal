<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cartillas', function (Blueprint $table) {
            $table->id();
            $table->enum('tratamiento', ['vacuna', 'desparasitacion', 'otro_tratamiento'])->nullable();
            $table->date('fecha')->nullable();
            $table->date('proximo_control')->nullable();
            $table->float('peso')->nullable();
            $table->string('descripcion')->nullable();
            $table->unsignedBigInteger('mascota_id')->nullable();
            $table->foreign('mascota_id')->references('id')->on('mascotas')->onDelete('cascade');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cartillas');
    }
};
