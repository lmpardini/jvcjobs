<?php

namespace Database\Seeders;

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
            GeneroSeeder::class
        ]);
    }
}
