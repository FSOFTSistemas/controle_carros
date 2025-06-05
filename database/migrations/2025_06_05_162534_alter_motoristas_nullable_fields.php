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
        Schema::table('motoristas', function (Blueprint $table) {
            $table->string('apelido')->nullable()->change();
            $table->string('cpf')->nullable()->change();
            $table->string('cnh')->nullable()->change();
            $table->date('validade_cnh')->nullable()->change();
            $table->string('curso_1')->nullable()->change();
            $table->string('curso_2')->nullable()->change();
            $table->string('comprovante_residencia')->nullable()->change();
            $table->string('antecedente_estadual')->nullable()->change();
            $table->string('antecedente_federal')->nullable()->change();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('motoristas', function (Blueprint $table) {
            $table->string('apelido')->nullable(false)->change();
            $table->string('cpf')->nullable(false)->change();
            $table->string('cnh')->nullable(false)->change();
            $table->date('validade_cnh')->nullable(false)->change();
            $table->string('curso_1')->nullable(false)->change();
            $table->string('curso_2')->nullable(false)->change();
            $table->string('comprovante_residencia')->nullable(false)->change();
            $table->string('antecedente_estadual')->nullable(false)->change();
            $table->string('antecedente_federal')->nullable(false)->change();
        });
    }
};
