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
        Schema::create('candidato_formacao_academicas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('candidato_id');
            $table->foreign('candidato_id')->references('id')->on('candidatos');
            $table->string('curso');
            $table->string('nome_instituicao');
            $table->unsignedBigInteger('modalidade_id');
            $table->foreign('modalidade_id')->references('id')->on('formacao_academica_modalidades');
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('formacao_academica_statuses');
            $table->date('data_inicio');
            $table->date('data_conclusao');
            $table->text('observacao');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidato_formacao_academicas');
    }
};
