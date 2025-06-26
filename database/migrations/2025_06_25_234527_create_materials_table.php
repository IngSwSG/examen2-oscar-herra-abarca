<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id('codigo');
            $table->string('unidadMedida');
            $table->string('descripcion');
            $table->string('ubicacion');
            $table->unsignedBigInteger('categoria_id');
            $table->timestamps();

            $table->foreign('categoria_id')->references('idCategoria')->on('categorias');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};