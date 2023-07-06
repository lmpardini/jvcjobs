<?php

namespace Database\Seeders;

use App\Models\FormacaoAcademicaModalidade;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FormacaoAcademicaModalidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formacaoAcademicaModalidade = [
            "Curso Técnico",
            "Graduação",
            "Pós-Graduação",
            "Mestrado",
            "Doutorado"
        ];

        foreach ($formacaoAcademicaModalidade as $value) {
            $modalidade = new FormacaoAcademicaModalidade();
            $modalidade->nome = $value;
            $modalidade->slug = \Str::slug($value, '_');
            $modalidade->save();
        }

    }
}
