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
        Schema::create('aluno_token', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('aluno_id');
            $table->foreign('aluno_id')->references('id')->on('aluno')->onDelete('cascade');
            $table->text('token');
            $table->timestamp('valido_ate');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        schema::table('aluno_token', function(Blueprint $table) {
        $table->dropForeign(['aluno_id']);
        });
        Schema::dropIfExists('aluno_token');
    }
};