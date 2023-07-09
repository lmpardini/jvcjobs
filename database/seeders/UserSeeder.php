<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios = [
            [
                'name'              => 'Administrador ',
                'last_name'         => 'Sistema',
                'email'             => 'admin@admin.com.br',
                'cpf'               => '44060289000',
                'password'          => Hash::make('Tcworn8e@2023'),
                'ativo'             => true,
                'primeiro_acesso'   => false,
                'perfil_usuario_id' => 1,
            ]
        ];

        foreach ($usuarios as $value) {
            $usuario = new User();
            $usuario->name = $value['name'];
            $usuario->last_name = $value['last_name'];
            $usuario->email = $value['email'];
            $usuario->cpf = $value['cpf'];
            $usuario->password = $value['password'];
            $usuario->ativo = $value['ativo'];
            $usuario->primeiro_acesso = $value['primeiro_acesso'];
            $usuario->perfil_usuario_id = $value['perfil_usuario_id'];
            $usuario->save();
        }
    }
}
