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
        Schema::create('tipos_produtos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 250);
            $table->string('descricao', 250)->nullable();
            $table->string('classificacao', 250);
            $table->string('situacao', 1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipos_produtos');
    }
};
