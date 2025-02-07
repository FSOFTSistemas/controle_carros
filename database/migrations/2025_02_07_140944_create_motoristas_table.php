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
            $table->string('curso_1');
            $table->string('curso_2');
            $table->string('comprovante_residencia');
            $table->string('antecedente_estadual');
            $table->string('antecedente_federal');
            $table->string('cpf', 14); // Formato 000.000.000-00
            $table->string('nome');
            $table->string('apelido')->nullable();
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
