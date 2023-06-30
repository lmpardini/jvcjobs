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
        Schema::create('candidatura_vagas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidato_id');
            $table->foreign('candidato_id')->references('id')->on('users');
            $table->unsignedBigInteger('vaga_id');
            $table->foreign('vaga_id')->references('id')->on('vagas');
            $table->unsignedBigInteger('status_candidatura_id');
            $table->foreign('status_candidatura_id')->references('id')->on('status_candidaturas');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatura_vagas');
    }
};
