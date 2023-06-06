<?php

namespace Database\Seeders;

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
        ];

        foreach($vagas as $item) {
            $vaga = new Vagas();
            $vaga->nome = $item['nome'];
            $vaga->local = $item['local'];
            $vaga->numero_candidatos = $item['numero_candidatos'];
            $vaga->descricao = $item['descricao'];
            $vaga->requisitos = $item['requisitos'];
            $vaga->destaque = $item['destaque'];
            $vaga->save();
        }
    }
}
