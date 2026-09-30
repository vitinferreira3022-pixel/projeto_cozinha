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
        Schema::create('estoque', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alimento_id');
            $table->foreign('alimento_id')->references('id')->on('alimento')->onDelete('cascade');
            $table->integer('quantidade');
            $table->date('data_fabricacao');
            $table->date('data_validade');
            $table->unsignedBigInteger('funcionario_id');
            $table->foreign('funcionario_id')->references('id')->on('funcionario')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

        Schema::table('estoque', function (Blueprint $table) {
            $table->dropForeign(['alimento_id']);
            $table->dropColumn('alimento_id');
            $table->dropForeign(['funcionario_id']);
            $table->dropColumn('funcionario_id');
        });
        Schema::dropIfExists('estoque');
    }
};
