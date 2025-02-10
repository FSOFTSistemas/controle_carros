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
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->string('logradouro');
            $table->string('numero');
            $table->string('bairro');
            $table->string('cep', 9); // Formato 99999-999
            $table->string('uf', 2); // Sigla do estado (ex: SP, RJ)
            $table->unsignedBigInteger('monitor_id'); // Adicionando o campo para relacionar com o monitor
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('enderecos');
    }
};
