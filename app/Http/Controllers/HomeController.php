<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $vagasDestaque = [
            [
                'vaga' => 'Motorista Urbano',
                'garagem' => 'Ilhabela',
                'descricao_vaga' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'
            ],
            [
                'vaga' => 'Técnico em Informática',
                'garagem' => 'Itatiba',
                'descricao_vaga' => 'Precisamos de um tecnico de informatica que seja desenvolvedor FullStack que faça "sisteminhas" de graça para a empresa'
            ],
            [
                'vaga' => 'Recursos Humanos',
                'garagem' => 'Ilhabela',
                'descricao_vaga' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'
            ],
        ];

        $outrasVagas = [
            [
                'vaga' => 'Funileiro',
                'garagem' => 'Águas de Lindoia',
                'descricao_vaga' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'
            ],
            [
                'vaga' => 'Almoxarifado',
                'garagem' => 'Cubatão',
                'descricao_vaga' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'
            ],
            [
                'vaga' => 'Eletricista',
                'garagem' => 'Amparo',
                'descricao_vaga' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'
            ],
            [
                'vaga' => 'Mecânico Diesel',
                'garagem' => 'Itanhaém',
                'descricao_vaga' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit'
            ],
        ];

        return view('home', ['vagasDestaque' => $vagasDestaque, 'outrasVagas' => $outrasVagas]);
    }
}
