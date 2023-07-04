<?php

namespace Database\Seeders;

use App\Models\Etnia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EtniaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $etnias = [
            'Branco',
            'Negro ou Afrodescendente',
            'Pardo ou Mestiço',
            'Amarelo ou Asiático',
            'Indígena ou Ameríndio',
            'Outros',
        ];

        foreach ($etnias as $value) {
            $etnia = new Etnia();
            $etnia->nome = $value;
            $etnia->slug = Str::slug($value, '_');
            $etnia->save();
        }

    }
}
