<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('material_unidads', function (Blueprint $table) {
            $table->id('idMaterialUnidad');
            $table->unsignedBigInteger('material_id');
            $table->unsignedBigInteger('unidad_id');
            $table->integer('cantidad');
            $table->timestamps();

            $table->foreign('material_id')->references('codigo')->on('materials');
            $table->foreign('unidad_id')->references('idUnidad')->on('unidades');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('material_unidads');
    }
};