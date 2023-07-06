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
        Schema::create('candidatos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            $table->string('nome_social')->nullable();
            $table->string('rg')->nullable();
            $table->string('rg_orgao_emissor')->nullable();
            $table->unsignedBigInteger('genero_id')->nullable();
            $table->foreign('genero_id')->references('id')->on('generos');
            $table->unsignedBigInteger('etnia_id')->nullable();
            $table->foreign('etnia_id')->references('id')->on('etnias');
            $table->unsignedBigInteger('escolaridade_id')->nullable();
            $table->foreign('escolaridade_id')->references('id')->on('escolaridades');
            $table->date('data_nascimento')->nullable();
            $table->bigInteger('cep')->nullable();
            $table->string('endereco')->nullable();
            $table->string('numero')->nullable();
            $table->string('complemento')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cidade')->nullable();
            $table->unsignedBigInteger('estado_id')->nullable();
            $table->foreign('estado_id')->references('id')->on('estados');
            $table->unsignedBigInteger('pais_id')->nullable();
            $table->foreign('pais_id')->references('id')->on('paises');
            $table->string('telefone')->nullable();
            $table->string('celular')->nullable();
            $table->string('nome_pai')->nullable();
            $table->string('nome_mae')->nullable();
            $table->bigInteger('qtde_dependentes')->nullable();
            $table->bigInteger('pis')->nullable();
            $table->string('pis_orgao_emissor')->nullable();
            $table->unsignedBigInteger('pis_estado_id')->nullable();
            $table->foreign('pis_estado_id')->references('id')->on('estados');
            $table->date('pis_data_emissao')->nullable();
            $table->string('pis_complemento')->nullable();
            $table->string('ctps')->nullable();
            $table->string('ctps_numero_serie')->nullable();
            $table->unsignedBigInteger('ctps_estado_id')->nullable();
            $table->foreign('ctps_estado_id')->references('id')->on('estados');
            $table->date('ctps_data_emissao')->nullable();
            $table->bigInteger('cnh')->nullable();
            $table->date('cnh_data_emissao')->nullable();
            $table->unsignedBigInteger('cnh_estado_id')->nullable();
            $table->foreign('cnh_estado_id')->references('id')->on('estados');
            $table->string('cnh_orgao_emissor')->nullable();
            $table->date('cnh_validade')->nullable();
            $table->string('cnh_categoria')->nullable();
            $table->string('cnh_complemento')->nullable();
            $table->bigInteger('tit_eleitor')->nullable();
            $table->bigInteger('tit_eleitor_zona')->nullable();
            $table->bigInteger('tit_eleitor_sessao')->nullable();
            $table->unsignedBigInteger('tit_eleitor_estado_id')->nullable();
            $table->foreign('tit_eleitor_estado_id')->references('id')->on('estados');
            $table->string('reservista')->nullable();
            $table->string('observacao')->nullable();
            $table->boolean('curso_transporte_coletivo')->default(false);
            $table->date('validade_curso_transporte_coletivo')->nullable();
            $table->boolean('curso_transporte_escolar')->default(false);
            $table->date('validade_curso_transporte_escolar')->nullable();
            $table->boolean('trabalhou_empresa')->default(false);
            $table->date('trabalhou_empresa_data_entrada')->nullable();
            $table->date('trabalhou_empresa_data_saida')->nullable();
            $table->string('trabalhou_empresa_setor')->nullable();
            $table->unsignedBigInteger('trabalhou_empresa_local_id')->nullable();
            $table->foreign('trabalhou_empresa_local_id')->references('id')->on('local');
            $table->boolean('parente_funcionario')->default(false);
            $table->string('nome_parente')->nullable();
            $table->string('setor_parente')->nullable();
            $table->unsignedBigInteger('parente_funcionario_local_id')->nullable();
            $table->foreign('parente_funcionario_local_id')->references('id')->on('local');
            $table->boolean('indicacao_colaborador')->default(false);
            $table->string('nome_colaborador')->nullable();
            $table->string('setor_colaborador')->nullable();
            $table->unsignedBigInteger('indicacao_colaborador_local_id')->nullable();
            $table->foreign('indicacao_colaborador_local_id')->references('id')->on('local');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('candidatos');
    }
};
