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
        Schema::create('desperdicio', function (Blueprint $table) {
            $table->id();
            $table->string('desperdicio_manha');
            $table->string('desperdicio_almoco');
            $table->string('desperdicio_tarde');
            $table->string('motivo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('desperdicio');
    }
};
