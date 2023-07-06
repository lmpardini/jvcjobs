<?php

namespace Database\Seeders;

use App\Models\FormacaoAcademicaModalidade;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StatusVagaSeeder::class,
            LocalVagaSeeder::class,
            VagasSeeder::class,
            StatusCandidaturaSeeder::class,
            EstadoSeeder::class,
            PaisesSeeder::class,
            EtniaSeeder::class,
            GeneroSeeder::class,
            EscolaridadeSeeder::class,
            FormacaoAcademicaModalidadeSeeder::class,
            FormacaoAcademicaStatusSeeder::class
        ]);
    }
}
