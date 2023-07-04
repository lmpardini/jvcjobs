<?php

namespace Database\Seeders;

use App\Models\Paises;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PaisesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $paises = [
            ['codigo' => 'BR', 'nome' => 'Brasil'],
            ['codigo' => 'US', 'nome' => 'Estados Unidos'],
            ['codigo' => 'CA', 'nome' => 'Canadá'],
            ['codigo' => 'GB', 'nome' => 'Reino Unido'],
            ['codigo' => 'DE', 'nome' => 'Alemanha'],
            ['codigo' => 'FR', 'nome' => 'França'],
            ['codigo' => 'IT', 'nome' => 'Itália'],
            ['codigo' => 'ES', 'nome' => 'Espanha'],
            ['codigo' => 'PT', 'nome' => 'Portugal'],
            ['codigo' => 'AR', 'nome' => 'Argentina'],
            ['codigo' => 'AU', 'nome' => 'Austrália'],
            ['codigo' => 'JP', 'nome' => 'Japão'],
            ['codigo' => 'CN', 'nome' => 'China'],
            ['codigo' => 'IN', 'nome' => 'Índia'],
            ['codigo' => 'RU', 'nome' => 'Rússia'],
            ['codigo' => 'ZA', 'nome' => 'África do Sul'],
            ['codigo' => 'MX', 'nome' => 'México'],
            ['codigo' => 'CO', 'nome' => 'Colômbia'],
            ['codigo' => 'PE', 'nome' => 'Peru'],
            ['codigo' => 'CL', 'nome' => 'Chile'],
            ['codigo' => 'EC', 'nome' => 'Equador'],
            ['codigo' => 'GR', 'nome' => 'Grécia'],
            ['codigo' => 'SE', 'nome' => 'Suécia'],
            ['codigo' => 'NO', 'nome' => 'Noruega'],
            ['codigo' => 'FI', 'nome' => 'Finlândia'],
            ['codigo' => 'DK', 'nome' => 'Dinamarca'],
            ['codigo' => 'PL', 'nome' => 'Polônia'],
            ['codigo' => 'NL', 'nome' => 'Holanda'],
            ['codigo' => 'BE', 'nome' => 'Bélgica'],
            ['codigo' => 'IE', 'nome' => 'Irlanda'],
            ['codigo' => 'CZ', 'nome' => 'República Checa'],
            ['codigo' => 'AT', 'nome' => 'Áustria'],
            ['codigo' => 'HU', 'nome' => 'Hungria'],
            ['codigo' => 'RO', 'nome' => 'Romênia'],
            ['codigo' => 'KR', 'nome' => 'Coreia do Sul'],
            ['codigo' => 'SA', 'nome' => 'Arábia Saudita'],
            ['codigo' => 'AE', 'nome' => 'Emirados Árabes Unidos'],
            ['codigo' => 'TR', 'nome' => 'Turquia'],
            ['codigo' => 'EG', 'nome' => 'Egito'],
            ['codigo' => 'NG', 'nome' => 'Nigéria'],
            ['codigo' => 'KE', 'nome' => 'Quênia'],
            ['codigo' => 'DZ', 'nome' => 'Argélia'],
            ['codigo' => 'MA', 'nome' => 'Marrocos'],
            ['codigo' => 'VE', 'nome' => 'Venezuela'],
            ['codigo' => 'BO', 'nome' => 'Bolívia'],
        ];


        foreach (collect($paises)->sortBy('nome') as $value) {

            $pais = new Paises();
            $pais->nome = $value['nome'];
            $pais->slug = Str::slug($value['nome'], '_');
            $pais->abreviacao = $value['codigo'];
            $pais->save();
        }
    }
}
