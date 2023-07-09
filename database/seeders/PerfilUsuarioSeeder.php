<?php

namespace Database\Seeders;

use App\Models\PerfilUsuario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerfilUsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $perfilUsuario = [
           'Colaborador',
           'Candidato'
       ];

       foreach ($perfilUsuario as $value) {
           $perfil = new PerfilUsuario();
           $perfil->nome = $value;
           $perfil->slug = \Str::slug($value, '_');
           $perfil->save();
       }
    }
}
