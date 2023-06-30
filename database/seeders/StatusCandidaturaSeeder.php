<?php

namespace Database\Seeders;

use App\Models\StatusCandidatura;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StatusCandidaturaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusCandidatura = [
            [
                'nome' => 'Inscrito'
            ],
            [
                'nome' => 'Em Análise'
            ],
            [
                'nome' => 'Pré Aprovado'
            ],
            [
                'nome' => 'Reprovado'
            ],
            [
                'nome' => 'Aprovado'
            ],
            [
                'nome' => 'Admitido'
            ],
            [
                'nome' => 'Desistencia'
            ],
        ];

        foreach ($statusCandidatura as $value) {
            $status = new StatusCandidatura();
            $status->nome = $value['nome'];
            $status->slug = Str::slug($value['nome'], '_');
            $status->save();
        }
    }
}
