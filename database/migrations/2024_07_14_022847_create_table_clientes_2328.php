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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nome',250);
            $table->string('sobrenome',250)->nullable();
            $table->string('cpf',100)->nullable();
            $table->string('cpnj',250)->nullable();
            $table->unsignedBigInteger('tipo_id');
            $table->string('numero',30)->nullable();
            $table->date('data_nascimento')->nullable();
            $table->string('email',200)->nullable();
            $table->timestamps();

            $table->foreign('tipo_id')->references('id')->on('tipos_pessoas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};
