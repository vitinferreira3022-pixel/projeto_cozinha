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
        Schema::create('aluno', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->date('data_nascimento');    
            $table->string('cpf', 11)->unique();
            $table->string('email')->unique();
            $table->string('RM', 4)->unique();
            $table->unsignedBigInteger('turma_id');
            $table->foreign('turma_id')->references('id')->on('turma')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('aluno', function (Blueprint $table) {
            $table->dropForeign(['turma_id']);
            $table->dropColumn('turma_id');
        });

        Schema::dropIfExists('aluno');
    }
};
