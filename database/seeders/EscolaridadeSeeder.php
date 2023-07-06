<?php

namespace Database\Seeders;

use App\Models\Escolaridade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EscolaridadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $escolaridades = [
            "Ensino Fundamental Incompleto",
            "Ensino Fundamental Completo",
            "Ensino Médio Incompleto",
            "Ensino Médio Completo",
            "Ensino Técnico Incompleto",
            "Ensino Técnico Completo",
            "Graduação Incompleta",
            "Graduação Completa",
            "Pós-graduação Incompleta",
            "Pós-graduação Completa",
            "Mestrado Incompleto",
            "Mestrado Completo",
            "Doutorado Incompleto",
            "Doutorado Completo"
        ];

        foreach ($escolaridades as $value) {
            $escolaridade = new Escolaridade();
            $escolaridade->nome = $value;
            $escolaridade->slug = Str::slug($value, '_');
            $escolaridade->save();
        }
    }
}
