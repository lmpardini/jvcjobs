<?php

namespace Database\Seeders;

use App\Models\Local;
use App\Models\StatusVaga;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class LocalVagaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $localVaga = [
            [
                'local' => 'Itatiba',
            ],
            [
                'local' => 'Ilhabela',
            ],
            [
                'local' => 'Caraguatatuba',
            ],
            [
                'local' => 'Águas de Lindoia',
            ],
            [
                'local' => 'Amparo',
            ],
            [
                'local' => 'Serra Negra',
            ],
            [
                'local' => 'Pedreira',
            ],
            [
                'local' => 'Mogi-Mirim',
            ],
            [
                'local' => 'Mogi-Guaçu',
            ],
            [
                'local' => 'Monte Sião',
            ],
            [
                'local' => 'Itanhaém',
            ],
            [
                'local' => 'Cubatão',
            ],
        ];

        foreach ($localVaga as $value) {

            $status = new Local();
            $status->nome = $value['local'];
            $status->slug = Str::slug($value['local'], '_');
            $status->save();
        }
    }
}
