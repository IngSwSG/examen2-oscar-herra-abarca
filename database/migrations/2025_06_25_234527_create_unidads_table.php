<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id('idUnidad');
            $table->string('nombre');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('unidades');
    }
};