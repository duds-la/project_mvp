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
        Schema::create('servicos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('tipo_servico_id');
            $table->decimal('valor_medio', 10, 3);
            $table->decimal('valor_maximo_desconto', 10, 3)->nullable();
            $table->string('codigo',250);
            $table->string('descricao',250)->nullable();
            $table->string('situacao',1);
            $table->integer('recorrencia_quantidade')->nullable();
            $table->integer('recorrencia_tempo')->nullable();
            $table->timestamps();

            $table->foreign('tipo_servico_id')->references('id')->on('tipos_servicos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicos');
    }
};
