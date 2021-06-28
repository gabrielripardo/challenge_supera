<?php

namespace Database\Seeders;
use App\Models\ModelAutomovel;
use Illuminate\Database\Seeder;

class AutomovelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModelAutomovel::create([ 
            'id_user' => 1,
            'id_tipo' => 1,
            'marca' => 'Toyota',
            'modelo' => 'Corolla',
            'versao' => '2021'
        ]);        
        ModelAutomovel::create([ 
            'id_user' => 2,
            'id_tipo' => 2,
            'marca' => 'Honda',
            'modelo' => 'Bis',
            'versao' => '2014'
        ]);  
        ModelAutomovel::create([ 
            'id_user' => 1,
            'id_tipo' => 3,
            'marca' => 'Scania',
            'modelo' => 'L51', 
            // 'versao' => null,
        ]);  
    }
}
