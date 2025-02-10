<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDataVencimentoCnhToMotoristasTable extends Migration
{
    public function up()
    {
        Schema::table('motoristas', function (Blueprint $table) {
            $table->date('data_vencimento_cnh')->nullable()->after('cnh');
        });
    }

    public function down()
    {
        Schema::table('motoristas', function (Blueprint $table) {
            $table->dropColumn('data_vencimento_cnh');
        });
    }
}
