<?php

namespace Database\Seeders;

use App\Models\Local;
use App\Models\StatusVaga;
use App\Models\Vagas;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VagasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $vagas = [
            [
                'nome' => 'Motorista Urbano',
                'local' => 'Ilhabela',
                'descricao' => 'Esse texto foi cortado porque ultrapassou a largura da DIV',
                'requisitos' => 'Este é os requisitos para a vaga listado abaixo bla bla bla bla',
                'numero_candidatos' => 1,
                'destaque' => true
            ],
            [
                'nome' => 'Técnico em Informática',
                'local' => 'Itatiba',
                'descricao' => 'Precisamos de um tecnico de informatica que seja desenvolvedor FullStack que faça "sisteminhas" de graça para a empresa',
                'requisitos' => 'Este é os requisitos para a vaga listado abaixo bla bla bla bla',
                'numero_candidatos' => 12,
                'destaque' => true
            ],
            [
                'nome' => 'Recursos Humanos',
                'local' => 'Ilhabela',
                'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'requisitos' => 'Este é os requisitos para a vaga listado abaixo bla bla bla bla',
                'numero_candidatos' => 14,
                'destaque' => true
            ],
            [
                'nome' => 'Funileiro',
                'local' => 'Águas de Lindoia',
                'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'requisitos' => 'Este é os requisitos para a vaga listado abaixo bla bla bla bla',
                'numero_candidatos' => 3,
                'destaque' => false
            ],
            [
                'nome' => 'Almoxarifado',
                'local' => 'Cubatão',
                'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'requisitos' => 'Este é os requisitos para a vaga listado abaixo bla bla bla bla',
                'numero_candidatos' => 18,
                'destaque' => false
            ],
            [
                'nome' => 'Eletricista',
                'local' => 'Amparo',
                'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'requisitos' => 'Este é os requisitos para a vaga listado abaixo bla bla bla bla',
                'numero_candidatos' => 1,
                'destaque' => false
            ],
            [
                'nome' => 'Mecânico Diesel',
                'local' => 'Itanhaém',
                'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'requisitos' => 'Este é os requisitos para a vaga listado abaixo bla bla bla bla',
                'numero_candidatos' => 7,
                'destaque' => false
            ],
            [
                'nome' => 'Auxiliar de Trafego',
                'local' => 'Itatiba',
                'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'requisitos' => 'Este é os requisitos para a vaga listado abaixo bla bla bla bla',
                'numero_candidatos' => 1,
                'destaque' => false
            ],
            [
                'nome' => 'Auxiliar de Limpeza',
                'local' => 'Caraguatatuba',
                'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'requisitos' => 'Este é os requisitos para a vaga listado abaixo bla bla bla bla',
                'numero_candidatos' => 1,
                'destaque' => false
            ],
            [
                'nome' => 'Auxiliar de Limpeza',
                'local' => 'Ilhabela',
                'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'requisitos' => 'Este é os requisitos para a vaga listado abaixo bla bla bla bla',
                'numero_candidatos' => 1,
                'destaque' => false
            ],
            [
                'nome' => 'Tecnico de Segurança do Trabalho',
                'local' => 'Itatiba',
                'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'requisitos' => 'Este é os requisitos para a vaga listado abaixo bla bla bla bla',
                'numero_candidatos' => 1,
                'destaque' => false
            ],
            [
                'nome' => 'Eletricista',
                'local' => 'Serra Negra',
                'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'requisitos' => 'Este é os requisitos para a vaga listado abaixo bla bla bla bla',
                'numero_candidatos' => 1,
                'destaque' => false
            ],
            [
                'nome' => 'Controlador de Pneus',
                'local' => 'Itatiba',
                'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'requisitos' => 'Este é os requisitos para a vaga listado abaixo bla bla bla bla',
                'numero_candidatos' => 1,
                'destaque' => true
            ],
            [
                'nome' => 'Assistente de Trafego',
                'local' => 'Amparo',
                'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'requisitos' => 'Este é os requisitos para a vaga listado abaixo bla bla bla bla',
                'numero_candidatos' => 1,
                'destaque' => false
            ],
            [
                'nome' => 'Motorista de Onibus Escolar e Urbano',
                'local' => 'Amparo',
                'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'requisitos' => 'Este é os requisitos para a vaga listado abaixo bla bla bla bla',
                'numero_candidatos' => 1,
                'destaque' => true
            ],
            [
                'nome' => 'Funileiro',
                'local' => 'Amparo',
                'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'requisitos' => 'Este é os requisitos para a vaga listado abaixo bla bla bla bla',
                'numero_candidatos' => 1,
                'destaque' => false
            ],
            [
                'nome' => 'Funileiro',
                'local' => 'Itatiba',
                'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'requisitos' => 'Este é os requisitos para a vaga listado abaixo bla bla bla bla',
                'numero_candidatos' => 1,
                'destaque' => false
            ],
            [
                'nome' => 'Auxiliar de Mecânico',
                'local' => 'Caraguatatuba',
                'descricao' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit',
                'requisitos' => 'Este é os requisitos para a vaga listado abaixo bla bla bla bla',
                'numero_candidatos' => 1,
                'destaque' => true
            ],
        ];

        foreach($vagas as $item) {
            /**
             * @var StatusVaga $status
             */
            $status = StatusVaga::where('slug', 'em_processo')->first();

            /**
             * @var Local $local
             */
            $local = Local::where('nome', $item['local'])->first();

            $vaga = new Vagas();
            $vaga->nome = $item['nome'];
            $vaga->numero_candidatos = $item['numero_candidatos'];
            $vaga->descricao = $item['descricao'];
            $vaga->requisitos = $item['requisitos'];
            $vaga->destaque = $item['destaque'];
            $vaga->status_vaga_id = $status->id;
            $vaga->local_vaga_id = $local->id;
            $vaga->save();
        }
    }
}
