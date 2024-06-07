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
        Schema::disableForeignKeyConstraints();
        Schema::create('mascotas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->enum('especie', ['Perro', 'Gato']);
            $table->enum('sexo', ['Macho', 'Hembra']);
            $table->date('fecha_nacimiento');
            $table->string('raza')->nullable();
            $table->string('color')->nullable();
            $table->string('senas_particulares')->nullable();
            $table->string('otros')->nullable();
            $table->enum('tipo', ['real', 'virtual']);
            $table->string('foto')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mascotas');
    }
};
