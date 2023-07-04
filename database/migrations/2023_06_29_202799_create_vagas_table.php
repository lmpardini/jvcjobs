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
        Schema::create('vagas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->integer('numero_candidatos');
            $table->text('descricao');
            $table->text('requisitos');
            $table->boolean('destaque');
            $table->boolean('ativo')->default(true);
            $table->unsignedBigInteger('local_vaga_id');
            $table->foreign('local_vaga_id')->references('id')->on('local');
            $table->unsignedBigInteger('status_vaga_id');
            $table->foreign('status_vaga_id')->references('id')->on('status_vagas');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vagas');
    }
};
