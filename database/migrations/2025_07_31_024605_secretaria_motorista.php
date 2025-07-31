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
            $table->unsignedBigInteger('secretaria_id')->nullable()->after('id');
            $table->foreign('secretaria_id')->references('id')->on('secretarias')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('motoristas', function (Blueprint $table) {
            $table->dropForeign(['secretaria_id']);
            $table->dropColumn('secretaria_id');
        });
    }
};
