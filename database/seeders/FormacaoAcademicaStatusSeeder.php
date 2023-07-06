<?php

namespace Database\Seeders;

use App\Models\FormacaoAcademicaStatus;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class FormacaoAcademicaStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $formacaoAcademicaStatus = [
            'Cursando',
            'Completo',
            'Trancado'
        ];

        foreach ($formacaoAcademicaStatus as $value) {

            $status = new FormacaoAcademicaStatus();
            $status->nome = $value;
            $status->slug = Str::slug($value, '_');
            $status->save();
        }
    }
}
