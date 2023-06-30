<?php

namespace Database\Seeders;

use App\Models\StatusVaga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class StatusVagaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statusVaga = [
            [
                'nome' => 'Criada'
            ],
            [
                'nome' => 'Fechada'
            ],
            [
                'nome' => 'Candidatura Aberta'
            ],
            [
                'nome' => 'Em Processo'
            ],
            [
                'nome' => 'Encerrada'
            ],
        ];

        foreach ($statusVaga as $value) {

            $status = new StatusVaga();
            $status->nome = $value['nome'];
            $status->slug = Str::slug($value['nome'], '_');
            $status->save();
        }
    }
}
