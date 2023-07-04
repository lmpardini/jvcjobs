<?php

namespace Database\Seeders;

use App\Models\Genero;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $generos = [
            'Masculino',
            'Feminino',
            'Não-binário',
            'Agênero',
            'Gênero fluido',
            'Outro',
        ];

        foreach ($generos as $value) {
            $genero = new Genero();
            $genero->nome = $value;
            $genero->slug = Str::slug($value, '_');
            $genero->save();
        }
    }
}
