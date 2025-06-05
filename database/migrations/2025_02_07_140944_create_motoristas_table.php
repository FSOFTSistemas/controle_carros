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
        Schema::create('motoristas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('apelido');
            $table->string('cpf')->unique();
            $table->string('cnh')->unique();
            $table->date('validade_cnh');
            $table->string('curso_1');
            $table->string('curso_2');
            $table->string('comprovante_residencia');
            $table->string('antecedente_estadual');
            $table->string('antecedente_federal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('motoristas');
    }
};
